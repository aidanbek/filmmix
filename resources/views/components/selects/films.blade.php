<label for="films">Фильмы</label>
<select class="selectpicker form-control" name="films[]" multiple>
    @if(isset($currentFilms))
        @foreach($films as $film)
            @if(in_array($film->id, $currentFilms))
                <option selected value="{{$film->id}}">{{$film->title}}</option>
            @else
                <option value="{{$film->id}}">{{$film->title}}</option>
            @endif
        @endforeach
    @else
        @foreach($films as $film)
            <option value="{{$film->id}}">{{$film->title}}</option>
        @endforeach
    @endif
</select>
