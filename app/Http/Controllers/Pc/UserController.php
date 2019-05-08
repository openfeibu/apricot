<?php

namespace App\Http\Controllers\Pc;

use Route,Auth,Hash,Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\AdminUser;
use App\Models\Question;
use App\Http\Controllers\Pc\Controller as BaseController;

class UserController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth:user.web');
    }
    /**
     * Show dashboard for each user.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id',Auth::user()->id)->first();
        return $this->response->title('个人中心')
            ->data(compact('user'))
            ->view('user.index', true)
            ->output();
    }

    public function update(Request $request)
    {
        $user = User::where('id',Auth::user()->id)->first();

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:users|max:20',
        ],[
            'name.require' => '昵称不能为空',
            'name.max' => '昵称不能超过10个字符',
            'name.unique' => '已存在该昵称',
        ]);
        if ($validator->fails()) {
            return $this->response->message($validator->errors()->first())
                ->code(400)
                ->status('error')
                ->url(url('password'))
                ->redirect();
        }
        $user->name = $request->name;
        $user->save();

        AdminUser::where('user_id',$user->id)->update(['name' => $request->name]);

        return $this->response->message('修改成功')
            ->code(200)
            ->status('success')
            ->url(url('user/index'))
            ->redirect();
    }
    public function getPassword(Request $request, $role = null)
    {
        return $this->response->title('个人中心')
            ->view('user.password')
            ->output();
    }

    public function postPassword(Request $request)
    {
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password'     => 'required|confirmed|min:6',
        ],[
            'old_password.required' => '旧密码不能为空',
            'password.required' => '新密码不能为空',
            'password.confirmed' => '重复新密码不正确',
            'password.min' => '密码最少六位',
        ]);
        if ($validator->fails()) {
            return $this->response->message($validator->errors()->first())
                ->code(400)
                ->status('error')
                ->url(url('password'))
                ->redirect();
        }
        if (!Hash::check($request->get('old_password'), $user->password)) {
            return $this->response->message('旧密码错误')
                ->code(400)
                ->status('error')
                ->url(url('password'))
                ->redirect();
        }

        $password = $request->get('password');

        $user->password = bcrypt($password);

        AdminUser::where('user_id',$user->id)->update(['password' => bcrypt($password)]);

        if ($user->save()) {
            return $this->response->message('修改成功')
                ->code(200)
                ->status('success')
                ->url(url('password'))
                ->redirect();
        } else {
            return $this->response->message('出错了')
                ->code(400)
                ->status('error')
                ->url(url('password'))
                ->redirect();
        }
        
    }
    public function uploadAvatar(Request $request)
    {
        $image_url = app('image_service')->uploadImages(Input::all(), 'avatar',0);

        $user = Auth::user();

        $user->avatar = $image_url;

        $user->save();

        return response()->json([
            'code' => '200',
            'data' => $image_url
        ]);
    }

    public function questions(Request $request)
    {
        $user = Auth::user();
        $questions = Question::select('questions.*','users.name as user_name')
            ->join('users','users.id','=','questions.user_id')
            ->where('questions.user_id',$user->id)
            ->orderBy('questions.id','desc')
            ->orderBy('questions.comment_count','desc')
            ->orderBy('questions.views_count','desc')
            ->paginate(10);

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

        return $this->response->title('个人中心')
            ->data(compact('user','questions'))
            ->view('user.questions', true)
            ->output();
    }


}
