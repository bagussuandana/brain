<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function albums()
    {
        return $this->hasMany(Album::class);
    }
    public function album()
    {
        return $this->hasOne(Album::class)->latest();
    }
    public function lyrics()
    {
        return $this->hasMany(Lyric::class);
    }
    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

}
