<?php

namespace ThinKit\Tests\Helpers;

use ThinKit\Helpers\Arr;
use ThinKit\Tests\TestCase;

class ArrHelperTest extends TestCase
{
    /** @test */
    public function add_args_test()
    {
        $config = [
            'seed' => [
                'css' => 'foo',
                'js'  => 'bar',
            ],
            'base'        => 'baz',
            'separator'   => ',',
            'application' => [
                'config' => [
                    'lang' => 'en-US',
                ],
                'callback' => '(new Processes()).startAll();',
            ],
        ];

        $options = [
            'application' => [
                'config' => [
                    'lang' => 'zh-TW',
                ],
            ],
        ];

        $merged = Arr::arrayMergeRecursiveDistinct($config, $options);

        $this->assertIsArray($merged);
        $this->assertIsArray($merged['application']);
        $this->assertIsArray($merged['application']['config']);
        $this->assertCount(1, $merged['application']['config']);
        $this->assertEquals('zh-TW', $merged['application']['config']['lang']);

    }


}
