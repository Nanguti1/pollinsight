<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class PageController extends Controller
{
    public function about(): Response
    {
        $aboutContent = cache()->get('public.about.content', 'PollInsight Kenya provides structured, anonymous polling and real-time political insights across Kenya\'s counties, constituencies, and wards.');

        return Inertia::render('about', [
            'aboutContent' => $aboutContent,
        ]);
    }

    public function contact(): Response
    {
        return Inertia::render('contacts');
    }
}
