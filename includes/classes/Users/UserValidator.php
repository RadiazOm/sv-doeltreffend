<?php

class UserValidator implements Validator
{
    private array $errors = [];

    public function __construct(private User $user)
    {
    }

    public function validate(): void
    {
        if ($this->user->first_name == '') {
            $this->errors[] = 'First name cannot be empty';
        }
        if ($this->user->last_name == '') {
            $this->errors[] = 'Last name cannot be empty';
        }
        if ($this->user->email == '') {
            $this->errors[] = 'Email cannot be empty';
        }
        if ($this->user->phone == '') {
            $this->errors[] = 'Phone number cannot be empty';
        }
        if (!is_numeric($this->user->phone)) {
            $this->errors[] = 'Phone number must be numeric';
        }
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}