<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\ResourceController as BaseController;
use Illuminate\Http\Request;
use Tree,Auth;
use App\Models\Question;
use App\Models\QuestionComment;
use App\Repositories\Eloquent\QuestionRepositoryInterface;

/**
 * Resource controller class for page.
 */
class QuestionResourceController extends BaseController
{
    /**
     * Initialize category resource controller.
     *
     * @param type QuestionRepositoryInterface $question
     */

    public function __construct(QuestionRepositoryInterface $question)
    {
        parent::__construct();
        $this->repository = $question;
    }
    public function index(Request $request)
    {
        $order = $request->input('order','');

        $search = $request->input('search');

        $limit = $request->input('limit',config('app.limit'));
        $questions = Question::select('questions.*','users.name as user_name')
            ->join('users','users.id','=','questions.user_id');


        if(isset($search) && isset($search['search_key']))
        {
            $questions = $questions->where('questions.title','like','%'.$search['search_key'].'%')
            ->orWhere('questions.content','like','%'.$search['search_key'].'%');
        }

        if($order == 'new')
        {
            $questions = $questions->orderBy('questions.id','desc')
                ->orderBy('questions.comment_count','desc')
                ->orderBy('questions.views_count','desc');
        }else if($order == 'hot'){
            $questions = $questions
                ->orderBy('questions.comment_count','desc')
                ->orderBy('questions.views_count','desc')
                ->orderBy('questions.id','desc');
        }else{
            $questions = $questions->orderBy('questions.id','desc')
                ->orderBy('questions.views_count','desc')
                ->orderBy('questions.comment_count','desc');
        }

        $questions = $questions->paginate($limit);

        $questions->appends([
            'order' => $order
        ]);
        foreach ($questions as $key => $question)
        {
            if($question->images)
            {
                $images = explode(',',$question->images);
                foreach ($images as $image_key => $image)
                {
                    $images[$image_key] = url('image/original/').$image;
                }
                $question->images = $images;
            }else{
                $question->images = [];
            }
        }
        if ($this->response->typeIs('json')) {
            $data = $questions ? $questions->toArray()['data'] : [];
            return $this->response
                ->success()
                ->count($questions->total())
                ->data($data)
                ->output();
        }

        return $this->response->title('植物问答')
            ->data(compact('questions','order'))
            ->view('question.index', true)
            ->output();
    }

    public function show(Request $request,$id)
    {
        $question = Question::select('questions.*','users.name as user_name')
            ->join('users','users.id','=','questions.user_id')
            ->where('questions.id',$id)
            ->first();
        $images = explode(',',$question->images);
        foreach ($images as $image_key => $image)
        {
            $images[$image_key] = url('image/original/').$image;
        }
        $question->images = $images;

        $comments = QuestionComment::select('question_comments.*','users.name as user_name','users.avatar')
            ->join('users','users.id','=','question_comments.user_id')
            ->where('question_comments.question_id',$id)
            ->orderBy('question_comments.id','desc')
            ->paginate(10);

        return $this->response->title('植物问答')
            ->data(compact('question','comments'))
            ->view('question.show', true)
            ->output();
    }

    /**
     * Remove the page.
     *
     * @param Request $request
     * @param Question   $question
     *
     * @return Response
     */
    public function destroy(Request $request,Question $question)
    {
        try {
            $this->repository->forceDelete([$question->id]);

            QuestionComment::where('question_id',$question->id)->delete();

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('question.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('question'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('question'))
                ->redirect();
        }
    }
    public function destroyComment(Request $request,$id)
    {
        QuestionComment::where('id',$id)->delete();

        return $this->response->message(trans('messages.success.deleted', ['Module' => trans('question.name')]))
            ->status("success")
            ->code(200)
            ->url(guard_url('question'))
            ->redirect();
    }
    public function destroyAll(Request $request)
    {
        try {
            $data = $request->all();
            $ids = $data['ids'];

            $this->repository->forceDelete($ids);

            QuestionComment::whereIn('question_id',$ids)->delete();

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('question.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('question'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('question'))
                ->redirect();
        }
    }
    public function storeComment(Request $request)
    {
        $question_id = $request->input('question_id');
        $content = $request->input('content');

        $user = Auth::user();
        QuestionComment::create([
            'question_id' => $question_id,
            'user_id' => $user->user_id,
            'content' => $content,
        ]);

        Question::where('id',$question_id)->increment('comment_count');

        return $this->response->message('提交成功')
            ->status("success")
            ->code(200)
            ->url(guard_url('/question/'.$question_id))
            ->redirect();
    }
}