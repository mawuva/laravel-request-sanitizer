<?php

namespace Mawuekom\RequestSanitizer\Sanitizers;

use Illuminate\Support\Collection;
use Mawuekom\RequestSanitizer\Contracts\SanitizerContract;

/**
 * Casts a variable into the given type.
 *
 * Class Cast
 *
 * @package Mawuekom\RequestSanitizer\Sanitizers
 */
class Cast implements SanitizerContract
{
    /**
     * Sanitize an input and return it.
     *
     * @param  $input
     * @return string
     */
    public function sanitize($input)
    {
        $type = isset($options[0]) ? $options[0] : null;
        
        switch ($type) {
            case 'int':
            case 'integer':
                return (int) $input;
            case 'real':
            case 'float':
            case 'double':
                return (float) $input;
            case 'string':
                return (string) $input;
            case 'bool':
            case 'boolean':
                return (bool) $input;
            case 'object':
                return is_array($input) ? (object) $input : json_decode($input, false);
            case 'array':
                return json_decode($input, true);
            case 'collection':
                $array = is_array($input) ? $input : json_decode($input, true);
                return new Collection($array);
            default:
                throw new \InvalidArgumentException("Wrong Sanitizer casting format: {$type}.");
        }
    }
}