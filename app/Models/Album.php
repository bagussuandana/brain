<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function band()
    {
        return $this->belongsTo(Band::class);
    }
    public function lyrics()
    {
        return $this->hasMany(Lyric::class);
    }
}
