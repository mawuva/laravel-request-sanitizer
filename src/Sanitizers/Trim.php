<?php

namespace Mawuekom\RequestSanitizer\Sanitizers;

use Mawuekom\RequestSanitizer\Contracts\SanitizerContract;

/**
 * Simple PHP trim() implementation
 *
 * Class Trim
 *
 * @package Mawuekom\RequestSanitizer\Sanitizers
 */
class Trim implements SanitizerContract
{
    /**
     * Sanitize an input and return it.
     *
     * @param  $input
     * @return mixed
     */
    public function sanitize($input)
    {
        return trim($input);
    }
}