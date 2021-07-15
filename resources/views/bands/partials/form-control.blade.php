<div class="form-group">
    <label for="thumbnail">Thumbnail</label>
    <input type="file" name="thumbnail" id="thumbnail" class="form-control">
    @error('thumbnail')
        <div class="mt-2 text-danger">{{$message}}</div>
    @enderror
</div>
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control" value="{{old('name') ?? $band->name}}">
    @error('name')
        <div class="mt-2 text-danger">{{$message}}</div>
    @enderror
</div>
<div class="form-group">
    <label for="genres">Choose Genre</label>
    <select  name="genres[]" id="genres" class="select2 form-control" multiple="multiple">
        @foreach ($genres as $genre)
        <option value="{{$genre->id}}" {{$band->genres()->find($genre->id) ? 'selected' : ''}}>{{$genre->name}}</option>
        @endforeach
    </select>
    @error('genres')
        <div class="mt-2 text-danger">{{$message}}</div>
    @enderror
</div>

<button type="submit" class="btn btn-primary">{{$submit}}</button>
