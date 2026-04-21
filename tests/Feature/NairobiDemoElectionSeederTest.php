<?php

namespace Tests\Feature;

use App\Models\Aspirant;
use App\Models\Poll;
use App\Models\PollOption;
use Database\Seeders\KenyanGeographySeeder;
use Database\Seeders\NairobiDemoElectionSeeder;
use Database\Seeders\PositionSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NairobiDemoElectionSeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_nairobi_demo_seeder_creates_aspirants_and_polls_ready_for_voting(): void
    {
        $this->seed([
            KenyanGeographySeeder::class,
            PositionSeeder::class,
            NairobiDemoElectionSeeder::class,
        ]);

        $this->assertGreaterThanOrEqual(10, Aspirant::count());
        $this->assertSame(5, Poll::count());

        $this->assertDatabaseHas('aspirants', [
            'name' => 'Amina Odhiambo',
            'party' => 'United Civic Movement',
            'status' => 'active',
        ]);

        $this->assertDatabaseHas('polls', [
            'title' => 'Nairobi Governor Preference Poll',
            'is_active' => true,
        ]);

        $this->assertDatabaseHas('polls', [
            'title' => 'Westlands MP Preference Poll',
            'is_active' => true,
        ]);

        $this->assertGreaterThan(0, PollOption::count());

        $this->assertDatabaseHas('poll_options', [
            'poll_id' => Poll::query()->where('title', 'Nairobi Governor Preference Poll')->firstOrFail()->id,
            'aspirant_id' => Aspirant::query()->where('name', 'Amina Odhiambo')->firstOrFail()->id,
        ]);
    }
}
