<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PlaylistResource;
use App\Filters\Playlist\PlaylistFilter;
use App\Playlist;

class PlaylistController extends Controller
{
    public function index(Request $request){
       
        $per_page = $request->per_page ?? 4;

        return new PlaylistResource( 
        
        Playlist::filter($request)->paginate($per_page)
        );
        
    }
    public function filters(){

        return response()->json([ 
            'data' => PlaylistFilter::mappings()],200);
    }
    

}
