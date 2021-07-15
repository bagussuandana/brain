@extends('layouts.backend', ['title' => $title])
@section('content')
<div class="card">
    <div id="edit-lyric" title="{{$title}}" endpoint="{{route('lyrics.show', $lyric)}}"></div>
@endsection