<?php

namespace Mawuekom\RequestSanitizer\Sanitizers;

use Mawuekom\RequestSanitizer\Contracts\SanitizerContract;

/**
 * Capitalizes each first character of a new word in a string
 *
 * Class CapitalizeEachWords
 *
 * @package Mawuekom\RequestSanitizer\Sanitizers
 */
class CapitalizeEachWords implements SanitizerContract
{
    /**
     * Sanitize an input and return it.
     *
     * @param  $input
     * @return mixed
     */
    public function sanitize($input)
    {
        return ucwords($input);
    }
}