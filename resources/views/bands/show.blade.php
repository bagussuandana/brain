@extends('layouts.app')

@section('content')
<div class="container">
    <img src="{{'/storage/'.$band->thumbnail}}" alt="{{$band->name}}" class="w-100" height="550px" style="object-fit: cover; object-position: center;">
    <h3 class="mt-4">{{$band->name}}</h3>
    <div class="d-flex mb-3">
        @foreach ($band->genres as $genre)
        <a href="{{route('genres.show', $genre)}}" class="mr-2 text-secondary">{{$genre->name}}</a>
        @endforeach
    </div>
    
    @foreach ($band->albums()->withCount('lyrics')->with('lyrics')->latest()->get() as $album)
    @if ($album->lyrics_count)
    <div class="card mb-5">
        <div class="card-header">{{$album->name}} - {{$album->year}}</div>
        <div class="card-body">
            @foreach ($album->lyrics as $lyric)
            <a href="{{route('lyrics.show',['band' => $band, 'lyric' => $lyric])}}" class="d-block">{{$lyric->title}}</a>
                
            @endforeach
        </div>
    </div>
    @endif
    @endforeach
    
</div>
@endsection
