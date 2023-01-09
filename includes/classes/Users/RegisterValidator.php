<?php

class RegisterValidator implements Validator
{
    private array $errors = [];

    public function __construct(private User $user, private User $databaseUser)
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
        if ($this->user->password == '') {
            $this->errors[] = 'Password cannot be empty';
        }
        if (isset($this->databaseUser->first_name)) {
            $this->errors[] = 'This user already exists';
        }
        if (!isset($this->databaseUser->knsa) || $this->user->knsa != $this->databaseUser->knsa) {
            $this->errors[] = 'KNSA-number does not exist';
        }
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}
