<?php

class FormHelper
{
    private array $errors = [];

    public function text(string $value, string $field, int $min, int $max): string
    {
        $value = trim($value);

        if ($value === '') {
            $this->errors[$field] = 'This field is required.';
            return '';
        }

        if (strlen($value) < $min || strlen($value) > $max) {
            $this->errors[$field] = "Must be between $min and $max characters.";
        }

        return $value;
    }

    public function hasErrors(): bool
    {
        return !empty($this->errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }
}
