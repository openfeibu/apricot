<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\QuestionRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;
use App\Models\Question;

class QuestionRepository extends BaseRepository implements QuestionRepositoryInterface
{
    public function model()
    {
        return config('model.question.question.model');
    }
    public function getQuestions($limit=10)
    {
        return Question::select('questions.*','users.name as user_name','users.avatar')
            ->join('users','users.id','=','questions.user_id')
            ->orderBy('comment_count','desc')
            ->orderBy('views_count','desc')
            ->orderBy('id','desc')
            ->limit($limit)
            ->get();
    }
}