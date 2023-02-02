<?php

namespace ThinKit\Helpers;

class Env
{
    public static function strToArray(?string $env = '', string $separator = ',', \Closure|string $callback = 'trim'): array
    {
        return array_filter(array_map(
            'trim',
            explode($separator, (string)$env)
        ));
    }
}
