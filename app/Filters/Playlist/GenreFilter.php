<?php

namespace App\Filters\Playlist;

use App\Filters\FilterAbstract;
use Illuminate\Database\Eloquent\Builder;

class GenreFilter extends FilterAbstract
{
    public function mappings()
    {
        return [
            'rock'=>'Rock',
            'jazz'=>'Jazz',
            'folk'=>'Folk',
            'blues'=>'Blues',
            'dubstep'=>'Dubstep',
            'techno'=>'Techno',
            'electro'=>'Electro',
            

        ];
    }

    public function filter(Builder $builder, $value)
    {
        $value= $this->resolveFilterValue($value);

        if($value === null)
        {
            return $builder;
        }

        return $builder->where('genre', $value);
    }
}