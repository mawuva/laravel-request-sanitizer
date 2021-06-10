<?php

namespace Mawuekom\RequestSanitizer\Sanitizers;

use Mawuekom\RequestSanitizer\Contracts\SanitizerContract;

/**
 * Capitalize input request
 *
 * Class Capitalize
 *
 * @package Mawuekom\RequestSanitizer\Sanitizers
 */
class Capitalize implements SanitizerContract
{
    /**
     * Sanitize an input and return it.
     *
     * @param  $input
     * @return mixed
     */
    public function sanitize($input)
    {
        return ucfirst($input);
    }
}