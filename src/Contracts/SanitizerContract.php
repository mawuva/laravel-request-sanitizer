<?php

namespace Mawuekom\RequestSanitizer\Contracts;

/**
 * Request sanitizer contract
 *
 * Class DataManagerRepo
 *
 * @package Mawuekom\RequestSanitizer\Contracts
 */
interface SanitizerContract
{
    /**
     * Sanitize an input and return it.
     *
     * @param $input
     * @return mixed
     */
    public function sanitize($input);
}