<?php

namespace ThinKit\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PhpInfoController extends Controller
{
    public function __invoke(Request $request)
    {
        if (app()->environment(config('thinkit.php.env_no_pass')) ||
            ((string) $request->input('pass')) === config('thinkit.php.info_pass')
        ) {
            phpinfo();

            return;
        }
        abort(404);
    }
}
