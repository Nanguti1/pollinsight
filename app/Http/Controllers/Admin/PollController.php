<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Poll;
use App\Models\County;
use App\Models\Constituency;
use App\Models\Position;
use App\Models\Ward;
use App\Services\PollService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PollController extends Controller
{
    public function index()
    {
        return Inertia::render('admin/polls', [
            'polls' => Poll::with(['position', 'county', 'constituency', 'ward'])->orderByDesc('created_at')->get(),
            'positions' => Position::orderBy('level')->orderBy('name')->get(),
            'counties' => County::orderBy('name')->get(),
            'constituencies' => Constituency::orderBy('name')->get(),
            'wards' => Ward::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request, PollService $service)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'position_id' => 'required|exists:positions,id',
            'county_id' => 'nullable|exists:counties,id',
            'constituency_id' => 'nullable|exists:constituencies,id',
            'ward_id' => 'nullable|exists:wards,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'is_active' => 'boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active');

        $service->create($data);

        return redirect()->back();
    }

    public function update(Request $request, Poll $poll, PollService $service)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'position_id' => 'required|exists:positions,id',
            'county_id' => 'nullable|exists:counties,id',
            'constituency_id' => 'nullable|exists:constituencies,id',
            'ward_id' => 'nullable|exists:wards,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'is_active' => 'boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active');

        $poll->update($data);
        $service->createOptions($poll);

        return redirect()->back();
    }

    public function destroy(Poll $poll)
    {
        $poll->delete();

        return redirect()->back();
    }

    public function results(Poll $poll, PollService $service)
    {
        $result = $service->results($poll);

        return Inertia::render('admin/poll-results', $result);
    }
}
