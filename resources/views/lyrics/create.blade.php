@extends('layouts.backend', ['title' => $title])
@section('content')
<div class="card">
    <div id="create-lyric" title="{{$title}}" endpoint="{{route('lyrics.create')}}"></div>
@endsection