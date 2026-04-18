<?php

namespace App\Services;

use App\Models\Vote;
use Illuminate\Database\Eloquent\Collection;

class RankingService
{
    public function rankings(?int $positionId = null, ?int $countyId = null, ?int $constituencyId = null): Collection
    {
        $query = Vote::query()
            ->selectRaw('aspirants.id as aspirant_id, aspirants.name, aspirants.photo, aspirants.party, positions.name as position_name, positions.level as position_level, COUNT(votes.id) as votes')
            ->join('poll_options', 'votes.poll_option_id', '=', 'poll_options.id')
            ->join('aspirants', 'poll_options.aspirant_id', '=', 'aspirants.id')
            ->join('positions', 'aspirants.position_id', '=', 'positions.id');

        if ($positionId) {
            $query->where('aspirants.position_id', $positionId);
        }

        if ($countyId) {
            $query->where('aspirants.county_id', $countyId);
        }

        if ($constituencyId) {
            $query->where('aspirants.constituency_id', $constituencyId);
        }

        return $query
            ->groupBy('aspirants.id', 'aspirants.name', 'aspirants.photo', 'aspirants.party', 'positions.name', 'positions.level')
            ->orderByDesc('votes')
            ->get();
    }
}
