<?php

namespace Tests\Feature;

use App\Models\Position;
use Database\Seeders\PositionSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PositionSeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_position_seeder_creates_required_positions(): void
    {
        $this->seed(PositionSeeder::class);

        $requiredPositions = [
            'President',
            'Governor',
            'Senator',
            'Member of Parliament (MP)',
            'Women Representative',
            'Member of County Assembly (MCA)',
        ];

        foreach ($requiredPositions as $position) {
            $this->assertDatabaseHas('positions', ['name' => $position]);
        }

        $this->assertSame(6, Position::count());
    }
}
