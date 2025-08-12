<?php

namespace Modules\AppSetting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\AppSetting\Http\Requests\CreateAppSettingRequest;
use Modules\AppSetting\Repositories\AppSettingRepository;

class AppSettingController extends Controller
{
    /**
        * @var AppSettingRepository
        * @var CategoryRepository
        */
    protected $appsetting;

    /**
     * @param AppSettingRepository $appsetting
     */
    public function __construct(AppSettingRepository $appsetting)
    {
        $this->appsetting = $appsetting;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('appsetting::index');
    }


    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateAppSettingRequest $request)
    {
        $result = $this->appsetting->update($request);
        if ($result) {
            return redirect()->route('admin.appsetting.index')->withFlashSuccess(trans('appsetting::alerts.backend.appsetting.updated'));
        } else {
            return redirect()->route('admin.appsetting.index')->withFlashDanger(trans('appsetting::alerts.backend.appsetting.updated_error'));
        }
    }
}
