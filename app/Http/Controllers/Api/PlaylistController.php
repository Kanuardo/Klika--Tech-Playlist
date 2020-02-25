<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlaylistController extends Controller
{
    public function index(Request $request){
        $per_page = $request->per_page ?? 2;
        $playlists = Playlist::filter($request)->paginate($per_page);

        return view('playlists.index', compact('playlists'));
    }
}
