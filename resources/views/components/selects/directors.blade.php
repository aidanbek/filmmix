<label for="films">Режиссеры</label>
<select class="selectpicker form-control" name="directors[]" multiple>
    @if(isset($currentDirectors))
        @foreach($directors as $director)
            @if(in_array($director->id, $currentDirectors))
                <option selected value="{{$director->id}}">{{$director->title}}</option>
            @else
                <option value="{{$director->id}}">{{$director->title}}</option>
            @endif
        @endforeach
    @else
        @foreach($directors as $director)
            <option value="{{$director->id}}">{{$director->title}}</option>
        @endforeach
    @endif
</select>
