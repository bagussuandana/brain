@extends('layouts.backend')
@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Genres</th>
        <th scope="col">Action</th>

      </tr>
    </thead>
    <tbody>
        @foreach ($bands as $index => $band)
        <tr>
            <td>{{$bands->firstItem() + $index}}</td>
            <td>{{$band->name}}</td>
            <td>{{$band->genres()->get()->implode('name',' ,')}}</td>
            <td>
                <a href="{{route('bands.edit', $band->slug)}}" class="btn btn-primary btn-sm">Edit</a>
                <div endpoint="{{route('bands.delete', $band)}}" class="delete d-inline"></div>
            </td>

        </tr>
        @endforeach
    </tbody>
  </table>
  {{ $bands->links() }}
@endsection
