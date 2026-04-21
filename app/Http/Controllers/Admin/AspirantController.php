<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aspirant;
use App\Models\Constituency;
use App\Models\County;
use App\Models\PoliticalParty;
use App\Models\Position;
use App\Models\Ward;
use App\Services\AspirantService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;

class AspirantController extends Controller
{
    public function index(Request $request): Response
    {
        $filters = $request->validate([
            'position_id' => 'nullable|exists:positions,id',
            'county_id' => 'nullable|exists:counties,id',
            'constituency_id' => 'nullable|exists:constituencies,id',
            'ward_id' => 'nullable|exists:wards,id',
            'status' => 'nullable|in:active,inactive',
        ]);

        $aspirants = Aspirant::query()
            ->with(['position', 'politicalParty', 'county', 'constituency', 'ward'])
            ->when($filters['position_id'] ?? null, fn ($query, $positionId) => $query->where('position_id', $positionId))
            ->when($filters['county_id'] ?? null, fn ($query, $countyId) => $query->where('county_id', $countyId))
            ->when($filters['constituency_id'] ?? null, fn ($query, $constituencyId) => $query->where('constituency_id', $constituencyId))
            ->when($filters['ward_id'] ?? null, fn ($query, $wardId) => $query->where('ward_id', $wardId))
            ->when($filters['status'] ?? null, fn ($query, $status) => $query->where('status', $status))
            ->orderBy('name')
            ->get()
            ->map(function (Aspirant $aspirant) {
                $photoUrl = $aspirant->photo;

                if ($aspirant->photo && ! str_starts_with($aspirant->photo, 'http')) {
                    $photoUrl = Storage::disk('public')->url($aspirant->photo);
                }

                return [
                    ...$aspirant->toArray(),
                    'photo_url' => $photoUrl,
                ];
            });

        $counties = County::orderBy('name')->get();
        $constituencies = Constituency::query()
            ->when($filters['county_id'] ?? null, fn ($query, $countyId) => $query->where('county_id', $countyId))
            ->orderBy('name')
            ->get();
        $wards = Ward::query()
            ->when($filters['constituency_id'] ?? null, fn ($query, $constituencyId) => $query->where('constituency_id', $constituencyId))
            ->orderBy('name')
            ->get();

        return Inertia::render('admin/aspirants', [
            'aspirants' => $aspirants,
            'positions' => Position::orderBy('level')->orderBy('name')->get(),
            'politicalParties' => PoliticalParty::orderBy('name')->get(),
            'counties' => $counties,
            'constituencies' => $constituencies,
            'wards' => $wards,
            'allConstituencies' => Constituency::orderBy('name')->get(),
            'allWards' => Ward::orderBy('name')->get(),
            'filters' => $filters,
        ]);
    }

    public function store(Request $request, AspirantService $service)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|max:4096',
            'political_party_id' => 'required|exists:political_parties,id',
            'position_id' => 'required|exists:positions,id',
            'county_id' => 'nullable|exists:counties,id',
            'constituency_id' => 'nullable|exists:constituencies,id',
            'ward_id' => 'nullable|exists:wards,id',
            'bio' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        $politicalParty = PoliticalParty::query()->findOrFail((int) $data['political_party_id']);
        $data['party'] = $politicalParty->name;

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('aspirants', 'public');
        }

        $service->create($data);

        return redirect()->back();
    }

    public function update(Request $request, Aspirant $aspirant, AspirantService $service)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|max:4096',
            'political_party_id' => 'required|exists:political_parties,id',
            'position_id' => 'required|exists:positions,id',
            'county_id' => 'nullable|exists:counties,id',
            'constituency_id' => 'nullable|exists:constituencies,id',
            'ward_id' => 'nullable|exists:wards,id',
            'bio' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        $politicalParty = PoliticalParty::query()->findOrFail((int) $data['political_party_id']);
        $data['party'] = $politicalParty->name;

        if ($request->hasFile('photo')) {
            if ($aspirant->photo && ! str_starts_with($aspirant->photo, 'http')) {
                Storage::disk('public')->delete($aspirant->photo);
            }

            $data['photo'] = $request->file('photo')->store('aspirants', 'public');
        }

        $service->update($aspirant, $data);

        return redirect()->back();
    }

    public function destroy(Aspirant $aspirant)
    {
        $aspirant->delete();

        return redirect()->back();
    }
}
