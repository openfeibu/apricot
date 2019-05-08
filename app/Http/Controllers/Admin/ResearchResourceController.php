<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\ResourceController as BaseController;
use App\Models\Research;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\ResearchRepositoryInterface;

class ResearchResourceController extends BaseController
{
    public function __construct(ResearchRepositoryInterface $research)
    {
        parent::__construct();
        $this->repository = $research;
        $this->repository
            ->pushCriteria(\App\Repositories\Criteria\RequestCriteria::class);
    }
    public function index(Request $request)
    {
        $limit = $request->input('limit',config('app.limit'));
        if ($this->response->typeIs('json')) {
            $researches = $this->repository
                ->orderBy('id','desc')
                ->paginate($limit);
            $data = $researches ? $researches->toArray()['data'] : [];
            return $this->response
                ->success()
                ->count($researches->total())
                ->data($data)
                ->output();
        }
        return $this->response->title(trans('app.admin.panel'))
            ->view('research.index')
            ->output();
    }
    public function create(Request $request)
    {
        $research = $this->repository->newInstance([]);

        return $this->response->title(trans('app.admin.panel'))
            ->view('research.create')
            ->data(compact('research'))
            ->output();
    }
    public function store(Request $request)
    {
        try {
            $attributes = $request->all();

            $research = $this->repository->create($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans('research.name')]))
                ->code(0)
                ->status('success')
                ->url(guard_url('research/'))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('research'))
                ->redirect();
        }
    }
    public function show(Request $request,Research $research)
    {
        if ($research->exists) {
            $view = 'research.show';
        } else {
            $view = 'research.create';
        }

        return $this->response->title(trans('app.view') . ' ' . trans('research.name'))
            ->data(compact('research'))
            ->view($view)
            ->output();
    }
    public function update(Request $request,Research $research)
    {
        try {
            $attributes = $request->all();

            $research->update($attributes);

            return $this->response->message(trans('messages.success.updated', ['Module' => trans('research.name')]))
                ->code(0)
                ->status('success')
                ->url(guard_url('research/' . $research->id))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('research/' . $research->id))
                ->redirect();
        }
    }
    public function destroy(Request $request,Research $research)
    {
        try {
            $this->repository->forceDelete([$research->id]);

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('research.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('research'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('research'))
                ->redirect();
        }
    }
    public function destroyAll(Request $request)
    {
        try {
            $data = $request->all();
            $ids = $data['ids'];
            $this->repository->forceDelete($ids);

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('research.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('research'))
                ->redirect();

        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('research'))
                ->redirect();
        }
    }
}
