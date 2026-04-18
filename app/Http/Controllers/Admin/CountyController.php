<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\County;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CountyController extends Controller
{
    public function index()
    {
        return Inertia::render('admin/counties', [
            'counties' => County::with(['constituencies.wards'])->orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:counties',
        ]);

        County::create($request->only(['name']));

        return redirect()->back();
    }

    public function update(Request $request, County $county)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:counties,name,'.$county->id,
        ]);

        $county->update($request->only(['name']));

        return redirect()->back();
    }

    public function destroy(County $county)
    {
        $county->delete();

        return redirect()->back();
    }
}
