<?php

namespace App\Filters\Playlist;

use Illuminate\Database\Eloquent\Builder;
use App\Filters\FilterAbstract;

class ArtistFilter extends FilterAbstract
{
    public function mappings()
    {
        return [
            'Drake'=>'Drake',
            'Imagine Dragons'=>'Imagine Dragons',
            'Halsey'=>'Halsey',
            'Kanye West'=>'Kanye West',
            'Doja Cat'=>'Doja Cat',
            'A$AP Rocky'=>'A$AP Rocky',
            'Kendrick Lamar'=>'Kendrick Lamar',  
            'LIZER'=>'LIZER',
            'Dua Lipa'=>'Dua Lipa',
            'Travis Scott'=>'Travis Scott', 
        ];
    }
    public function filter(Builder $builder, $value)
    {
        $value= $this->resolveFilterValue($value);

        if($value === null)
        {
            return $builder;
        }

        return $builder-> where('artist', $value);
    }
}