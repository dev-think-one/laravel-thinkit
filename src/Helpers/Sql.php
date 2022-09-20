<?php

namespace ThinKit\Helpers;

class Sql
{
    /**
     * Display sql query with bindings
     *
     * @param $query
     *
     * @return string
     */
    public static function readableSqlFromQuery($query): string
    {
        return \Illuminate\Support\Str::replaceArray(
            '?',
            collect($query->getBindings())
                ->map(function ($i) {
                    if (is_object($i)) {
                        $i = (string) $i;
                    }

                    return (is_string($i)) ? "'$i'" : $i;
                })->all(),
            $query->toSql()
        );
    }
}
