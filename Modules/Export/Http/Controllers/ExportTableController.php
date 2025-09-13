<?php

namespace Modules\Export\Http\Controllers;

use Illuminate\Routing\Controller;
use DataTables;
use Modules\Export\Repositories\ExportRepository;
use Modules\Export\Http\Requests\ManageExportRequest;

class ExportTableController extends Controller
{
    /**
     * @var ExportRepository
     */
    protected $export;

    /**
     * @param ExportRepository $export
     */
    public function __construct(ExportRepository $export)
    {
        $this->export = $export;
    }

    /**
     * @param ManageExportRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageExportRequest $request)
    {
        return DataTables::of($this->export->getForDataTable())
            ->addColumn('actions', function ($export) {
                return $export->action_buttons;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
