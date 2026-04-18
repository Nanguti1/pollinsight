<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    public function run(): void
    {
        $positions = [
            ['name' => 'President', 'level' => 'national'],
            ['name' => 'Governor', 'level' => 'county'],
            ['name' => 'Senator', 'level' => 'county'],
            ['name' => 'Member of Parliament (MP)', 'level' => 'constituency'],
            ['name' => 'Women Representative', 'level' => 'county'],
            ['name' => 'Member of County Assembly (MCA)', 'level' => 'ward'],
        ];

        foreach ($positions as $position) {
            Position::updateOrCreate(['name' => $position['name']], ['level' => $position['level']]);
        }
    }
}
