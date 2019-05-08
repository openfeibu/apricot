<?php

return [

    /*
     * Modules .
     */
    'modules'  => ['single_page'],


    /*
     * Views for the page  .
     */
    'views'    => ['default' => 'Default', 'left' => 'Left menu', 'right' => 'Right menu'],

// Modale variables for page module.
    'single_page'     => [
        'model'        => 'App\Models\SinglePage',
        'table'        => 'single_pages',
        'primaryKey'   => 'id',
        'hidden'       => [],
        'visible'      => [],
        'guarded'      => ['*'],
        //'slugs'        => ['slug' => 'slug'],
        'fillable'     => ['title', 'slug', 'description', 'content', 'views_count'],
        'translate'    => ['title', 'slug', 'description', 'content', 'views_count'],
        'upload_folder' => '/single_page',
        'encrypt'      => ['id'],
        'revision'     => ['slug', 'title'],
        'perPage'      => '20',
        'search'        => [
            'title'  => 'like',
            'slug'  => 'like',
        ],
    ],

];
