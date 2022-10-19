<?php

namespace ThinKit\Tests\Fixtures;

use ThinKit\Enums\HasNames;

enum TypeEnum: string
{
    use HasNames;

    case GENERAL  = 'general';
    case SPECIFIC = 'specific_type';
}
