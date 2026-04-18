<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Constituency;
use App\Models\County;
use App\Models\Poll;
use App\Models\Position;
use App\Models\Ward;
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
            'constituency_id' => 'nullable|exists:constituencies,id',
            'ward_id' => 'nullable|exists:wards,id',
            'is_active' => 'nullable|boolean',
        ]);

        $polls = Poll::query()
            ->with(['position', 'county', 'constituency', 'ward'])
            ->when($filters['position_id'] ?? null, fn ($query, $positionId) => $query->where('position_id', $positionId))
            ->when($filters['county_id'] ?? null, fn ($query, $countyId) => $query->where('county_id', $countyId))
            ->when($filters['constituency_id'] ?? null, fn ($query, $constituencyId) => $query->where('constituency_id', $constituencyId))
            ->when($filters['ward_id'] ?? null, fn ($query, $wardId) => $query->where('ward_id', $wardId))
            ->when(array_key_exists('is_active', $filters), fn ($query) => $query->where('is_active', (bool) $filters['is_active']))
            ->orderByDesc('created_at')
            ->get();

        $counties = County::orderBy('name')->get();
        $constituencies = Constituency::query()
            ->when($filters['county_id'] ?? null, fn ($query, $countyId) => $query->where('county_id', $countyId))
            ->orderBy('name')
            ->get();
        $wards = Ward::query()
            ->when($filters['constituency_id'] ?? null, fn ($query, $constituencyId) => $query->where('constituency_id', $constituencyId))
            ->orderBy('name')
            ->get();

        return Inertia::render('admin/polls', [
            'polls' => $polls,
            'positions' => Position::orderBy('level')->orderBy('name')->get(),
            'counties' => $counties,
            'constituencies' => $constituencies,
            'wards' => $wards,
            'allConstituencies' => Constituency::orderBy('name')->get(),
            'allWards' => Ward::orderBy('name')->get(),
            'filters' => $filters,
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
