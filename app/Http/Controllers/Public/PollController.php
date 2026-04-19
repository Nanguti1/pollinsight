<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\County;
use App\Models\Poll;
use App\Models\Position;
use App\Services\PollService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Inertia\Inertia;
use Inertia\Response;

class PollController extends Controller
{
    /**
     * @return array<int, array{name: string, aliases: array<int, string>}>
     */
    private function positionFilterDefinitions(): array
    {
        return [
            ['name' => 'Governor', 'aliases' => ['Governor']],
            ['name' => 'Senator', 'aliases' => ['Senator']],
            ['name' => 'Women Rep', 'aliases' => ['Women Rep', 'Women Representative']],
            ['name' => 'MP', 'aliases' => ['MP', 'Member of Parliament', 'Member of Parliament (MP)']],
            ['name' => 'MCA', 'aliases' => ['MCA', 'Member of County Assembly', 'Member of County Assembly (MCA)']],
        ];
    }

    /**
     * @return \Illuminate\Support\Collection<int, array{id: int, name: string}>
     */
    private function positionFilterOptions(): Collection
    {
        $definitions = collect($this->positionFilterDefinitions());

        $aliasLookup = [];
        foreach ($definitions as $definition) {
            foreach ($definition['aliases'] as $alias) {
                $aliasLookup[mb_strtolower($alias)] = $definition['name'];
            }
        }

        $positions = Position::query()
            ->select(['id', 'name'])
            ->where(function ($query) use ($aliasLookup) {
                foreach (array_keys($aliasLookup) as $alias) {
                    $query->orWhereRaw('LOWER(name) = ?', [$alias]);
                }
            })
            ->get();

        $positionsByCanonicalName = $positions->reduce(function (array $carry, Position $position) use ($aliasLookup) {
            $canonicalName = $aliasLookup[mb_strtolower($position->name)] ?? null;
            if (! $canonicalName || isset($carry[$canonicalName])) {
                return $carry;
            }

            $carry[$canonicalName] = ['id' => $position->id, 'name' => $canonicalName];

            return $carry;
        }, []);

        return $definitions
            ->map(fn (array $definition) => $positionsByCanonicalName[$definition['name']] ?? null)
            ->filter()
            ->values();
    }

    public function index(Request $request): Response
    {
        $filters = $request->validate([
            'position_id' => 'nullable|exists:positions,id',
            'county_id' => 'nullable|exists:counties,id',
        ]);

        $polls = Poll::query()
            ->with(['position', 'county', 'constituency', 'ward'])
            ->where('is_active', true)
            ->whereDate('start_date', '<=', now())
            ->whereDate('end_date', '>=', now())
            ->when($filters['position_id'] ?? null, fn ($query, $positionId) => $query->where('position_id', $positionId))
            ->when($filters['county_id'] ?? null, fn ($query, $countyId) => $query->where('county_id', $countyId))
            ->orderBy('end_date')
            ->get()
            ->map(fn (Poll $poll) => [
                'id' => $poll->id,
                'title' => $poll->title,
                'position' => $poll->position?->name,
                'position_id' => $poll->position_id,
                'county_id' => $poll->county_id,
                'end_date' => $poll->end_date?->toDateString(),
                'location' => $poll->county?->name ?: $poll->constituency?->name ?: $poll->ward?->name ?: 'National',
            ]);

        return Inertia::render('polls/index', [
            'polls' => $polls,
            'positions' => $this->positionFilterOptions(),
            'counties' => County::orderBy('name')->get(['id', 'name']),
            'filters' => $filters,
        ]);
    }

    public function filterOptions(): JsonResponse
    {
        return response()->json([
            'positions' => $this->positionFilterOptions(),
            'counties' => County::orderBy('name')->get(['id', 'name']),
        ]);
    }

    public function show(Poll $poll, PollService $service): Response
    {
        $result = $service->results($poll);

        return Inertia::render('polls/show', [
            'poll' => [
                'id' => $result['poll']->id,
                'title' => $result['poll']->title,
                'location' => $result['poll']->county?->name ?: $result['poll']->constituency?->name ?: $result['poll']->ward?->name ?: 'National',
            ],
            'options' => $result['options']->map(fn ($option) => [
                'id' => $option->id,
                'aspirant' => [
                    'id' => $option->aspirant->id,
                    'name' => $option->aspirant->name,
                    'party' => $option->aspirant->party,
                    'photo' => $option->aspirant->photo,
                ],
                'votes_count' => $option->votes_count,
            ]),
            'total_votes' => $result['total_votes'],
        ]);
    }
}
