<?php

namespace App\Http\Controllers\Band;

use App\Http\Controllers\Controller;
use App\Models\Band;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BandController extends Controller
{
    public function table()
    {
        if (request()->expectsJson()) {
            return Band::latest()->get(['id', 'name']);
        }
        return view('bands.table', [
            'bands' => Band::latest()->paginate(16),
        ]);
    }
    public function create()
    {
        return view('bands.create',[
            'genres' => Genre::get(),
            'band' => new Band,
        ]);
    }
    public function store()
    {
        request()->validate([
            'name' => 'required|unique:bands,name',
            'thumbnail' =>  'nullable|image|mimes:jpeg,jpg,png,gif',
            'genres' => 'required|array',
        ]);

        $band = Band::create([
            'name' => request('name'),
            'slug' => Str::slug(request('name')),
            'thumbnail' => request('thumbnail') ? request()->file('thumbnail')->store('images/band') : null,
        ]);

        $band->genres()->sync(request('genres'));

        return back()->with('success', 'Band was created');
    }

    public function edit(Band $band)
    {
        return view('bands.edit',[
            'band' => $band,
            'genres' => Genre::get(),

        ]);
    }
    public function update(Band $band)
    {
        request()->validate([
            'name' => 'required|unique:bands,name,'.$band->id,
            'thumbnail' => request('thumbnail') ? 'image|mimes:jpeg,jpg,png,gif' : '',
            'genres' => 'required|array',
        ]);

        if (request('thumbnail')) {
            Storage::delete($band->thumbnail);
            $thumbnail = request()->file('thumbnail')->store('images/band');
        } elseif($band->thumbnail) {
            $thumbnail = $band->thumbnail;
        } else {
            $thumbnail = null;
        }
        

        $band->update([
            'name' => request('name'),
            'slug' => Str::slug(request('name')),
            'thumbnail' => $thumbnail,
        ]);

        $band->genres()->sync(request('genres'));

        return back()->with('success', 'Band was updated');
    }

    public function destroy(Band $band)
    {
        Storage::delete($band->thumbnail);
        $band->genres()->detach();
        $band->delete();
    }

    public function show(Band $band)
    {
        return view('bands.show', [
            'band' => $band,
            'title' => $band->name,
        ]);
    }
}
