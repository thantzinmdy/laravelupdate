<?php

return [
    'name' => 'AppSetting',
    'icon' => 'nav-icon fas fa-cog',
    'basic' => [
        'facebook' => env('FACEBOOK', ''),
        'name' => env('APP_NAME', 'BNF Delivery'),
        'email' => env('APP_EMAIL', 'bnfdelivery@gmail.com'),
        'qr_prefix' => env('QR_PREFIX', 'BNF'),
        'address' => env('APP_ADDRESS', 'No. 391 Waizayantar Road, Za/South Quarter, Thingangyun Township, Yangon, Myanmar.'),
        'phone' => env('APP_PHONE', '+959420077655,+959969910109'),
        'main_logo' => env('MAIN_LOGO', ''),
        'favicon' => env('APP_FAVICON', ''),
        'meta_keywords' => env('META_KEYWORDS'),
        'meta_description' => env('META_DESCRIPTION'),
        'date_format' => env('DATE_FORMAT', 'Y-m-d'),
        'time_format' => env('TIME_FORMAT'),
        'datetime_format' => env('DATETIME_FORMAT'),
        'youtubedemo' => env('YOUTUBEDEMO'),
        'map_key' => env('GOOGLE_MAP'),
        'appstore' => env('APPSTORE'),
        'playstore' => env('PLAYSTORE'),
        'app_dollar_rate' => env('APP_DOLLAR_RATE', ''),
    ],

    'email' => [
        'mail_driver' => env('MAIL_DRIVER', 'Smtp'),
        'mail_host' => env('MAIL_HOST', 'smtp.mailtrap.io'),
        'mail_port' => env('MAIL_PORT', '587'),
        'mail_username' => env('MAIL_USERNAME', '7d41168bba76b9'),
        'mail_password' => env('MAIL_PASSWORD', '338a6d5b5f94cd'),
        'mail_encryption' => env('MAIL_ENCRYPTION', 'tls'),
    ],

    'covid' => [
        'total_cases' => env('TOTAL_CASES', '0'),
        'new_cases' => env('NEW_CASES', '0'),
        'total_deaths' => env('TOTAL_DEATHS', '0'),
        'new_deaths' => env('NEW_DEATHS', '0'),
        'total_recovered' => env('TOTAL_RECOVERED', '0'),
    ],

    
    /**
     * Date Format
     */
    'date_format_list' => [
        'd-m-Y'  => date('d-m-Y'),
        'm-d-Y'  => date('m-d-Y'),
        'd/m/Y'  => date('d/m/Y'),
        'm/d/Y'  => date('m/d/Y'),
        'F d, Y' => date('F d, Y'),
        'M d, Y' => date('M d, Y'),
    ],

    
     /**
     * Time Format
     */
    'time_format_list' => [
        'h:i A' => '09:15 AM/PM',
        'H:i' => '21:15',
    ],

    
    /**
     * Date Time Format
     */
    'datetime_format_list' => [
        'd-m-Y h:i A' => date('d-m-Y').' 09:15 AM/PM',
        'd-m-Y H:i' => date('d-m-Y').' 21:15',
        'd/m/Y h:i A' => date('d/m/Y').' 09:15 AM/PM',
        'd/m/Y H:i' => date('m/d/Y').' 21:15',
        'F d, Y h:i A' => date('F d, Y').' 09:15 AM/PM',
        'F d, Y H:i' => date('F d, Y').' 21:15',
        'M d, Y h:i A' => date('M d, Y').' 09:15 AM/PM',
        'M d, Y H:i' => date('M d, Y').' 21:15',
    ],
];
