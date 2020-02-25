<?php

namespace App;

use App\Filters\Playlist\PlaylistFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    public function scopeFilter(Builder $builder, $request, array $filters = [])
    {

        return (new PlaylistFilter($request))->add($filters)->filter($builder);
    }
}
