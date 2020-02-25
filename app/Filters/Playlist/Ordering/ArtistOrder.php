<?php

namespace App\Filters\Playlist\Ordering;

use App\Filters\FilterAbstract;
use Illuminate\Database\Eloquent\Builder;

class ArtistOrder extends FilterAbstract
{
    public function filter(Builder $builder, $value)
    {
       
        return $builder->orderBy('artist',$this->resolveOrderDirection($value));
    }
}