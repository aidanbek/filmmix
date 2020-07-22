<label for="films">Жанры</label>
<select class="selectpicker form-control" name="genres[]" multiple data-live-search="true">
    @if(isset($currentGenres))
        @foreach($genres as $genre)
            @if(in_array($genre->id, $currentGenres))
                <option selected value="{{$genre->id}}">{{$genre->title}}</option>
            @else
                <option value="{{$genre->id}}">{{$genre->title}}</option>
            @endif
        @endforeach
    @else
        @foreach($genres as $genre)
            <option value="{{$genre->id}}">{{$genre->title}}</option>
        @endforeach
    @endif
</select>
