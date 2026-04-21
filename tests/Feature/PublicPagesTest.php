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


    public function test_avatar_fallback_endpoint_returns_jpeg_response(): void
    {
        $this->get('/avatar.jpg')
            ->assertOk()
            ->assertHeader('Content-Type', 'image/jpeg');
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

    public function test_polls_filter_options_endpoint_returns_expected_position_labels(): void
    {
        Position::create(['name' => 'Governor', 'level' => 'county']);
        Position::create(['name' => 'Senator', 'level' => 'county']);
        Position::create(['name' => 'Women Representative', 'level' => 'county']);
        Position::create(['name' => 'Member of Parliament (MP)', 'level' => 'constituency']);
        Position::create(['name' => 'Member of County Assembly (MCA)', 'level' => 'ward']);
        Position::create(['name' => 'President', 'level' => 'national']);

        $response = $this->getJson(route('polls.filter-options'));

        $response->assertOk()
            ->assertJsonPath('positions.0.name', 'Governor')
            ->assertJsonPath('positions.1.name', 'Senator')
            ->assertJsonPath('positions.2.name', 'Women Rep')
            ->assertJsonPath('positions.3.name', 'MP')
            ->assertJsonPath('positions.4.name', 'MCA')
            ->assertJsonMissing(['name' => 'President']);
    }
}
