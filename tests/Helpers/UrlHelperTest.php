<?php

namespace ThinKit\Tests\Helpers;

use ThinKit\Helpers\Url;
use ThinKit\Tests\TestCase;

class UrlHelperTest extends TestCase
{
    /** @test */
    public function add_args_test()
    {
        $newUrl = Url::addOrUpdateArgs('https://my.path.co.uk?example=foo&test=bar', 'new', 'baz');
        $this->assertEquals('https://my.path.co.uk?example=foo&test=bar&new=baz', $newUrl);
    }

    /** @test */
    public function update_args_test()
    {
        $newUrl = Url::addOrUpdateArgs('https://my.path.co.uk?example=foo&test=bar', 'example', 'baz');
        $this->assertEquals('https://my.path.co.uk?example=baz&test=bar', $newUrl);
    }
}
