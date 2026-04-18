<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'level'])]
class Position extends Model
{
    use HasFactory;

    public function aspirants()
    {
        return $this->hasMany(Aspirant::class);
    }

    public function polls()
    {
        return $this->hasMany(Poll::class);
    }
}
