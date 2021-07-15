@extends('layouts.app')

@section('content')
<div class="container">
    <h4>You are searching for <q>{{$keyword}}</q> get {{$lyrics->count()}} result.</h4>
    <div class="row">
        <div class="col-md-6">
            @foreach ($lyrics as $lyric)
                <p><a href="{{route('lyrics.show', [$lyric->band, $lyric])}}">{{$lyric->title}}</a></p>
            @endforeach
        </div>

    </div>
    <div class="mt-5">
        {{$lyrics->appends(compact('keyword'))->links()}}
    </div>
</div>
@endsection
