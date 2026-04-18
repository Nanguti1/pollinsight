<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Poll;
use App\Models\PollOption;
use App\Services\VoteService;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function store(Request $request, Poll $poll, VoteService $service)
    {
        $data = $request->validate([
            'poll_option_id' => 'required|exists:poll_options,id',
            'fingerprint' => 'required|string|max:255',
        ]);

        $option = PollOption::findOrFail($data['poll_option_id']);

        $service->castVote(
            $poll,
            $option,
            $data['fingerprint'],
            $request->ip(),
            $request->userAgent(),
        );

        return redirect()->back()->with('success', 'Vote recorded successfully.');
    }
}
