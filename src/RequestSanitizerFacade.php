<?php

namespace Mawuekom\RequestSanitizer;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Mawuekom\RequestSanitizer\Skeleton\SkeletonClass
 */
class RequestSanitizerFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'request-sanitizer';
    }
}
