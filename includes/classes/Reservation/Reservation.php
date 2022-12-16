<?php

class Reservation
{
    public int $id;
    public string $lane;
    public Weapon $weapon;
    public string $stance;
    public string $date;
    public string $time;
    public User $user;
}