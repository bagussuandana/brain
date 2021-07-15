@extends('layouts.backend', ['title' => 'Genres Table'])
@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Genre Name</th>
        <th scope="col">Genre Slug</th>
        <th scope="col">Band</th>
        <th scope="col">Action</th>

      </tr>
    </thead>
    <tbody>
        @foreach ($genres as $index => $genre)
        <tr>
            <td>{{$genres->firstItem() + $index}}</td>
            <td>{{$genre->name}}</td>
            <td>{{$genre->slug}}</td>
            <td>{{$genre->bands_count}}</td>
            <td>
                <a href="{{route('genres.edit', $genre->slug)}}" class="btn btn-primary btn-sm">Edit</a>
                <div endpoint="{{route('genres.delete', $genre)}}" class="delete d-inline"></div>
            </td>

        </tr>
        @endforeach
    </tbody>
  </table>
  {{ $genres->links() }}
@endsection
