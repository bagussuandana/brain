@extends('layouts.backend', ['title' => 'Edit Genre'])
@section('content')
<div class="card">
    <div class="card-header">Edit Genre</div>
    <div class="card-body">
        <form action="{{route('genres.edit', $genre->slug)}}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            @include('genres.partials.form-control',[
                'submit' => 'Update',
            ])
        </form>
    </div>
</div>
@endsection