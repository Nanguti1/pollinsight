<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Poll;
use App\Services\PollService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PollController extends Controller
{
    public function index(PollService $service)
    {
        return Inertia::render('polls/index', [
            'polls' => $service->openPolls()->map(fn (Poll $poll) => [
                'id' => $poll->id,
                'title' => $poll->title,
                'position' => $poll->position->name,
                'end_date' => $poll->end_date?->toDateString(),
                'location' => $poll->county?->name ?: $poll->constituency?->name ?: $poll->ward?->name ?: 'National',
            ]),
        ]);
    }

    public function show(Poll $poll, PollService $service)
    {
        $result = $service->results($poll);

        return Inertia::render('polls/show', [
            'poll' => $result['poll'],
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
