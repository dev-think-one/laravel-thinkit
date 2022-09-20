<?php

namespace ThinKit;

class TooltKit
{
    /**
     * Indicates if general routes will be registered.
     *
     * @var bool
     */
    public static $registersRoutes = true;

    /**
     * Configure tool to not register its routes.
     *
     * @return static
     */
    public static function ignoreRoutes()
    {
        static::$registersRoutes = false;

        return new static;
    }
}
