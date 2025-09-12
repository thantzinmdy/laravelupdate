<?php

namespace Modules\Agent\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Agent\Entities\Agent;
use Modules\Agent\Http\Requests\ManageAgentRequest;
use Modules\Agent\Http\Requests\CreateAgentRequest;
use Modules\Agent\Http\Requests\UpdateAgentRequest;
use Modules\Agent\Http\Requests\ShowAgentRequest;
use Modules\Agent\Repositories\AgentRepository;

class AgentController extends Controller
{
 /**
     * @var AgentRepository
     * @var CategoryRepository
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
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('agent::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('agent::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateAgentRequest $request)
    {
        $this->agent->create($request->except('_token','_method'));
        return redirect()->route('admin.agent.index')->withFlashSuccess(trans('agent::alerts.backend.agent.created'));
    }

    /**
     * @param Agent              $agent
     * @param ManageAgentRequest $request
     *
     * @return mixed
     */
    public function edit(Agent $agent, ManageAgentRequest $request)
    {
        return view('agent::edit')
            ->withAgent($agent);
    }

    /**
     * @param Agent              $agent
     * @param UpdateAgentRequest $request
     *
     * @return mixed
     */
    public function update(Agent $agent, UpdateAgentRequest $request)
    {
        $this->agent->updateById($agent->id,$request->except('_token','_method'));

        return redirect()->route('admin.agent.index')->withFlashSuccess(trans('agent::alerts.backend.agent.updated'));
    }

    /**
     * @param Agent              $agent
     * @param ManageAgentRequest $request
     *
     * @return mixed
     */
    public function show(Agent $agent, ShowAgentRequest $request)
    {
        return view('agent::show')->withAgent($agent);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Agent $agent)
    {
        $this->agent->deleteById($agent->id);

        return redirect()->route('admin.agent.index')->withFlashSuccess(trans('agent::alerts.backend.agent.deleted'));
    }
}
