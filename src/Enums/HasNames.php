<?php

namespace ThinKit\Enums;

use Illuminate\Support\Str;

trait HasNames
{
    public function name(): string
    {
        return trans("{$this->transFileName()}.{$this->transKey()}.{$this->value}");
    }

    public function transFileName(): string
    {
        return config('thinkit.enums.trans_file_name');
    }

    public function transKey(): string
    {
        return Str::snake(class_basename(static::class));
    }

    public static function options(): array
    {
        $data = [];
        foreach (static::cases() as $case) {
            $data[$case->value] = $case->name();
        }

        return $data;
    }

    public static function formattedOptions(): array
    {
        $data = [];
        foreach (static::options() as $value => $label) {
            $data[] = [
                config('thinkit.enums.formatted_options_key.value') => $value,
                config('thinkit.enums.formatted_options_key.label') => $label,
            ];
        }

        return $data;
    }
}
