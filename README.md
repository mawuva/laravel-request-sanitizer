# Laravel Request Sanitizer

### *An easy to use request sanitizer that allows you to sanitize your form data before validating it.*

<br>
This package provides an easy way and a fluent interface to format or sanitize form request (user input) before validating them.

<br>

## Why this package ?

Often, validating your request is not enough. The request sanitizer allows you to easily 
manipulate your form data (user input) before passing it to the validator. 
It is fully compatible with Laravel's `FormRequest` object.

## Quick example

Syntax is similar to the way `rules` are added to a [Form Request](https://laravel.com/docs/master/validation#form-request-validation).

```php
class StoreUserDataRequest extends FormRequest
{
     use InputSanitizer;
     
     protected $sanitizers = [
        'name' => [
            Uppercase::class,
        ],
        'first_name' => [
            CapitalizeEachWords::class,
        ],
        'phone_number' => [
            RemoveNonNumeric::class
        ],
     ];
}
```

## Installation

You can install the package via composer:

```bash
composer require mawuekom/laravel-request-sanitizer
```

## Available Sanitizers

Sanitizer  | Description
:---------|:----------
 [**`Capitalize`**](./src/Sanitizers/Capitalize.php)   | Capitalizes the first character of a string
 [**`CapitalizeEachWords`**](./src/Sanitizers/CapitalizeEachWords.php) | Capitalizes each first character of a new word in a string
 [**`Cast`**](./src/Sanitizers/Cast.php) | Casts a variable into the given type.
 [**`EscapeHTML`**](./src/Sanitizers/EscapeHTML.php) | Remove HTML tags and encode special characters from the given string.
 [**`FilterVars`**](./src/Sanitizers/FilterVars.php) | Simple PHP `filter_var` sanitizer
 [**`Lowercase`**](./src/Sanitizers/Lowercase.php) | Converts a string to lowercase
 [**`RemoveNonNumeric`**](./src/Sanitizers/RemoveNonNumeric.php) | Removes any non numeric character
 [**`StripTags`**](./src/Sanitizers/StripTags.php) | Strip HTML and PHP tags using php's `strip_tags()`
 [**`Trim`**](./src/Sanitizers/Trim.php) | Trims a string using php's `trim()`
 [**`TrimDuplicateSpaces`**](./src/Sanitizers/TrimDuplicateSpaces.php) | Replaces duplicate spaces with a single space.
 [**`Uppercase`**](./src/Sanitizers/Uppercase.php) | Converts a string to uppercase

<br>
 - Contributions are appreciated!
<br>

### FilterVars usage

The FilterVars sanitizer acts as a wrapper of the default PHP `filter_var` function.
It accepts the same (optional) parameters as the original function.
Both parameters can be either an `array` or `string` type:

```php
 {
    protected $sanitizers = [
        'last_name' => [
            FilterVars::class => [
                'filter' => FILTER_SANITIZE_STRING,
                'options' => FILTER_FLAG_STRIP_BACKTICK
            ]
        ]
    ];
 }
```

For more information on filter_vars please refer to [PHP Documentation](https://www.php.net/manual/en/function.filter-var.php.)

## Writing your own Sanitizer

Writing your own sanitizer can be done by implementing the `Sanitizer` interface, which requires only
one method.

```php
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
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

