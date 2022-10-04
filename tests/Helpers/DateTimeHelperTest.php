<?php

namespace ThinKit\Tests\Helpers;

use Carbon\Exceptions\InvalidFormatException;
use ThinKit\Helpers\DateTime;
use ThinKit\Tests\TestCase;

class DateTimeHelperTest extends TestCase
{
    /** @test */
    public function return_success()
    {
        $formats = [
            'Y-m-d',
            'Y-m-d\TH:i:s',
        ];

        $date = DateTime::createFromMultipleFormats($formats, '2022-09-28T08:19:00');
        $this->assertEquals('2022_09_28__08_19_00', $date->format('Y_m_d__H_i_s'));

        $date = DateTime::createFromMultipleFormats($formats, '2022-10-14');
        $this->assertEquals('2022_10_14', $date->format('Y_m_d'));
    }

    /** @test */
    public function return_exception()
    {
        $formats = [
            'Y-m-d',
            'Y-m-d\TH:i:s',
        ];

        $this->expectException(InvalidFormatException::class);
        DateTime::createFromMultipleFormats($formats, '2022-09-28 08:19:00');
    }
}
