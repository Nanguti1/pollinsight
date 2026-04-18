<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Constituency;
use App\Models\Ward;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WardController extends Controller
{
    public function index()
    {
        return Inertia::render('admin/wards', [
            'wards' => Ward::with(['constituency.county'])->orderBy('name')->get(),
            'constituencies' => Constituency::with('county')->orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'constituency_id' => 'required|exists:constituencies,id',
        ]);

        Ward::create($request->only(['name', 'constituency_id']));

        return redirect()->back();
    }

    public function update(Request $request, Ward $ward)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'constituency_id' => 'required|exists:constituencies,id',
        ]);

        $ward->update($request->only(['name', 'constituency_id']));

        return redirect()->back();
    }

    public function destroy(Ward $ward)
    {
        $ward->delete();

        return redirect()->back();
    }
}
