<?php

return [

    /*
     * Modules .
     */
    'modules'  => ['plant'],


    /*
     * Views for the page  .
     */
    'views'    => ['default' => 'Default', 'left' => 'Left menu', 'right' => 'Right menu'],

// Modale variables for page module.
    'research'     => [
        'model'        => 'App\Models\Research',
        'table'        => 'researches',
        'primaryKey'   => 'id',
        'hidden'       => [],
        'visible'      => [],
        'guarded'      => ['*'],
        //'slugs'        => ['slug' => 'slug'],
        'fillable'     => ['title','author','source','url','date','created_at','updated_at'],
        'translate'    => ['title','author','source','url','date','created_at','updated_at'],
        'upload_folder' => '/page',
        'encrypt'      => ['id'],
        'perPage'      => '20',
        'search'        => [
            'title'  => 'like',
        ],
    ],

];
