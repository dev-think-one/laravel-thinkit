<?php

namespace ThinKit\Helpers;

use Carbon\Carbon;
use Carbon\Exceptions\InvalidFormatException;

class DateTime
{
    /**
     * Create date object from multiple formats.
     *
     * @param  array  $formats
     * @param  string  $dateString
     * @return \Carbon\Carbon
     * @throws \Exception|\Carbon\Exceptions\InvalidFormatException
     */
    public static function createFromMultipleFormats(array $formats, string $dateString): Carbon
    {
        $dateObj   = null;
        $lastError = null;
        foreach ($formats as $format) {
            try {
                if ($dateObj = Carbon::createFromFormat($format, $dateString)) {
                    break;
                }
            } catch (InvalidFormatException $e) {
                $lastError = $e;
            }
        }
        if (!$dateObj) {
            throw $lastError;
        }

        return $dateObj;
    }
}
