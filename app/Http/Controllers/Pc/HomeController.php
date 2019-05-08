<?php

namespace App\Http\Controllers\Pc;

use Route,Auth;
use App\Models\Banner;
use App\Http\Controllers\Pc\Controller as BaseController;


class HomeController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Show dashboard for each user.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $banners = app(Banner::class)->all();
        return $this->response->title('首页')
            ->view('home')
            ->data(compact('banners'))
            ->output();
    }

}
