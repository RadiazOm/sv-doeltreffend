<?php


/**
 * Class DatabaseInserter
 * @package System\Databases
 */
class DatabaseInserter extends Database
{
    /**
     * Save a album to the database
     *
     * @param Form $form
     * @return bool
     */
    public function addForm(Form $form): bool
    {
        $query = "INSERT INTO forms (subject, date, time, question, user_id) 
                  VALUES (:subject, :date, :time, :message, :user_id)";
        $statement = $this->connection->prepare($query);
        return $statement->execute([
            ':subject' => $form->subject,
            ':date' => $form->date,
            ':time' => $form->time,
            ':message' => $form->question,
            ':user_id' => $form->user_id
        ]);
    }

    /**
     * Save a album to the database
     *
     * @param Reservation $reservation
     * @return bool
     */
    public function addReservation(Reservation $reservation): bool
    {
        $query = "INSERT INTO reservations (weapon_id, lane, stance, date, time, user_id) 
                  VALUES (:weapon_id, :lane, :stance, :date, :time, :user_id)";
        $statement = $this->connection->prepare($query);

        return $statement->execute([
            ':weapon_id' => $reservation->weapon->id,
            ':lane' => $reservation->lane,
            ':stance' => $reservation->stance,
            ':date' => $reservation->date,
            ':time' => $reservation->time,
            ':user_id' => $reservation->user->id
        ]);
    }

    /**
     * Save a album to the database
     *
     * @param Reservation $reservation
     * @param int $id
     * @return bool
     */
    public function updateReservationById(Reservation $reservation, int $id): bool
    {
        $query = "UPDATE reservations SET weapon_id = :weapon_id, lane = :lane, stance = :stance, date = :date, time = :time
                    WHERE id = :id";
        $statement = $this->connection->prepare($query);

        return $statement->execute([
            ':weapon_id' => $reservation->weapon->id,
            ':lane' => $reservation->lane,
            ':stance' => $reservation->stance,
            ':date' => $reservation->date,
            ':time' => $reservation->time,
            ':id' => $id
        ]);
    }
}
