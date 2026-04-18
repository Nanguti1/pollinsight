<?php

namespace App\Services;

use App\Models\Aspirant;
use App\Models\Poll;
use App\Models\Position;
use Illuminate\Database\Eloquent\Collection;

class PollService
{
    public function create(array $data): Poll
    {
        $this->validateLocationForPosition($data['position_id'], $data['county_id'] ?? null, $data['constituency_id'] ?? null, $data['ward_id'] ?? null);

        $poll = Poll::create($data);
        $this->createOptions($poll);

        return $poll;
    }

    protected function validateLocationForPosition(int $positionId, ?int $countyId, ?int $constituencyId, ?int $wardId): void
    {
        $position = Position::find($positionId);

        if (! $position) {
            throw new \InvalidArgumentException('Position not found.');
        }

        match ($position->level) {
            'national' => $this->assertAllNull($countyId, $constituencyId, $wardId),
            'county' => $this->assertCountyOnly($countyId, $constituencyId, $wardId),
            'constituency' => $this->assertConstituencyOnly($constituencyId, $wardId),
            'ward' => $this->assertWardOnly($wardId),
            default => throw new \InvalidArgumentException('Unsupported position level.'),
        };
    }

    protected function assertAllNull(?int $countyId, ?int $constituencyId, ?int $wardId): void
    {
        if ($countyId || $constituencyId || $wardId) {
            throw new \InvalidArgumentException('National polls must not include geography filters.');
        }
    }

    protected function assertCountyOnly(?int $countyId, ?int $constituencyId, ?int $wardId): void
    {
        if (! $countyId || $constituencyId || $wardId) {
            throw new \InvalidArgumentException('County polls must include county only.');
        }
    }

    protected function assertConstituencyOnly(?int $constituencyId, ?int $wardId): void
    {
        if (! $constituencyId || $wardId) {
            throw new \InvalidArgumentException('Constituency polls must include constituency only.');
        }
    }

    protected function assertWardOnly(?int $wardId): void
    {
        if (! $wardId) {
            throw new \InvalidArgumentException('Ward polls must include ward only.');
        }
    }

    public function createOptions(Poll $poll): void
    {
        $aspirants = $this->eligibleAspirants($poll);

        $poll->options()->delete();

        foreach ($aspirants as $aspirant) {
            $poll->options()->create(['aspirant_id' => $aspirant->id]);
        }
    }

    public function eligibleAspirants(Poll $poll): Collection
    {
        $query = Aspirant::query()->where('position_id', $poll->position_id)->where('status', 'active');

        if ($poll->county_id) {
            $query->where('county_id', $poll->county_id);
        }

        if ($poll->constituency_id) {
            $query->where('constituency_id', $poll->constituency_id);
        }

        if ($poll->ward_id) {
            $query->where('ward_id', $poll->ward_id);
        }

        return $query->get();
    }

    public function results(Poll $poll): array
    {
        $options = $poll->options()->with('aspirant')->withCount('votes')->get();
        $totalVotes = $options->sum('votes_count');

        return [
            'poll' => $poll,
            'options' => $options->sortByDesc('votes_count')->values(),
            'total_votes' => $totalVotes,
        ];
    }

    public function openPolls(): Collection
    {
        return Poll::with('position')
            ->where('is_active', true)
            ->whereDate('start_date', '<=', now())
            ->whereDate('end_date', '>=', now())
            ->orderBy('end_date')
            ->get();
    }
}
