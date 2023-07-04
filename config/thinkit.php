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
        'env_no_pass' => \ThinKit\Helpers\Env::strToArray(env('APP_PHPINFO_ENV', 'local,development')),
        'info_pass'   => env('APP_PHPINFO_PASS'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Developer info
    |--------------------------------------------------------------------------
    |
    */
    'main_dev_email' => env('MAIN_DEV_EMAIL', 'yg@think.studio'),
    'dev_emails'     => \ThinKit\Helpers\Env::strToArray(
        env('APP_DEV_EMAILS', env('MAIN_DEV_EMAIL', 'yg@think.studio'))
    ),


    /*
     |--------------------------------------------------------------------------
     | Enums
     |--------------------------------------------------------------------------
     |
     */
    'enums' => [
        'trans_file_name'       => 'enums',
        'formatted_options_key' => [
            'value' => 'value',
            'label' => 'label',
        ],
    ],

];
