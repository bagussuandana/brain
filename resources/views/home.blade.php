@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($bands as $band)
        <div class="col-md-4">
            <div class="card">
                <img src="{{'/storage/'.$band->thumbnail}}" alt="{{$band->name}}" class="card-img-top">
                <div class="card-body">
                    <a href="{{route('bands.show', $band)}}">
                        {{$band->name}}
                    </a>
                    <div class="text-sm">
                        {{$band->album->name}}
                    </div>
                </div>

            </div>
        </div>
            
        @endforeach
    
    </div>
    <div class="mt-5">
        {{$bands->links()}}
    </div>
</div>
@endsection
