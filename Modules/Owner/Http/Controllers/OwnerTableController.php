<?php

namespace Modules\Owner\Http\Controllers;

use Illuminate\Routing\Controller;
use DataTables;
use Modules\Owner\Repositories\OwnerRepository;
use Modules\Owner\Http\Requests\ManageOwnerRequest;

class OwnerTableController extends Controller
{
    /**
     * @var OwnerRepository
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
     * @param ManageOwnerRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageOwnerRequest $request)
    {
        return DataTables::eloquent($this->owner->getForDataTable())
            ->addColumn('name', function ($owner) {
                return $owner->name;
            })
            ->addColumn('description', function ($owner) {
                return $owner->description ? \Str::limit($owner->description, 50) : 'N/A';
            })
            ->addColumn('actions', function ($owner) {
                return $owner->action_buttons;
            })
            ->editColumn('created_at', function ($owner) {
                return $owner->created_at->format('Y-m-d H:i:s');
            })
            ->editColumn('updated_at', function ($owner) {
                return $owner->updated_at->format('Y-m-d H:i:s');
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
