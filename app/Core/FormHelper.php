<?php
class FormHelper
{
    private array $errors = [];

    public function text(string $value, string $field, int $min, int $max): string
    {
        $value = trim($value);

        if ($value === '') {
            $this->errors[$field] = ucfirst($field) . " is required.";
            return $value;
        }

        $len = mb_strlen($value);
        if ($len < $min) {
            $this->errors[$field] = ucfirst($field) . " must be at least {$min} characters.";
        } elseif ($len > $max) {
            $this->errors[$field] = ucfirst($field) . " must be {$max} characters or fewer.";
        }

        return $value;
    }

    public function errors(): array { return $this->errors; }
    public function hasErrors(): bool { return !empty($this->errors); }
}
