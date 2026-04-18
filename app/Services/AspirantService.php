<?php

namespace App\Services;

use App\Models\Aspirant;
use App\Models\Position;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AspirantService
{
    public function create(array $data): Aspirant
    {
        $this->validateLocationForPosition($data['position_id'], $data['county_id'] ?? null, $data['constituency_id'] ?? null, $data['ward_id'] ?? null);

        return Aspirant::create($data);
    }

    public function update(Aspirant $aspirant, array $data): Aspirant
    {
        $this->validateLocationForPosition($data['position_id'] ?? $aspirant->position_id, $data['county_id'] ?? $aspirant->county_id, $data['constituency_id'] ?? $aspirant->constituency_id, $data['ward_id'] ?? $aspirant->ward_id);

        $aspirant->fill($data);
        $aspirant->save();

        return $aspirant;
    }

    protected function validateLocationForPosition(int $positionId, ?int $countyId, ?int $constituencyId, ?int $wardId): void
    {
        $position = Position::find($positionId);

        if (! $position) {
            throw new ModelNotFoundException('Position not found.');
        }

        match ($position->level) {
            'national' => $this->assertAllNull($countyId, $constituencyId, $wardId),
            'county' => $this->assertCountyOnly($countyId, $constituencyId, $wardId),
            'constituency' => $this->assertConstituencyOnly($constituencyId, $wardId),
            'ward' => $this->assertWardOnly($wardId),
            default => throw new \InvalidArgumentException('Unsupported position level.'),
        };
    }

    protected function assertAllNull(?int $countyId, ?int $constituencyId, ?int $wardId): void
    {
        if ($countyId || $constituencyId || $wardId) {
            throw new \InvalidArgumentException('National aspirants must not have geographic assignments.');
        }
    }

    protected function assertCountyOnly(?int $countyId, ?int $constituencyId, ?int $wardId): void
    {
        if (! $countyId || $constituencyId || $wardId) {
            throw new \InvalidArgumentException('County aspirants must include county only.');
        }
    }

    protected function assertConstituencyOnly(?int $constituencyId, ?int $wardId): void
    {
        if (! $constituencyId || $wardId) {
            throw new \InvalidArgumentException('MP aspirants must include constituency only.');
        }
    }

    protected function assertWardOnly(?int $wardId): void
    {
        if (! $wardId) {
            throw new \InvalidArgumentException('MCA aspirants must include ward only.');
        }
    }
}
