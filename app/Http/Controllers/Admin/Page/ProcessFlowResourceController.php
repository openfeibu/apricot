<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\Admin\SinglePageResourceController as BaseController;
use App\Http\Requests\PageRequest;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\PageRepositoryInterface;
use App\Models\Page;

/**
 * Resource controller class for page.
 */
class ProcessFlowResourceController extends BaseController
{
    public function __construct(PageRepositoryInterface $page)
    {
        parent::__construct($page);
        $this->slug = 'process_flow';
        $this->category_id = 8;
        $this->url = guard_url('page/process_flow/show');
        $this->title = trans('page.process_flow.name');
        $this->view_folder = 'page.process_flow';
    }
}