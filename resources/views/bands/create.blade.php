@extends('layouts.backend')
@section('content')
<div class="card">
    <div class="card-header">New Band</div>
    <div class="card-body">
        <form action="{{route('bands.create')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('bands.partials.form-control',[
                'submit' => 'Create',
            ])
        </form>
    </div>
</div>
@endsection