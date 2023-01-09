<?php

class LoginValidator implements Validator
{
    private array $errors = [];

    public function __construct(private User $user, private string $password)
    {
    }

    public function validate(): void
    {
        if (!empty($this->user->knsa) && !empty($this->user->email) && !empty($this->user->password)) {
            if (!password_verify($this->password, $this->user->password)) {
                $this->errors[] = 'Your login credentials are incorrect.';
            }
        } else {
            $this->errors[] = 'Your login credentials are incorrect.';
        }
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}
