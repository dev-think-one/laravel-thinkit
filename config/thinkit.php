<?php

return [
    /*
     |--------------------------------------------------------------------------
     | PHP
     |--------------------------------------------------------------------------
     |
     */
    'php' => [
        'uri' => env('APP_PHPINFO_URI', 'php'),
        // Environments allows to see page without password
        'env_no_pass' => array_filter(array_map(
            'trim',
            explode(',', env('APP_PHPINFO_ENV', 'local,development'))
        )),
        'info_pass' => env('APP_PHPINFO_PASS', 'APP630461'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Developer info
    |--------------------------------------------------------------------------
    |
    */
    'main_dev_email' => env('MAIN_DEV_EMAIL', 'yg@think.studio'),
    'dev_emails'     => array_filter(array_map(
        'trim',
        explode(',', env('APP_DEV_EMAILS', env('MAIN_DEV_EMAIL', 'yg@think.studio')))
    )),

];
