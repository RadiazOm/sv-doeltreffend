<?php

class Weapon
{
    /**
     * @param string $name
     * @param string $day
     */
    public function __construct(
        public string $name,
        public string $day
    )
    {}
}