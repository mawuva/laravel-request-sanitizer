<?php

namespace Mawuekom\RequestSanitizer\Sanitizers;

use Mawuekom\RequestSanitizer\Contracts\SanitizerContract;

/**
 * Strip tags from the given string.
 *
 * Class StrigTags
 *
 * @package Mawuekom\RequestSanitizer\Sanitizers
 */
class StripTags implements SanitizerContract
{
    /**
     * Sanitize an input and return it.
     *
     * @param  $input
     * @return string
     */
    public function sanitize($input)
    {
        return is_string($input) ? strip_tags($input) : $input;
    }
}