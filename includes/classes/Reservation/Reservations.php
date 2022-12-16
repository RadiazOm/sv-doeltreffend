<?php

class Reservations
{
    public string $name = "Reserveringen";
    private array $reservations = [];

    public function getReservations(): array
    {
        return $this->reservations;
    }

    public function setReservations(array $reservations): void
    {
        $this->reservations = $reservations;
    }

    public function getTotalReservations(): int
    {
        return count($this->reservations);
    }

    public function getReservation(int $id): Weapon
    {
        return $this->reservations[$id-1];
    }

    public function deleteReservation(int $id): void
    {
        unset($this->reservations[$id]);
//         $this->weapons = $this->sortArray($this->weapons, $id);
    }

    public function editReservation(int $id, string $lane, string $weapon, string $date, string $time): void
    {
        $this->reservations[$id-1]->lane = $lane;
        $this->reservations[$id-1]->weapon = $weapon;
        $this->reservations[$id-1]->date = $date;
        $this->reservations[$id-1]->time = $time;
    }
}