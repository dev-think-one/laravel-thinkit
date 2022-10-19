<?php

namespace ThinKit\Tests\Enums;

use Illuminate\Support\Str;
use ThinKit\Tests\Fixtures\TypeEnum;
use ThinKit\Tests\TestCase;

class HasNamesTest extends TestCase
{
    /** @test */
    public function get_name()
    {
        $this->assertEquals('enums.type_enum.general', TypeEnum::GENERAL->name());
        $this->assertEquals('enums.type_enum.specific_type', TypeEnum::SPECIFIC->name());
    }

    /** @test */
    public function get_trans_file_name()
    {
        $this->assertEquals('enums', TypeEnum::GENERAL->transFileName());
        $this->assertEquals(config('thinkit.enums.trans_file_name'), TypeEnum::SPECIFIC->transFileName());
    }

    /** @test */
    public function get_trans_key()
    {
        $this->assertEquals(Str::snake(class_basename(TypeEnum::class)), TypeEnum::GENERAL->transKey());
        $this->assertEquals(Str::snake(class_basename(TypeEnum::class)), TypeEnum::SPECIFIC->transKey());
    }

    /** @test */
    public function get_options()
    {
        $options = TypeEnum::options();
        $this->assertCount(2, $options);
        $this->assertArrayHasKey('general', $options);
        $this->assertArrayHasKey('specific_type', $options);
        $this->assertEquals($options['general'], TypeEnum::GENERAL->name());
        $this->assertEquals($options['specific_type'], TypeEnum::SPECIFIC->name());
    }

    /** @test */
    public function get_formatted_options()
    {
        $options = TypeEnum::formattedOptions();
        $this->assertCount(2, $options);
        $specificObject = $options[1];
        $this->assertEquals($specificObject[config('thinkit.enums.formatted_options_key.value')], TypeEnum::SPECIFIC->value);
        $this->assertEquals($specificObject[config('thinkit.enums.formatted_options_key.label')], TypeEnum::SPECIFIC->name());
    }
}
