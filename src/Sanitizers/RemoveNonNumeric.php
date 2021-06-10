<?php

namespace Mawuekom\RequestSanitizer\Sanitizers;

use Mawuekom\RequestSanitizer\Contracts\SanitizerContract;

/**
 * Removes any non numeric character
 *
 * Class RemoveNonNumeric
 *
 * @package Mawuekom\RequestSanitizer\Sanitizers
 */
class RemoveNonNumeric implements SanitizerContract
{
    /**
     * Sanitize an input and return it.
     *
     * @param  $input
     * @return string
     */
    public function sanitize($input)
    {
        return preg_replace('~[^0-9]+~', '', $input);
    }
}