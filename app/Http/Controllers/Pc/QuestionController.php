<?php

namespace App\Http\Controllers\Pc;

use Route,Auth,Input,Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Pc\Controller as BaseController;
use App\Models\Question;
use App\Models\QuestionComment;

class QuestionController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth:user.web',['except' => 'index']);
    }
    /**
     * Show dashboard for each user.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $order = $request->input('order','');
        $questions = Question::select('questions.*','users.name as user_name')
            ->join('users','users.id','=','questions.user_id');
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

        $questions = $questions->paginate(10);

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
        return $this->response->title('植物问答')
            ->data(compact('questions','order'))
            ->view('question.index', true)
            ->output();
    }
    public function create()
    {
        return $this->response->title('植物问答')
            ->view('question.create', true)
            ->output();
    }
    public function store(Request $request)
    {
        $title = $request->input('title','');
        $content = $request->input('content','');
        $images = $request->input('images','');
        $user = Auth::user();
        Question::create([
            'user_id' => $user->id,
            'title' => $title,
            'content' => $content,
            'images' => $images ? implode(',',$images) : '',
        ]);

        return $this->response->message('提交成功')
            ->status("success")
            ->code(200)
            ->url(url('/question/index'))
            ->redirect();
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

        Question::where('id',$id)->increment('views_count');

        return $this->response->title('植物问答')
            ->data(compact('question','comments'))
            ->view('question.show', true)
            ->output();
    }
    public function storeComment(Request $request)
    {
        $question_id = $request->input('question_id');
        $content = $request->input('content');

        $user = Auth::user();
        QuestionComment::create([
            'question_id' => $question_id,
            'user_id' => $user->id,
            'content' => $content,
        ]);

        Question::where('id',$question_id)->increment('comment_count');

        return $this->response->message('提交成功')
            ->status("success")
            ->code(200)
            ->url(url('/question/'.$question_id))
            ->redirect();

    }
    public function uploadImage(Request $request)
    {
        $images_url = app('image_service')->uploadImages(Input::all(), 'question',1);

        return response()->json([
            'code' => '200',
            'data' => $images_url
        ]);
    }

}
