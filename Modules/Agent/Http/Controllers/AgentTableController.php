<?php

namespace Modules\Agent\Http\Controllers;

use Illuminate\Routing\Controller;
use DataTables;
use Modules\Agent\Repositories\AgentRepository;
use Modules\Agent\Http\Requests\ManageAgentRequest;

class AgentTableController extends Controller
{
    /**
     * @var AgentRepository
     */
    protected $agent;

    /**
     * @param AgentRepository $agent
     */
    public function __construct(AgentRepository $agent)
    {
        $this->agent = $agent;
    }

    /**
     * @param ManageAgentRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageAgentRequest $request)
    {
        return DataTables::eloquent($this->agent->getForDataTable())
            ->addColumn('name', function ($agent) {
                return $agent->name;
            })
            ->addColumn('description', function ($agent) {
                return $agent->description ? \Str::limit($agent->description, 50) : 'N/A';
            })
            ->addColumn('actions', function ($agent) {
                return $agent->action_buttons;
            })
            ->editColumn('created_at', function ($agent) {
                return $agent->created_at->format('Y-m-d H:i:s');
            })
            ->editColumn('updated_at', function ($agent) {
                return $agent->updated_at->format('Y-m-d H:i:s');
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
