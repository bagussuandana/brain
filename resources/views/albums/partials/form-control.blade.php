<div class="form-group">
    <label for="band">Band</label>
    <select name="band" id="band" class="form-control">
        <option disabled selected>Choose Band</option>
        @foreach ($bands as $band)
        <option {{$band->id == $album->band_id ? 'selected': ''}} value="{{$band->id}}">{{$band->name}}</option>
        @endforeach
    </select>
    @error('band')
        <div class="text-danger mt-2">{{$message}}</div>
    @enderror
</div>
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control" value="{{old('name') ?? $album->name}}">
    @error('name')
        <div class="text-danger mt-2">{{$message}}</div>
    @enderror
</div>
<div class="form-group">
    <label for="year">Year</label>
    <select name="year" id="year" class="form-control">
        <option disabled selected>Choose Year</option>
        @for ($i = 1989; $i <= date("Y") ; $i++)
        <option {{$album->year == $i ? 'selected' : ''}} value="{{$i}}">{{$i}}</option>
        @endfor
    </select>
    @error('year')
        <div class="text-danger mt-2">{{$message}}</div>
    @enderror
</div>
<button type="submit" class="btn btn-primary">{{$submit}}</button>