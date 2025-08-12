<?php

use Illuminate\Http\Request;

if (! function_exists('app_name')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function app_name()
    {
        return config('app.name');
    }
}

if (! function_exists('gravatar')) {
    /**
     * Access the gravatar helper.
     */
    function gravatar()
    {
        return app('gravatar');
    }
}

if (! function_exists('home_route')) {
    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function home_route()
    {
        if (auth()->check()) {
            if (auth()->user()->can('view backend')) {
                return 'admin.dashboard';
            }
            else if(auth()->user()->is_student) {
                return 'frontend.user.student-dashboard';
            }

            return 'frontend.user.dashboard';
        }

        return 'frontend.index';
    }
}

if (! function_exists('rand_color')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function rand_color()
    {
        $colors = array('primary','secondary','success','danger','warning','info','lightdark');

        shuffle($colors);

        return $colors;
    }
}

if (! function_exists('global_request_log')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function global_request_log(Request $request)
    {
        $current_url = $request->url();
        $write_log = array_where(config('backend.logger_ignored_path'), function ($value,$key) use ($current_url) {
            return str_contains($current_url,$value);
        });

        if(count($write_log) == 0){
            $request_informations = json_encode([
                        'ip'       => \Request::ip(),
                        'device'   => Agent::device().' '.Agent::platform(),
                      'user_agent' => Agent::browser(),
                        'platform' => Agent::platform(),
                        'data'     => json_encode($request->except('_token','_method'))
                    ]);
            $user = "Guest - ";
            if(auth()->id()){
                $user = auth()->user()->name." (ID : ".auth()->user()->id.')';
            }

            \Log::debug($user.' Requested '.$request->url().'('.$request->method().') ::: '.$request_informations);
        }
    }
}