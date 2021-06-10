<?php

namespace Mawuekom\RequestSanitizer\Contracts;

/**
 * Request sanitizer contract
 *
 * Interface Sanitizer
 *
 * @package Mawuekom\RequestSanitizer\Contracts
 */
interface Sanitizer
{
    /**
     * Sanitize an input and return it.
     *
     * @param $input
     * @return mixed
     */
    public function sanitize($input);
}