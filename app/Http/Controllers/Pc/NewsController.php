<?php

namespace App\Http\Controllers\Pc;

use Route,Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Pc\Controller as BaseController;
use App\Repositories\Eloquent\PageRepositoryInterface;
use App\Repositories\Eloquent\PageCategoryRepositoryInterface;

class NewsController extends BaseController
{
    public function __construct(PageRepositoryInterface $page_repository,PageCategoryRepositoryInterface $category_repository)
    {
        parent::__construct();
        $this->page_repository = $page_repository;
        $this->category_repository = $category_repository;
        $this->category_slug = 'news';
        $this->category_data = $category_repository->where(['slug' => $this->category_slug])->first();
        $this->category_id = $this->category_data['id'];
    }
    /**
     * Show dashboard for each user.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news_list = $this->page_repository
            ->where(['category_id' => $this->category_id])
            ->orderBy('order','asc')
            ->orderBy('id','desc')
            ->paginate(5);

        if ($this->response->typeIs('json')) {

            $data['content'] = $this->response->layout('render')
                ->view('news.list')
                ->data(compact('news_list'))->render()->getContent();

            return $this->response
                ->success()
                ->data($data)
                ->output();
        }
        return $this->response->title('杏界新闻')
            ->view('news.index')
            ->data(compact('news_list'))
            ->output();
    }
    public function show(Request $request ,$id)
    {

        $news = $this->page_repository->find($id);

        $news->increment('views_count');

        return $this->response->title($news['title'])
            ->view('news.show')
            ->data(compact('news'))
            ->output();
    }

}
