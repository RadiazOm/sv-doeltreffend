<?php

class Date
{
    private string $day;
    private string $month;
    private string $year;
    private string $weekday;

    public static function getWeekday(int $monthsBack, string $date): string
    {
        $day = date('N', time() - 2628000 * $monthsBack);


        $day -= ($date % 7) - 1;


        if ($day < 0) {
            $day = 7 + $day;
        }
        return $day;
    }
}