<?php

namespace App\Http\Controllers\Admin;

use Route;
use App\Models\User;
use App\Models\AdminUser;
use App\Models\Question;
use App\Models\QuestionComment;
use App\Models\Page;
use App\Models\Plant;
use App\Http\Controllers\Admin\Controller as BaseController;
use App\Traits\AdminUser\AdminUserPages;
use App\Http\Response\ResourceResponse;
use App\Traits\Theme\ThemeAndViews;
use App\Traits\AdminUser\RoutesAndGuards;

class ResourceController extends BaseController
{
    use AdminUserPages,ThemeAndViews,RoutesAndGuards;

    public function __construct()
    {
        parent::__construct();
        if (!empty(app('auth')->getDefaultDriver())) {
            $this->middleware('auth:' . app('auth')->getDefaultDriver());
           // $this->middleware('role:' . $this->getGuardRoute());
            $this->middleware('permission:' .Route::currentRouteName());
            $this->middleware('active');
        }
        $this->response = app(ResourceResponse::class);
        $this->setTheme();
    }
    /**
     * Show dashboard for each user.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $user_count = User::count();
        $plant_count = Plant::count()-2;
        $plant_views_count = Plant::sum('views_count');
        $news_count = Page::where('category_id',1)->count();
        $news_views_count = Page::where('category_id',1)->sum('views_count');
        $question_count = Question::count();

        $admin_user_ids = AdminUser::pluck('user_id');

        $user_question_comment_count = QuestionComment::whereNotIn('user_id',$admin_user_ids)->count();
        $admin_question_comment_count = QuestionComment::whereIn('user_id',$admin_user_ids)->count();

        return $this->response->title(trans('app.admin.panel'))
            ->data(compact('user_count','plant_count','plant_views_count','news_count','news_views_count','question_count','admin_question_comment_count','user_question_comment_count'))
            ->view('home')
            ->output();
    }
    public function dashboard()
    {
        return $this->response->title('测试')
            ->view('dashboard')
            ->output();
    }
}
