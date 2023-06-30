<?php

namespace ThinKit\Enums;

interface HumanReadableEnum extends \BackedEnum
{
    public function name(): string;

    public static function options(): array;

    public static function formattedOptions(): array;
}
