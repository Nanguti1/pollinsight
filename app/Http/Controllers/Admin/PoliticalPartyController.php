<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PoliticalParty;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PoliticalPartyController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('admin/political-parties', [
            'politicalParties' => PoliticalParty::query()->withCount('aspirants')->orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:political_parties,name',
            'abbreviation' => 'nullable|string|max:20',
        ]);

        PoliticalParty::create($data);

        return redirect()->back();
    }

    public function update(Request $request, PoliticalParty $politicalParty)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:political_parties,name,'.$politicalParty->id,
            'abbreviation' => 'nullable|string|max:20',
        ]);

        $politicalParty->update($data);

        return redirect()->back();
    }

    public function destroy(PoliticalParty $politicalParty)
    {
        $politicalParty->delete();

        return redirect()->back();
    }
}
