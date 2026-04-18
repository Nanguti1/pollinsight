<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'county_id'])]
class Constituency extends Model
{
    use HasFactory;

    public function county()
    {
        return $this->belongsTo(County::class);
    }

    public function wards()
    {
        return $this->hasMany(Ward::class);
    }

    public function aspirants()
    {
        return $this->hasMany(Aspirant::class);
    }

    public function polls()
    {
        return $this->hasMany(Poll::class);
    }
}
