<?php

namespace App\Http\ViewComposer;

use Illuminate\View\View;
use App\Filters\Playlist\PlaylistFilter;

class PlaylistFiltersComposer
{
    public function compose(View $view)
    {
        $view->with([
            'mappings'=> PlaylistFilter::mappings()
        ]);
    }
}