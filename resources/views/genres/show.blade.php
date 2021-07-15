@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Genre {{$genre->name}}</div>
        <div class="card-body">
            @foreach ($genre->bands()->latest()->get() as $band)
            <a href="{{route('bands.show', $band)}}" class="d-block">{{$band->name}}</a>
            @endforeach
        </div>
    </div>
</div>
@endsection
