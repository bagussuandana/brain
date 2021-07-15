@extends('layouts.backend', ['title' => 'Edit Album'])
@section('content')
<div class="card">
    <div class="card-header">Edit Album</div>
    <div class="card-body">
        <form action="{{route('albums.edit', $album->slug)}}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            @include('albums.partials.form-control',[
                'submit' => 'Update',
            ])
        </form>
    </div>
</div>
@endsection