<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'photo', 'party', 'position_id', 'county_id', 'constituency_id', 'ward_id', 'bio', 'status'])]
class Aspirant extends Model
{
    use HasFactory;

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function county()
    {
        return $this->belongsTo(County::class);
    }

    public function constituency()
    {
        return $this->belongsTo(Constituency::class);
    }

    public function ward()
    {
        return $this->belongsTo(Ward::class);
    }

    public function pollOptions()
    {
        return $this->hasMany(PollOption::class);
    }
}
