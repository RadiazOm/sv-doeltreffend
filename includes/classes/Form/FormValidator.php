<?php



class FormValidator implements Validator
{
    private array $errors = [];

    public function __construct(private Form $form)
    {
    }

    public function validate(): void
    {
        if ($this->form->user == '') {
            $this->errors[] = 'Username and email cannot be empty';
        }
        if ($this->form->question == '') {
            $this->errors[] = 'Question cannot be empty';
        }
        switch ($this->form->subject) {
            case 'other':
            case 'technical':
                break;
            default:
                $this->errors[] = 'Please choose a valid subject';
        }
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}