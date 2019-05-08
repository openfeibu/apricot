<?php

return [

    /*
     * Modules .
     */
    'modules'  => ['question','comment'],


    /*
     * Views for the page  .
     */
    'views'    => ['default' => 'Default', 'left' => 'Left menu', 'right' => 'Right menu'],

// Modale variables for page module.
    'question'     => [
        'model'        => 'App\Models\Question',
        'table'        => 'questions',
        'primaryKey'   => 'id',
        'hidden'       => [],
        'visible'      => [],
        'guarded'      => ['*'],
        'fillable'     => ['title', 'user_id', 'content','images','views_count','comment_count', 'created_at','updated_at'],
        'translate'    => ['title', 'user_id', 'content','images', 'created_at','updated_at'],
        'upload_folder' => '/question',
        'encrypt'      => ['id'],
        'perPage'      => '20',
        'search'        => [
            'title'  => 'like',
        ],
    ],

    'comment'     => [
        'model'        => 'App\Models\QuestionComment',
        'table'        => 'question_comments',
        'primaryKey'   => 'id',
        'hidden'       => [],
        'visible'      => [],
        'guarded'      => ['*'],
        'fillable'     => ['question_id', 'user_id', 'content', 'created_at','updated_at'],
        'translate'    => ['question_id', 'user_id', 'content', 'created_at','updated_at'],
        'upload_folder' => '/question',
        'encrypt'      => ['id'],
        'perPage'      => '20',
        'search'        => [
            'title'  => 'like',
        ],
    ],

];
