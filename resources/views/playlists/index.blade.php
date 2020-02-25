@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Playlist</div>
                <div class="card-body">
               
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                        <th>Artist name</th>
                        <th>Song</th>
                        <th>Genre</th>
                        <th>Year</th>
                        <th>Duration</th>
                        </tr>
                    </thead>
                    @if($playlists -> count())
                    @foreach( $playlists as $playlist)
                    <tbody>
                        <tr>
                        <td>{{ $playlist -> artist }}</td>
                        <td>{{ $playlist -> track }}</td>
                        <td>{{ $playlist -> genre }}</td>
                        <td>{{ $playlist -> year }}</td>
                        <td>{{ $playlist -> duration }}</td>
                        </tr>
                    </tbody>
                    @endforeach
                    @else
                        Not found
                    @endif
                </table>
                {{$playlists->appends(request()->query())->links()}}

                @if($playlists -> count())
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Choose option<span class="caret "></span></button>
                    <ul class="dropdown-menu dropdown-menu">
                    <li><a href="{{ route('playlist.index', array_merge(request()->query(), ['per_page'=>5, 'page'=>1] )) }}">5</a> </li>
                    <li><a href="{{ route('playlist.index', array_merge(request()->query(), ['per_page'=>10,'page'=>1 ] )) }}">10</a> </li>
                    <li><a href="{{ route('playlist.index', array_merge(request()->query(), ['per_page'=>20,'page'=>1 ] )) }}">20</a> </li>
                    </ul>
                 @endif



              
                </div>
            </div>
        </div>
        <div class="col-md-3">
        @include('playlists.partials._filters')
        </div>
    </div>
</div>
@endsection
