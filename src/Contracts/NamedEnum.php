<?php

namespace ThinKit\Contracts;

interface NamedEnum
{
    /**
     * Enumeration unit human-readable name
     */
    public function name(): string;

    /**
     * Convert enum to array with names.
     */
    public static function options(): array;

    /**
     * Convert enum to array with names (array of arrays.)
     */
    public static function formattedOptions(): array;
}
