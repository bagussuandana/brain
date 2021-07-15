@extends('layouts.backend', ['title' => 'New Genre'])
@section('content')
<div class="card">
    <div class="card-header">New Genre</div>
    <div class="card-body">
        <form action="{{route('genres.create')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('genres.partials.form-control',[
                'submit' => 'Create',
            ])
        </form>
    </div>
</div>
@endsection