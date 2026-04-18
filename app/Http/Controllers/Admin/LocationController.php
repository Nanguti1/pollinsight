<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\County;
use App\Models\Constituency;
use App\Models\Ward;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LocationController extends Controller
{
    public function index()
    {
        return Inertia::render('admin/locations', [
            'counties' => County::with(['constituencies.wards'])->orderBy('name')->get(),
            'constituencies' => Constituency::with('county')->orderBy('name')->get(),
            'wards' => Ward::with(['constituency.county'])->orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|string|in:county,constituency,ward',
            'name' => 'required|string|max:255',
            'county_id' => 'nullable|exists:counties,id',
            'constituency_id' => 'nullable|exists:constituencies,id',
        ]);

        match ($data['type']) {
            'county' => County::create(['name' => $data['name']]),
            'constituency' => Constituency::create(['name' => $data['name'], 'county_id' => $data['county_id']]),
            'ward' => Ward::create(['name' => $data['name'], 'constituency_id' => $data['constituency_id']]),
        };

        return redirect()->back();
    }

    public function update(Request $request, string $type, int $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $model = match ($type) {
            'county' => County::findOrFail($id),
            'constituency' => Constituency::findOrFail($id),
            'ward' => Ward::findOrFail($id),
            default => abort(404),
        };

        $model->update(['name' => $data['name']]);

        return redirect()->back();
    }

    public function destroy(string $type, int $id)
    {
        $model = match ($type) {
            'county' => County::findOrFail($id),
            'constituency' => Constituency::findOrFail($id),
            'ward' => Ward::findOrFail($id),
            default => abort(404),
        };

        $model->delete();

        return redirect()->back();
    }
}
