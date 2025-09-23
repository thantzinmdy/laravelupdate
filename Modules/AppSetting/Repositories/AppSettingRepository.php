<?php

namespace Modules\AppSetting\Repositories;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AppSettingRepository.
 */
class AppSettingRepository extends BaseRepository
{
    public function update($request) : bool
    {
        $tab = $request->tab;
        $data = $request->except('_token', '_method', 'tab');

        if ($tab == 'basic') {
            $mainLogoUrl =  config('appsetting.basic.main_logo');
            if ($request->hasFile('main_logo')) {
                $file = $request->file('main_logo');
                $logoName = 'main_logo.'.$file->extension();
                $mainLogo = explode("/", $mainLogoUrl);
                \File::delete('app_data/'. end($mainLogo));
                //$file->move(base_path('app_data/'), $logoName);
                $file->move('app_data/', $logoName);
                $data['main_logo'] =  url('app_data/'.$logoName);
            }

            $logoUrl =  config('appsetting.basic.favicon');
            if ($request->hasFile('app_favicon')) {
                $file = $request->file('app_favicon');
                $faviconName = 'logo.'.$file->extension();
                $favLogo = explode("/", $logoUrl);
                \File::delete('app_data/'. end($favLogo));
                //$file->move(base_path('app_data/'), $faviconName);
                $file->move('app_data/', $faviconName);
                $data['app_favicon'] =  url('app_data/'.$faviconName);
            }
            
            $defaults = [
              config('appsetting.basic.appstore'), config('appsetting.basic.playstore'),
              config('appsetting.basic.youtubedemo'), config('appsetting.basic.name'),
              config('appsetting.basic.facebook'), config('appsetting.basic.email'),
              config('appsetting.basic.phone'),config('appsetting.basic.address'),
              config('appsetting.basic.map_key'),config('appsetting.basic.meta_keywords'),
              config('appsetting.basic.meta_description'),config('appsetting.basic.date_format'),
              config('appsetting.basic.time_format'),config('appsetting.basic.datetime_format'),
              $mainLogoUrl,$logoUrl,
            ];
        } elseif ($tab == 'email') {
            $defaults = [
                config('appsetting.email.mail_driver'), config('appsetting.email.mail_host'),
                config('appsetting.email.mail_port'), config('appsetting.email.mail_username'),
                config('appsetting.email.mail_password'), config('appsetting.email.mail_encryption'),
            ];

        }

        $content = file_get_contents(base_path() . '/.env');
        // replace default values with new ones
        $i = 0;

        // print('<pre>');
        // print_r($defaults);
        // print('<hr>');
        // dd($data);

        foreach ($data as $key => $value) {
            $content = str_replace(strtoupper($key).'="'.$defaults[$i].'"', strtoupper($key).'="'.$value.'"', $content);
            if (strpos($content, strtoupper($key).'="'.$value.'"')  === false) {
                return false;
            }

            $i++;
        }

        // dd($content);
        // Update .env file
        $path = base_path('.env');
        // $path = "/Applications/XAMPP/htdocs/bnfbus-v2/.env";
        if (file_exists($path)) {
            file_put_contents($path, $content);
        }
        return true;
    }
}
