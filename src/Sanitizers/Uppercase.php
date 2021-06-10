<?php

namespace Mawuekom\RequestSanitizer\Sanitizers;

use Mawuekom\RequestSanitizer\Contracts\SanitizerContract;

/**
 * Converts a string to uppercase
 *
 * Class uppercase
 *
 * @package Mawuekom\RequestSanitizer\Sanitizers
 */
class Uppercase implements SanitizerContract
{
    /**
     * Sanitize an input and return it.
     *
     * @param  $input
     * @return string
     */
    public function sanitize($input)
    {
        return strtoupper($input);
    }
}