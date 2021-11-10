@if($loop->first && $loop->last)
    <a href="{{$href}}">{{$title}}</a>
@else
    @if($loop->first)
        <a href="{{$href}}">{{$title}}</a>,
    @elseif($loop->last)
        <a href="{{$href}}">{{\Illuminate\Support\Str::lower($title)}}</a>
    @else
        <a href="{{$href}}">{{\Illuminate\Support\Str::lower($title)}}</a>,
    @endif
@endif
