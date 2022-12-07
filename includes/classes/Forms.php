<?php

class Forms
{
    public string $name = 'Forms list';
    private array $forms = [];

    /**
     * @return Form[]
     */
    public function getForms(): array
    {
        return $this->forms;
    }

    /**
     * Retrieve raw array value & pass to Student object
     *
     * @param Form[] $forms
     * @throws \Exception
     */
    public function setForms(array $forms): void
    {
        $this->forms = $forms;
    }

    /**
     * @return int
     */
    public function getTotalForms(): int
    {
        return count($this->forms);
    }
}