<?php

namespace ThinKit\Contracts;

interface NamedEnum
{
    /**
     * Enumeration unit human-readable name
     */
    public function name(): string;

    /**
     * Translations file name.
     */
    public function transFileName(): string;

    /**
     * Translations key used for enum.
     */
    public function transKey(): string;

    /**
     * Convert enum to array with names.
     */
    public static function options(): array;

    /**
     * Convert enum to array with names (array of arrays.)
     */
    public static function formattedOptions(): array;
}
