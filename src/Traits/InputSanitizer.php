<?php

namespace Mawuekom\RequestSanitizer\Traits;

use Illuminate\Support\Arr;
use InvalidArgumentException;
use Mawuekom\RequestSanitizer\Contracts\SanitizerContract;

/**
 * Input sanitizer trait
 *
 * Trait InputSanitizer
 *
 * @package Mawuekom\RequestSanitizer\Traits
 */
trait InputSanitizer
{
    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this ->sanitize();
    }

    /**
     * Sanitize form input
     * 
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function sanitize()
    {
        $input = $this ->all();

        foreach ($this ->getSanitizers() as $form_input => $sanitizers) {
            if ($this ->has($form_input)) {
                // If the request does not have a property for this key, there is no need to sanitize anything.
                continue;
            }

            $sanitizers = (array) $sanitizers;

            foreach ($sanitizers as $key => $value) {
                if (is_string($key)) {
                    $sanitizer = app()->make($key, $value);
                } 
                
                elseif (is_string($value)) {
                    $sanitizer = app()->make($value);
                } 
                
                elseif ($value instanceof SanitizerContract) {
                    $sanitizer = $value;
                } 
                
                else {
                    throw new InvalidArgumentException('Could not resolve sanitizer from given properties');
                }

                Arr::set($input, $form_input, $sanitizer->sanitize($this->input($form_input, null)));

                $this->replace($input);
            }
        }

        return $this->replace($input);
    }

    /**
     * Add a single sanitizer.
     *
     * @param string $form_input
     * @param Mawuekom\RequestSanitizer\Contracts\SanitizerContract $sanitizers
     *
     * @return $this
     */
    public function addSanitizer(string $form_input, $sanitizers)
    {
        if (!property_exists($this, 'sanitizers')) {
            $this ->sanitizers = [];
        }

        if (!isset($this ->sanitizers[$form_input])) {
            $this ->sanitizers[$form_input] = [];
        }

        $this ->sanitizers[$form_input][] = $sanitizers;

        return $this;
    }

    /**
     * Add multiple sanitizers.
     *
     * @param string $form_input
     * @param array $sanitizers
     *
     * @return $this
     */
    public function addSanitizers($form_input, $sanitizers = [])
    {
        foreach ($sanitizers as $sanitizer) {
            $this ->addSanitizer($form_input, $sanitizer);
        }

        return $this;
    }

    /**
     * Get sanitizers defined for form input
     * 
     * @param null $form_input
     *
     * @return array
     */
    public function getSanitizers($form_input = null)
    {
        if (!property_exists($this, 'sanitizers')) {
            $this ->sanitizers = [];
        }

        if ($form_input !== null) {
            return $this->sanitizers[$form_input] ?? [];
        }

        return $this ->sanitizers;
    }
}