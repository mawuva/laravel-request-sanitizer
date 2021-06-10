<?php

namespace Mawuekom\RequestSanitizer\Sanitizers;

use Mawuekom\RequestSanitizer\Contracts\SanitizerContract;

/**
 * Remove HTML tags and encode special characters from the given string.
 *
 * Class EscapeHTML
 *
 * @package Mawuekom\RequestSanitizer\Sanitizers
 */
class EscapeHTML implements SanitizerContract
{
    /**
     * Sanitize an input and return it.
     *
     * @param  $input
     * @return string
     */
    public function sanitize($input)
    {
        return is_string($input) ? filter_var($input, FILTER_SANITIZE_STRING) : $input;
    }
}