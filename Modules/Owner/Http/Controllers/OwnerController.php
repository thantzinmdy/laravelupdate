<?php

namespace Modules\Owner\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Owner\Entities\Owner;
use Modules\Owner\Http\Requests\ManageOwnerRequest;
use Modules\Owner\Http\Requests\CreateOwnerRequest;
use Modules\Owner\Http\Requests\UpdateOwnerRequest;
use Modules\Owner\Http\Requests\ShowOwnerRequest;
use Modules\Owner\Repositories\OwnerRepository;

class OwnerController extends Controller
{
 /**
     * @var OwnerRepository
     * @var CategoryRepository
     */
    protected $owner;

    /**
     * @param OwnerRepository $owner
     */
    public function __construct(OwnerRepository $owner)
    {
        $this->owner = $owner;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('owner::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('owner::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateOwnerRequest $request)
    {
        $this->owner->create($request->except('_token','_method'));
        return redirect()->route('admin.owner.index')->withFlashSuccess(trans('owner::alerts.backend.owner.created'));
    }

    /**
     * @param Owner              $owner
     * @param ManageOwnerRequest $request
     *
     * @return mixed
     */
    public function edit(Owner $owner, ManageOwnerRequest $request)
    {
        return view('owner::edit')
            ->withOwner($owner);
    }

    /**
     * @param Owner              $owner
     * @param UpdateOwnerRequest $request
     *
     * @return mixed
     */
    public function update(Owner $owner, UpdateOwnerRequest $request)
    {
        $this->owner->updateById($owner->id,$request->except('_token','_method'));

        return redirect()->route('admin.owner.index')->withFlashSuccess(trans('owner::alerts.backend.owner.updated'));
    }

    /**
     * @param Owner              $owner
     * @param ManageOwnerRequest $request
     *
     * @return mixed
     */
    public function show(Owner $owner, ShowOwnerRequest $request)
    {
        return view('owner::show')->withOwner($owner);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Owner $owner)
    {
        $this->owner->deleteById($owner->id);

        return redirect()->route('admin.owner.index')->withFlashSuccess(trans('owner::alerts.backend.owner.deleted'));
    }
}
