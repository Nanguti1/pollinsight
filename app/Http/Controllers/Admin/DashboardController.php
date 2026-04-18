<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aspirant;
use App\Models\Poll;
use App\Models\Position;
use App\Models\County;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('admin/dashboard', [
            'summary' => [
                'counties' => County::count(),
                'positions' => Position::count(),
                'aspirants' => Aspirant::count(),
                'polls' => Poll::count(),
            ],
        ]);
    }
}
