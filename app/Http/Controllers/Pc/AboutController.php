<?php

namespace App\Http\Controllers\Pc;

use App\Http\Controllers\Pc\PageController as BaseController;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Repositories\Eloquent\PageRepositoryInterface;

class AboutController extends BaseController
{
    public function __construct(PageRepositoryInterface $page_repository)
    {
        parent::__construct($page_repository);
    }
    public function index(Request $request,$slug="about")
    {
        return parent::index($request,$slug);
    }

}
