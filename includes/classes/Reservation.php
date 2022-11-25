<?php

class Reservation
{
    public function __construct(
        public string $lane,
        public string $weapon,
        public string $date,
        public string $time,
        public string $user_id
    )
    {}
}