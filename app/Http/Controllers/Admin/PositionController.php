<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PositionController extends Controller
{
    public function index()
    {
        return Inertia::render('admin/positions', [
            'positions' => Position::orderBy('level')->orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'required|in:national,county,constituency,ward',
        ]);

        Position::create($request->only(['name', 'level']));

        return redirect()->back();
    }

    public function update(Request $request, Position $position)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'required|in:national,county,constituency,ward',
        ]);

        $position->update($request->only(['name', 'level']));

        return redirect()->back();
    }

    public function destroy(Position $position)
    {
        $position->delete();

        return redirect()->back();
    }
}
