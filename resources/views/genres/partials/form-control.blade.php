<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control" value="{{old('name') ?? $genre->name}}">
    @error('name')
        <div class="text-danger mt-2">{{$message}}</div>
    @enderror
</div>

<button type="submit" class="btn btn-primary">{{$submit}}</button>