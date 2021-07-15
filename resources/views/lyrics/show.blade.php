@extends('layouts.app')

@section('content')
<div class="container">
<img src="{{'/storage/'.$band->thumbnail}}" alt="{{$band->name}}" class="w-100" height="500px" style="object-fit: cover; object-position: center;">
<div class="row">
    <div class="col-md-8 mt-4">
        <h4 class="">{{$band->name}} - <span class="text-secondary">{{$lyric->title}}</span></h4>
        <p>{!!nl2br($lyric->body)!!}</p>
    </div>
    <div class="col-md-4 mt-4">
        <h4 class="md-4">The same album</h4>
        @foreach ($lyrics as $item)
            <a href="{{route('lyrics.show', [$band, $item])}}" class="d-block">
                {{$item->title}}
            </a>
        @endforeach
    </div>
</div>
</div>
@endsection
