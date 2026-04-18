<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Poll;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function index(): Response
    {
        $activePolls = Poll::query()
            ->with(['position', 'county', 'constituency', 'ward'])
            ->where('is_active', true)
            ->whereDate('start_date', '<=', now())
            ->whereDate('end_date', '>=', now())
            ->orderBy('end_date')
            ->limit(6)
            ->get()
            ->map(fn (Poll $poll) => [
                'id' => $poll->id,
                'title' => $poll->title,
                'position' => $poll->position?->name,
                'location' => $poll->county?->name ?: $poll->constituency?->name ?: $poll->ward?->name ?: 'National',
                'end_date' => $poll->end_date?->toDateString(),
            ]);

        $pollsPerCounty = Poll::query()
            ->select('counties.name as county_name', DB::raw('COUNT(polls.id) as poll_count'))
            ->join('counties', 'polls.county_id', '=', 'counties.id')
            ->where('polls.is_active', true)
            ->whereDate('polls.start_date', '<=', now())
            ->whereDate('polls.end_date', '>=', now())
            ->groupBy('counties.name')
            ->orderByDesc('poll_count')
            ->limit(8)
            ->get();

        return Inertia::render('welcome', [
            'activePolls' => $activePolls,
            'pollsPerCounty' => $pollsPerCounty,
        ]);
    }
}
