<?php

namespace PageWeb\Support\Validation;

use Illuminate\Support\MessageBag;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
interface InputValidationInterface
{
    /**
     * Add data to validate against
     *
     * @param array
     *
     * @return InputValidationInterface  $this
     */
    public function with(array $input);

    /**
     * Return validation rules
     *
     * @return array
     */
    public function rules();

    /**
     * Test if validation passes
     *
     * @return boolean
     */
    public function passes();

    /**
     * Retrieve validation errors
     *
     * @return MessageBag
     */
    public function errors();
}
