<?php

class Arsenal
{
    public string $name = "Leenwapens";
    private array $weapons = [];

    public function getWeapons(): array
    {
        return $this->weapons;
    }

    public function setWeapons(array $weapons): void
    {
        $this->weapons = $weapons;
    }

    public function getTotalWeapons(): int
    {
        return count($this->weapons);
    }

    public function getWeapon(int $id): Weapon
    {
        return $this->weapons[$id-1];
    }

    public function deleteWeapon(int $id): void
    {
         unset($this->weapons[$id]);
//         $this->weapons = $this->sortArray($this->weapons, $id);
    }

    public function editWeapon(int $id, string $name, string $day): void
    {
        $this->weapons[$id-1]->name = $name;
        $this->weapons[$id-1]->day = $day;
    }

    private function sortArray(array $array, int $value): array
    {
        for ($i = $value + 1; $i <= count($array); $i++) {
            $array[$i]->id -= 1;
        }
        return $array;
    }
}



