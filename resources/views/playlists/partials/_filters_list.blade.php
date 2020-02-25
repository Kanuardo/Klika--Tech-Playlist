<div class="dropdown">
@foreach($playlists as $playlist => $value )
@if(request($key))
@if($key === 'artist')
   <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">{{ $value->artist }}
    <span class="caret "></span></button>
    @elseif($key === 'genre')
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">{{ $value->genre }}
    <span class="caret "></span></button>
    @elseif($key === 'year')
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">{{ $value->year }}
    <span class="caret "></span></button>
    @endif
    @else
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">all
    <span class="caret"></span></button>
    
    @endif @break
    @endforeach
        <ul class="dropdown-menu dropdown-menu">
            @foreach($map as $value => $name )
            <li><a href="{{ route('playlist.index', array_merge(request()->query(), [$key => $value, 'page'=>1 ] )) }}">{{$name}}</a> </li>
            @endforeach
        </ul>

        @if(request($key))
        
        <li><a href="{{ route('playlist.index', array_except(request()->query(), [$key, 'page'] )) }}">Clear this filter</a> </li>
        @endif
</div>