<?php

namespace Tests\Feature;

use App\Models\County;
use App\Models\Poll;
use App\Models\Position;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_and_static_pages_are_accessible(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertSee('View active polls');

        $this->get(route('about'))
            ->assertOk()
            ->assertSee('Who we are');

        $this->get(route('contact'))
            ->assertOk()
            ->assertSee('Get in touch')
            ->assertSee('Send message');
    }

    public function test_about_page_uses_backend_content_value(): void
    {
        Cache::put('public.about.content', 'Managed from admin content section.');

        $this->get(route('about'))
            ->assertOk()
            ->assertSee('Managed from admin content section.');
    }

    public function test_polls_page_can_be_filtered_by_position_and_county(): void
    {
        $positionOne = Position::create(['name' => 'Governor', 'level' => 'county']);
        $positionTwo = Position::create(['name' => 'Senator', 'level' => 'county']);

        $countyOne = County::create(['name' => 'Nairobi']);
        $countyTwo = County::create(['name' => 'Mombasa']);

        Poll::create([
            'title' => 'Nairobi Governor Tracker',
            'position_id' => $positionOne->id,
            'county_id' => $countyOne->id,
            'start_date' => now()->subDay(),
            'end_date' => now()->addDay(),
            'is_active' => true,
        ]);

        Poll::create([
            'title' => 'Mombasa Senator Tracker',
            'position_id' => $positionTwo->id,
            'county_id' => $countyTwo->id,
            'start_date' => now()->subDay(),
            'end_date' => now()->addDay(),
            'is_active' => true,
        ]);

        $this->get(route('polls.index', ['position_id' => $positionOne->id, 'county_id' => $countyOne->id]))
            ->assertOk()
            ->assertSee('Nairobi Governor Tracker')
            ->assertDontSee('Mombasa Senator Tracker');
    }
}
