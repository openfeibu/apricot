<?php

namespace App\Http\Controllers\Pc;

use Route,Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Pc\Controller as BaseController;

class ContactController extends BaseController
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
    public function index()
    {
        return $this->response->title('联系我们')
            ->view('contact', true)
            ->output();
    }

}
