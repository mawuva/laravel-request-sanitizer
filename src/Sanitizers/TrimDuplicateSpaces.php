<?php

namespace Mawuekom\RequestSanitizer\Sanitizers;

use Mawuekom\RequestSanitizer\Contracts\SanitizerContract;

/**
 * Replaces duplicate spaces with a single space.
 *
 * Class TrimDuplicateSpaces
 *
 * @package Mawuekom\RequestSanitizer\Sanitizers
 */
class TrimDuplicateSpaces implements SanitizerContract
{
    /**
     * Sanitize an input and return it.
     *
     * @param  $input
     * @return mixed
     */
    public function sanitize($input)
    {
        return preg_replace('~\s{2,}~', ' ', $input);
    }
}