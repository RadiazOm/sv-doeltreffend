<?php

class Arsenal
{
    public string $name = "Leenwapens";
    private array $weapons = [];

    public function getWeapons(): array
    {
        return $this->weapons;
    }

    public function addWeapon(array $value): void
    {
        $this->weapons[] = new Weapon($value['id'], $value['name']);
    }
}



