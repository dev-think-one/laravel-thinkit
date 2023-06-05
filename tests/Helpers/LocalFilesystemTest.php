<?php

namespace ThinKit\Tests\Helpers;

use ThinKit\Helpers\LocalFilesystem;
use ThinKit\Tests\TestCase;

class LocalFilesystemTest extends TestCase
{
    /** @test */
    public function return_size()
    {
        $dirSize = LocalFilesystem::fileSizeBytes(__DIR__);
        $this->assertGreaterThan(6000, $dirSize);

        $fileSize = LocalFilesystem::fileSizeBytes(__FILE__);
        $this->assertGreaterThan(415, $fileSize);
        $this->assertLessThan(500, $fileSize);
    }

}
