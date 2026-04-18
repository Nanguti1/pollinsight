<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['poll_id', 'aspirant_id'])]
class PollOption extends Model
{
    use HasFactory;

    public function poll()
    {
        return $this->belongsTo(Poll::class);
    }

    public function aspirant()
    {
        return $this->belongsTo(Aspirant::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}
