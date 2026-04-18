<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\County;
use App\Models\Poll;
use App\Models\Position;
use App\Services\PollService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PollController extends Controller
{
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
            'positions' => Position::orderBy('level')->orderBy('name')->get(['id', 'name']),
            'counties' => County::orderBy('name')->get(['id', 'name']),
            'filters' => $filters,
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
