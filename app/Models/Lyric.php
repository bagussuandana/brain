<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lyric extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function album()
    {
        return $this->belongsTo(Album::class);
    }
    public function band()
    {
        return $this->belongsTo(Band::class);
    }
}
