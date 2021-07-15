@extends('layouts.backend', ['title' => $title])
@section('content')
<div class="card">
    <div id="table-of-lyric" title="{{$title}}" endpoint="{{route('lyrics.datatable')}}"></div>
@endsection