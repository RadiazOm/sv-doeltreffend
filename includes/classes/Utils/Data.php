<?php

/**
 * Class Data
 * @package System\Form
 */
class Data
{
    /**
     * Data constructor.
     *
     * @param array $post
     */
    public function __construct(private array $post)
    {
    }

    /**
     * Check if a var exists in the current post state
     *
     * @param string $var
     * @return bool
     */
    public function varExists(string $var): bool
    {
        return array_key_exists($var, $this->post);
    }

    /**
     * Retrieve a var from the post array
     *
     * @param string $var
     * @return string|array
     */
    public function getPostVar(string $var): array|string
    {
        //I simply hacked a checkbox / empty select situation :(
        if (!isset($this->post[$var])) {
            return '';
        }

        //And if 1 or more checkbox values are added
        $value = $this->post[$var];
        if (is_array($value)) {
            foreach ($value as $key => $val) {
                $value[$key] = htmlentities($val);
            }

            return $value;
        }

        //Or just a single non checkbox field
        return htmlentities($value);
    }
}
