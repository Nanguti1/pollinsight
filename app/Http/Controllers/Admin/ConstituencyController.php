<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Constituency;
use App\Models\County;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ConstituencyController extends Controller
{
    public function index()
    {
        return Inertia::render('admin/constituencies', [
            'constituencies' => Constituency::with(['county', 'wards'])->orderBy('name')->get(),
            'counties' => County::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'county_id' => 'required|exists:counties,id',
        ]);

        Constituency::create($request->only(['name', 'county_id']));

        return redirect()->back();
    }

    public function update(Request $request, Constituency $constituency)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'county_id' => 'required|exists:counties,id',
        ]);

        $constituency->update($request->only(['name', 'county_id']));

        return redirect()->back();
    }

    public function destroy(Constituency $constituency)
    {
        $constituency->delete();

        return redirect()->back();
    }
}
