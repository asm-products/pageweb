<?php

namespace PageWeb\Support\Exception;

use ArrayIterator;
use Illuminate\Support\Contracts\MessageProviderInterface;
use InvalidArgumentException;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class ValidationException extends InvalidArgumentException
{
    public function __construct($errors)
    {
        if ($errors instanceof ArrayIterator) {
            $errors = iterator_to_array($errors);
        } elseif ($errors instanceof MessageProviderInterface) {
            $errors = $errors->getMessageBag()->toArray();
        }

        $this->errors['error'] = $errors;
    }

    public function errors()
    {
        return $this->errors;
    }

    public function getFirstError()
    {
        return array_first($this->errors, function ($key, $value) {
            return $key == 'error';
        });
    }
}
 