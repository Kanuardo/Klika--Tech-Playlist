@if(count(array_intersect(array_keys(request()->query()), array_keys($mappings))))
<p>
    <a href="{{route('playlist.index')}}">Clear all filters</a>
</p>
@endif

<div> 
@foreach($mappings as $key =>$map)
   <h3>{{strtoupper($key)}}</h3>
    @include('playlists.partials._filters_list', compact('key', 'map'))
 @endforeach
</div>