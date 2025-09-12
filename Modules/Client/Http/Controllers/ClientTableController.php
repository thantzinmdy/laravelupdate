<?php

namespace Modules\Client\Http\Controllers;

use Illuminate\Routing\Controller;
use DataTables;
use Modules\Client\Repositories\ClientRepository;
use Modules\Client\Http\Requests\ManageClientRequest;

class ClientTableController extends Controller
{
    /**
     * @var ClientRepository
     */
    protected $client;

    /**
     * @param ClientRepository $client
     */
    public function __construct(ClientRepository $client)
    {
        $this->client = $client;
    }

    /**
     * @param ManageClientRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageClientRequest $request)
    {
        return DataTables::eloquent($this->client->getForDataTable())
            ->addColumn('actions', function ($client) {
                return $client->action_buttons;
            })
            ->addColumn('filling_date_formatted', function ($client) {
                return $client->filling_date ? $client->filling_date->format('Y-m-d') : '';
            })
            ->addColumn('tm_types_label', function ($client) {
                return $client->tm_types_label;
            })
            ->editColumn('created_at', function ($client) {
                return $client->created_at->format('Y-m-d H:i:s');
            })
            ->editColumn('updated_at', function ($client) {
                return $client->updated_at->format('Y-m-d H:i:s');
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
