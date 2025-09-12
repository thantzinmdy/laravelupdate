<?php

namespace Modules\Client\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Client\Entities\Client;
use Modules\Client\Http\Requests\ManageClientRequest;
use Modules\Client\Http\Requests\CreateClientRequest;
use Modules\Client\Http\Requests\UpdateClientRequest;
use Modules\Client\Http\Requests\ShowClientRequest;
use Modules\Client\Repositories\ClientRepository;

class ClientController extends Controller
{
 /**
     * @var ClientRepository
     * @var CategoryRepository
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
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('client::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('client::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateClientRequest $request)
    {
        $this->client->create($request->except('_token','_method'));
        return redirect()->route('admin.client.index')->withFlashSuccess(trans('client::alerts.backend.client.created'));
    }

    /**
     * @param Client              $client
     * @param ManageClientRequest $request
     *
     * @return mixed
     */
    public function edit(Client $client, ManageClientRequest $request)
    {
        return view('client::edit')
            ->withClient($client);
    }

    /**
     * @param Client              $client
     * @param UpdateClientRequest $request
     *
     * @return mixed
     */
    public function update(Client $client, UpdateClientRequest $request)
    {
        $this->client->updateById($client->id,$request->except('_token','_method'));

        return redirect()->route('admin.client.index')->withFlashSuccess(trans('client::alerts.backend.client.updated'));
    }

    /**
     * @param Client              $client
     * @param ManageClientRequest $request
     *
     * @return mixed
     */
    public function show(Client $client, ShowClientRequest $request)
    {
        return view('client::show')->withClient($client);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Client $client)
    {
        $this->client->deleteById($client->id);

        return redirect()->route('admin.client.index')->withFlashSuccess(trans('client::alerts.backend.client.deleted'));
    }
}
