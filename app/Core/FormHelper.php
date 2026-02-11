<?php

class FormHelper
{
    private $errors = [];

    /**
     * Validate a text field with min/max length.
     */
    public function text($value, $field, $min, $max)
    {
        $value = trim((string)$value);

        if ($value === '') {
            $this->errors[$field] = 'This field is required.';
            return '';
        }

        $len = strlen($value);
        if ($len < $min || $len > $max) {
            $this->errors[$field] = "Must be between {$min} and {$max} characters.";
            return '';
        }

        return $value;
    }

    public function hasErrors()
    {
        return !empty($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }
}
