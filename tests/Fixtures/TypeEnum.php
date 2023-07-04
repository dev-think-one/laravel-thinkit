<?php

namespace ThinKit\Tests\Fixtures;

use ThinKit\Enums\HasNames;
use ThinKit\Enums\NamedEnum;

enum TypeEnum: string implements NamedEnum
{
    use HasNames;

    case GENERAL  = 'general';
    case SPECIFIC = 'specific_type';
}
