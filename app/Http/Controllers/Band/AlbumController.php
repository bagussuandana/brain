<?php

namespace App\Http\Controllers\Band;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Band;
use Illuminate\Support\Str;

class AlbumController extends Controller
{
    public function table()
    {
        return view('albums.table', [
            'albums' => Album::with('band')->latest()->paginate(16),
        ]);
    }
    public function create(Album $album)
    {
        return view('albums.create', [
            'bands' => Band::get(),
            'album' => $album,
        ]);
    }
    public function store()
    {
        request()->validate([
            'name' => 'required|unique:albums',
            'band' => 'required',
            'year' => 'required',
        ]);
        $band = Band::find(request('band'));
        Album::create([
            'name' =>request('name'),
            'slug' => Str::slug(request('name')),
            'band_id' => request('band'),
            'year' => request('year'),
        ]);
        return back()->with('status', 'Album was created for'. $band->name);
    }
    public function edit(Album $album)
    {
        return view('albums.edit', [
            'album' => $album,
            'bands' => Band::get(),
        ]);
    }
    public function update(Album $album)
    {
        request()->validate([
            'name' => 'required|unique:albums,name,' . $album->id,
            'band' => 'required',
            'year' => 'required',
        ]);
    
        $album->update([
            'name' =>request('name'),
            'slug' => Str::slug(request('name')),
            'band_id' => request('band'),
            'year' => request('year'),
        ]);
        return redirect()->route('albums.table')->with('status', 'Album was updated');
    }
    public function destroy(Album $album)
    {
        $album->delete();
    }

    public function getAlbumsByBandId(Band $band)
    {
        return $band->albums;
    }
}
