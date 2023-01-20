<?php



class ReservationValidator implements Validator
{
    private array $errors = [];

    public function __construct(private Reservation $reservation)
    {
    }

    public function validate(): void
    {
        if ($this->reservation->user == '') {
            $this->errors[] = 'Please be logged in to make a reservation';
        }
        if ($this->reservation->lane > 10 || $this->reservation->lane < 1) {
            $this->errors[] = 'Please choose a valid lane';
        }
        if ($this->reservation->date == '') {
            $this->errors[] = 'Date cannot be empty';
        }
        $dateCheck = explode("-", $this->reservation->date, 3);
        if (count($dateCheck) < 3 || !checkdate($dateCheck[1], $dateCheck[2], $dateCheck[0])) {
            $this->errors[] = 'Please input a valid date';
        }
        if (strtotime($this->reservation->date) < time()) {
            $this->errors[] = 'Date cannot be in the past';
        }
        if ($this->reservation->time == '') {
            $this->errors[] = 'Time cannot be empty';
        }
        if (is_numeric($this->reservation->time)) {
            $this->errors[] = 'Time has to be numeric';
        }
        switch ($this->reservation->stance) {
            case 'standing':
            case 'laying':
            case 'kneeling':
                break;
            default:
                $this->errors[] = 'Please choose a valid stance';
        }
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}