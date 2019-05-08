<?php

return [

    /*
     * Modules .
     */
    'modules'  => ['plant','catalog'],


    /*
     * Views for the page  .
     */
    'views'    => ['default' => 'Default', 'left' => 'Left menu', 'right' => 'Right menu'],

// Modale variables for page module.
    'plant'     => [
        'model'        => 'App\Models\Plant',
        'table'        => 'plants',
        'primaryKey'   => 'id',
        'hidden'       => [],
        'visible'      => [],
        'guarded'      => ['*'],
        'fillable'     => ['name', 'slug', 'intro','image', 'content', 'chinese_name','latin_name','another_name','kingdom','phylum','class','subclass','order','suborder','family','subfamily','genus','seed','distribution_area'],
        'translate'    => ['name', 'slug', 'intro','image', 'content', 'chinese_name','latin_name','another_name','kingdom','phylum','class','subclass','order','suborder','family','subfamily','genus','seed','distribution_area'],
        'upload_folder' => '/plant',
        'encrypt'      => ['id'],
        'perPage'      => '20',
        'search'        => [
            'title'  => 'like',
        ],
    ],
    'catalog' => [
        'model'        => 'App\Models\Catalog',
        'table'        => 'catalogs',
        'primaryKey'   => 'id',
        'hidden'       => [],
        'visible'      => [],
        'guarded'      => ['*'],
        //'slugs'        => ['slug' => 'slug'],
        'fillable'     => ['title','content', 'parent_id','plant_id','order'],
        'translate'    => ['title','content', 'parent_id','plant_id','order'],
        'upload_folder' => '/plant',
        'encrypt'      => ['id'],
        'revision'     => ['title'],
        'perPage'      => '20',
        'search'        => [
            'title'  => 'like',
            'slug'  => 'like',
        ],
    ],

];
