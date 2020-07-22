<label for="films">Актеры</label>
<select class="selectpicker form-control" name="actors[]" multiple data-live-search="true">
    @if(isset($currentActors))
        @foreach($actors as $actor)
            @if(in_array($actor->id, $currentActors))
                <option selected value="{{$actor->id}}">{{$actor->title}}</option>
            @else
                <option value="{{$actor->id}}">{{$actor->title}}</option>
            @endif
        @endforeach
    @else
        @foreach($actors as $actor)
            <option value="{{$actor->id}}">{{$actor->title}}</option>
        @endforeach
    @endif
</select>
