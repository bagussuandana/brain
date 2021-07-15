@extends('layouts.backend', ['title' => 'New Album'])
@section('content')
<div class="card">
    <div class="card-header">New Album</div>
    <div class="card-body">
        <form action="{{route('albums.create')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('albums.partials.form-control',[
                'submit' => 'Create',
            ])
        </form>
    </div>
</div>
@endsection