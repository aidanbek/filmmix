<label for="films">Фильмы</label>
<select class="selectpicker form-control" name="films[]" multiple data-live-search="true">
    @foreach($films as $film)
        <option value="{{$film->id}}">{{$film->title}}</option>
    @endforeach
</select>
