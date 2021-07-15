@extends('layouts.backend', ['title' => 'Album Table'])
@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Album Name</th>
        <th scope="col">Year</th>
        <th scope="col">Band</th>
        <th scope="col">Action</th>

      </tr>
    </thead>
    <tbody>
        @foreach ($albums as $index => $album)
        <tr>
            <td>{{$albums->firstItem() + $index}}</td>
            <td>{{$album->name}}</td>
            <td>{{$album->year}}</td>
            <td>{{$album->band->name}}</td>
            <td>
                <a href="{{route('albums.edit', $album->slug)}}" class="btn btn-primary btn-sm">Edit</a>
                <div endpoint="{{route('albums.delete', $album)}}" class="delete d-inline"></div>
            </td>

        </tr>
        @endforeach
    </tbody>
  </table>
  {{ $albums->links() }}
@endsection
