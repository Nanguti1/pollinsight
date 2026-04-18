<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aspirant;
use App\Models\County;
use App\Models\Constituency;
use App\Models\Position;
use App\Models\Ward;
use App\Services\AspirantService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AspirantController extends Controller
{
    public function index()
    {
        return Inertia::render('admin/aspirants', [
            'aspirants' => Aspirant::with(['position', 'county', 'constituency', 'ward'])->orderBy('name')->get(),
            'positions' => Position::orderBy('level')->orderBy('name')->get(),
            'counties' => County::orderBy('name')->get(),
            'constituencies' => Constituency::orderBy('name')->get(),
            'wards' => Ward::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request, AspirantService $service)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|string|max:1000',
            'party' => 'required|string|max:255',
            'position_id' => 'required|exists:positions,id',
            'county_id' => 'nullable|exists:counties,id',
            'constituency_id' => 'nullable|exists:constituencies,id',
            'ward_id' => 'nullable|exists:wards,id',
            'bio' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        $service->create($data);

        return redirect()->back();
    }

    public function update(Request $request, Aspirant $aspirant, AspirantService $service)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|string|max:1000',
            'party' => 'required|string|max:255',
            'position_id' => 'required|exists:positions,id',
            'county_id' => 'nullable|exists:counties,id',
            'constituency_id' => 'nullable|exists:constituencies,id',
            'ward_id' => 'nullable|exists:wards,id',
            'bio' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        $service->update($aspirant, $data);

        return redirect()->back();
    }

    public function destroy(Aspirant $aspirant)
    {
        $aspirant->delete();

        return redirect()->back();
    }
}
