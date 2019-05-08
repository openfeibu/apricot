<?php

namespace App\Http\Controllers\Pc;

use Route,Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Pc\Controller as BaseController;
use App\Repositories\Eloquent\ResearchRepositoryInterface;

class ResearchController extends BaseController
{
    public function __construct(ResearchRepositoryInterface $research_repository)
    {
        parent::__construct();
        $this->research_repository = $research_repository;
    }
    /**
     * Show dashboard for each user.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $researches = $this->research_repository
            ->orderBy('id','desc')
            ->paginate(10);

        return $this->response->title(trans('research.name'))
            ->view('research.index')
            ->data(compact('researches'))
            ->output();
    }

}
