<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'abbreviation'])]
class PoliticalParty extends Model
{
    use HasFactory;

    public function aspirants()
    {
        return $this->hasMany(Aspirant::class);
    }
}
