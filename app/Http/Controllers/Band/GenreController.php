<?php

namespace App\Http\Controllers\Band;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GenreController extends Controller
{
    public function table()
    {
        return view('genres.table', [
            'genres' => Genre::withCount('bands')->latest()->paginate(16),
        ]);
    }
    public function create(Genre $genre)
    {
        return view('genres.create', [
            'genre' => $genre,
        ]);
    }
    public function store(Genre $genre)
    {
        request()->validate([
            'name' => 'required|unique:genres',
        ]);
        Genre::create([
            'name' =>request('name'),
            'slug' => Str::slug(request('name')),
        ]);
        return back()->with('status', 'Genre was created for'. $genre->name);
    }
    public function edit(Genre $genre)
    {
        return view('genres.edit', [
            'genre' => $genre,
        ]);
    }
    public function update(Genre $genre)
    {
        request()->validate([
            'name' => 'required|unique:genres,name,' . $genre->id,
        ]);
    
        $genre->update([
            'name' =>request('name'),
            'slug' => Str::slug(request('name')),
        ]);
        return redirect()->route('genres.table')->with('status', 'Genre was updated');
    }
    public function destroy(Genre $genre)
    {
        $genre->delete();
    }
    public function show(Genre $genre)
    {
        return view('genres.show',[
            'title' => $genre->name,
            'genre' => $genre,

        ]);
    }

}
