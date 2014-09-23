<?php

namespace PageWeb\Support\Validation;

use Illuminate\Validation\Factory;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
abstract class BaseInputValidation implements InputValidationInterface
{
    /**
     * Validator
     *
     * @var \Illuminate\Validation\Factory
     */
    protected $validator;

    /**
     * Validation data key => value array
     *
     * @var Array
     */
    protected $data = array();

    /**
     * Validation errors
     *
     * @var Array
     */
    protected $errors = array();

    /**
     * @var array
     */
    protected $rules = array();

    /**
     * Constructor
     *
     * @param Factory $validator
     */
    public function __construct(Factory $validator)
    {
        $this->validator = $validator;
    }

    /**
     * {@inheritDoc}
     */
    public function with(array $data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function passes()
    {
        $validator = $this->validator->make(
            $this->data,
            $this->rules ? $this->rules : $this->rules()
        );

        if ($validator->passes()) {
            return true;
        }

        $this->errors = $validator->messages();

        return false;
    }

    /**
     * {@inheritDoc}
     */
    public function errors()
    {
        return $this->errors;
    }

    /**
     * {@inheritDoc}
     */
    public function rules()
    {
        return $this->rules;
    }
}
