@extends('layouts.backend')
@section('content')
<div class="card">
    <div class="card-header">Edit Band {{$band->name}}</div>
    <div class="card-body">
        <form action="{{route('bands.edit', $band->slug)}}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            @include('bands.partials.form-control',[
                'submit' => 'Update'
            ])
        </form>
    </div>
</div>
@endsection