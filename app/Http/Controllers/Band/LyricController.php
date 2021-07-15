<?php

namespace App\Http\Controllers\Band;

use App\Http\Controllers\Controller;
use App\Http\Resources\LyricResource;
use App\Models\Album;
use App\Models\Band;
use App\Models\Lyric;
use Illuminate\Support\Str;

class LyricController extends Controller
{
    public function create()
    {
        return view('lyrics.create',[
            'title' => "New Lyric",
        ]);
    }
    public function store()
    {
        request()->validate([
            'album' => 'required',
            'band' => 'required',
            'body' => 'required',
            'title' => 'required',

        ]);
        $band = Band::find(request('band'));
        $band->lyrics()->create([
            'title' => request('title'),
            'slug' => Str::slug(request('title')),
            'body' => request('body'),
            'album_id' => request('album'),

        ]);

        return response()->json(['message' => 'The lysrics was created into band '. $band->name]);
    }
    public function table()
    {
        return view('lyrics.table',[
            'title' => 'Lyrics Table',
        ]);
    }
    public function dataTable()
    {
        $bandId = request('band_id');
        $albumId = request('album_id');
        if ($bandId && !$albumId) {
            $lyrics = Lyric::with('band','album')->where('band_id', $bandId)->latest()->get();
        } elseif($bandId && $albumId) {
            $lyrics = Lyric::with('band','album')->where('band_id', $bandId)->where('album_id', $albumId)->latest()->get();
        } else {
            $lyrics = Lyric::with('band','album')->latest()->paginate(10);
        }
        
        return LyricResource::collection($lyrics);
    }

    public function edit(Lyric $lyric)
    {
        return view('lyrics.edit', [
            'title' => 'Edit Lyric : '.$lyric->title,
            'lyric' => $lyric,
        ]);

    }
    public function show(Band $band,Lyric $lyric)
    {
        $album = Album::find($lyric->album_id);
        $lyrics = $album->lyrics()->where('id', '!=', $lyric->id)->get();
        return view('lyrics.show', [
            'title' => "{$band->name} - {$lyric->title}",
            'lyric' => $lyric,
            'band' => $band,
            'lyrics' => $lyrics,

        ]);
    }
    public function update(Lyric $lyric)
    {
        request()->validate([
            'album' => 'required',
            'band' => 'required',
            'body' => 'required',
            'title' => 'required',

        ]);
        $band = Band::find(request('band'));
        $lyric->update([
            'title' => request('title'),
            'band_id' => request('band'),
            'slug' => Str::slug(request('title')),
            'body' => request('body'),
            'album_id' => request('album'),

        ]);

        return response()->json(['message' => 'The lysrics was updated into band '. $band->name]);
    }
    public function destroy(Lyric $lyric)
    {
        $lyric->delete();

    }
}
