<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aspirant;
use App\Models\Constituency;
use App\Models\County;
use App\Models\PoliticalParty;
use App\Models\Position;
use App\Models\Poll;
use App\Models\Ward;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('admin/dashboard', [
            'summary' => [
                'aspirants' => Aspirant::count(),
                'mcaAspirants' => $this->aspirantsCountForRole('mca'),
                'mpAspirants' => $this->aspirantsCountForRole('mp'),
                'womenRepAspirants' => $this->aspirantsCountForRole('women rep'),
                'senatorAspirants' => $this->aspirantsCountForRole('senator'),
                'governorAspirants' => $this->aspirantsCountForRole('governor'),
                'polls' => Poll::count(),
                'politicalParties' => PoliticalParty::count(),
                'wards' => Ward::count(),
                'constituencies' => Constituency::count(),
                'counties' => County::count(),
                'positions' => Position::count(),
            ],
        ]);
    }

    private function aspirantsCountForRole(string $role): int
    {
        return Aspirant::query()
            ->whereHas('position', function ($query) use ($role) {
                $query->whereRaw('LOWER(name) LIKE ?', ['%'.strtolower($role).'%']);
            })
            ->count();
    }
}
