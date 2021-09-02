<label for="{{$name}}">{{$label}}</label>
<select class="selectpicker form-control" name="{{$name}}[]" multiple>
    @if(empty($current))
        @foreach($elements as $element)
            <option value="{{ $element->{$id} }}">{{ $element->{$title} }}</option>
        @endforeach
    @else
        @foreach($elements as $element)
            @if(in_array($element->{$id}, $current))
                <option selected value="{{ $element->{$id} }}">{{ $element->{$title} }}</option>
            @else
                <option value="{{ $element->{$id} }}">{{ $element->{$title} }}</option>
            @endif
        @endforeach
    @endif
</select>
