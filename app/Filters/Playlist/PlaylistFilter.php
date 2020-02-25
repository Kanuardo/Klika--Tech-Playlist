<?php

namespace App\Filters\Playlist;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Filters\Playlist\Ordering\ArtistOrder;
use App\Filters\FiltersAbstract;
use App\Filters\Playlist\{ArtistFilter, GenreFilter, YearFilter};

class PlaylistFilter extends FiltersAbstract
{
    protected $filters =[
        'artist'=> ArtistFilter::class,
        'genre'=> GenreFilter::class,
        'year'=> YearFilter::class,
        'order'=> ArtistOrder::class,
    ];

    public static function mappings()
    {
        return [
            'artist'=>[
                    'Drake'=>'Drake',
                    'Imagine Dragons'=>'Imagine Dragons',
                    'Halsey'=>'Halsey',
                    'Kanye West'=>'Kanye West',
                    'Doja Cat'=>'Doja Cat',
                    'A$AP Rocky'=>'A$AP Rocky',
                    'Kendrick Lamar'=>'Kendrick Lamar',  
                    'LIZER'=>'LIZER',
                    'Dua Lipa'=>'Dua Lipa',
                    'Travis Scott'=>'Travis Scott'],
            
            'genre'=>['rock'=>'Rock',
                      'jazz'=>'Jazz',
                      'folk'=>'Folk',
                      'blues'=>'Blues',
                      'dubstep'=>'Dubstep',
                      'techno'=>'Techno',
                      'electro'=>'Electro'],

            'year'=> [
                    '2000'=>'2000',
                    '2001'=>'2001',
                    '2002'=>'2002',
                    '2003'=>'2003',
                    '2004'=>'2004',
                    '2005'=>'2005',
                    '2006'=>'2006',
                    '2007'=>'2007',
                    '2008'=>'2008',
                    '2009'=>'2009',
                    '2010'=>'2010',
                    '2011'=>'2011',
                    '2012'=>'2012',
                    '2013'=>'2013', 
                    '2014'=>'2014',
                    '2015'=>'2015',
                    '2016'=>'2016',
                    '2017'=>'2017',
                    '2018'=>'2018',
                    '2019'=>'2019'],
        ];
    }

}