<?php

namespace Mawuekom\RequestSanitizer\Sanitizers;

use Mawuekom\RequestSanitizer\Contracts\SanitizerContract;

/**
 * Converts a string to lowercase
 *
 * Class Lowercase
 *
 * @package Mawuekom\RequestSanitizer\Sanitizers
 */
class Lowercase implements SanitizerContract
{
    /**
     * Sanitize an input and return it.
     *
     * @param  $input
     * @return string
     */
    public function sanitize($input)
    {
        return strtolower($input);
    }
}