<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Constituency;
use App\Models\County;
use App\Models\Position;
use App\Models\Ward;
use App\Services\RankingService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class RankingController extends Controller
{
    public function index(Request $request, RankingService $service): Response
    {
        $filters = $request->validate([
            'position_id' => 'nullable|exists:positions,id',
            'county_id' => 'nullable|exists:counties,id',
            'constituency_id' => 'nullable|exists:constituencies,id',
            'ward_id' => 'nullable|exists:wards,id',
        ]);

        return Inertia::render('rankings/index', [
            'rankings' => $service->rankings(
                $filters['position_id'] ?? null,
                $filters['county_id'] ?? null,
                $filters['constituency_id'] ?? null,
                $filters['ward_id'] ?? null,
            ),
            'positions' => Position::orderBy('level')->orderBy('name')->get(),
            'counties' => County::orderBy('name')->get(),
            'constituencies' => Constituency::orderBy('name')->get(),
            'wards' => Ward::orderBy('name')->get(),
            'filters' => $filters,
        ]);
    }
}
