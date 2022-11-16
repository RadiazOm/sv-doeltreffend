<?php

class Weapon
{
    /**
     * @param string $id
     * @param string $name
     */
    public function __construct(
        public string $id,
        public string $name
    )
    {}
}