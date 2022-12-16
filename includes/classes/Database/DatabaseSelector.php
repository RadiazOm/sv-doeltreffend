<?php


/**
 * Class DatabaseSelector
 * @package System\Databases
 */
class DatabaseSelector extends Database
{
    /**
     * Get all albums from the database
     *
     * @return array
     */
    public function getForms(): array
    {
        return $this->connection->query('SELECT forms.*, users.first_name AS user_name FROM forms
                                                  LEFT JOIN users ON users.id = forms.user_id')->fetchAll(\PDO::FETCH_CLASS, '\\Form');
    }

    /**
     * @param string $query
     * @return array
     */
    public function getFormsByQuestion(string $query, string $filter = null): array
    {
        if (isset($filter) && $filter != '') {
            $statement = $this->connection->prepare("SELECT * FROM forms WHERE question LIKE :query ORDER BY $filter");
        } else {
            $statement = $this->connection->prepare("SELECT * FROM forms WHERE question LIKE :query");
        }
        $statement->execute([
            ':query' => '%' . $query . '%'
        ]);

        return $statement->fetchAll(\PDO::FETCH_CLASS, '\\Form');
    }

    /**
     * Get a specific album by its ID
     *
     * @param int $id
     * @return Form
     * @throws \Exception
     */
    public function getFormById(int $id): Form
    {
        $statement = $this->connection->prepare('SELECT * FROM forms WHERE id = :id');
        $statement->execute([':id' => $id]);

        if (($form = $statement->fetchObject('\\Form')) === false) {
            throw new \Exception('ID is not available in the database');
        }

        return $form;
    }

    /**
     * Get all albums from the database
     *
     * @return array
     */
    public function getWeapons(): array
    {
        return $this->connection->query('SELECT * FROM weapons')->fetchAll(\PDO::FETCH_CLASS, '\\Weapon');
    }

    /**
     * Get a specific album by its ID
     *
     * @param $id
     * @return Weapon
     * @throws \Exception
     */
    public function getWeaponById(int $id): Weapon
    {
        $statement = $this->connection->prepare('SELECT * FROM weapons WHERE id = :id');
        $statement->execute([':id' => $id]);

        if (($weapon = $statement->fetchObject('\\Weapon')) === false) {
            throw new \Exception('ID is not available in the database');
        }

        return $weapon;
    }

    public function getReservations(): array
    {
        $statement = $this->connection->query('SELECT reservations.*, weapons.name AS weapon_name, users.first_name AS user_name FROM reservations
                                                  LEFT JOIN users ON users.id = reservations.user_id
                                                  LEFT JOIN weapons ON weapons.id = reservations.weapon_id');

        $reservations = [];
        while (($row = $statement->fetch(PDO::FETCH_ASSOC)) !== false) {
            $reservation           = new Reservation();
            $reservation->id       = $row['id'];
            $reservation->stance  = $row['stance'];
            $reservation->date    = $row['date'];
            $reservation->time      = $row['time'];
            $reservation->lane   = $row['lane'];
            $user           = new User();
            $user->id       = $row['user_id'];
            $user->first_name = $row['user_name'];
            $reservation->user     = $user;
            $weapon = new Weapon();
            $weapon->name = $row['weapon_name'];
            $reservation->weapon = $weapon;
            $reservations[] = $reservation;
        }
        return $reservations;
    }

    public function getReservationById(int $id): Reservation
    {
        $statement = $this->connection->prepare('SELECT reservations.*, weapons.name AS weapon_name, users.first_name AS user_name, reservations.id AS reservation_id FROM reservations
                                                  LEFT JOIN users ON users.id = reservations.user_id
                                                  LEFT JOIN weapons ON weapons.id = reservations.weapon_id
                                                  WHERE reservations.id = :id');
        $statement->execute([
            ':id' => $id
        ]);

        $reservation = new Reservation();
        while (($row = $statement->fetch(PDO::FETCH_ASSOC)) !== false) {
            $reservation->id       = $row['reservation_id'];
            $reservation->stance  = $row['stance'];
            $reservation->date    = $row['date'];
            $reservation->time      = $row['time'];
            $reservation->lane   = $row['lane'];
            $user           = new User();
            $user->id       = $row['user_id'];
            $user->first_name = $row['user_name'];
            $reservation->user     = $user;
            $weapon = new Weapon();
            $weapon->name = $row['weapon_name'];
            $weapon->id = $row['weapon_id'];
            $reservation->weapon = $weapon;
        }
        return $reservation;
    }

    public function getReservationsByName(string $query, string $filter = null): array
    {
        if (isset($filter) && $filter != '') {
            $statement = $this->connection->prepare("SELECT reservations.*, weapons.name AS weapon_name, users.first_name AS user_name, reservations.id AS reservation_id FROM reservations
                                                  LEFT JOIN users ON users.id = reservations.user_id
                                                  LEFT JOIN weapons ON weapons.id = reservations.weapon_id
                                                  WHERE users.first_name LIKE :query ORDER BY $filter");
        } else {
            $statement = $this->connection->prepare("SELECT reservations.*, weapons.name AS weapon_name, users.first_name AS user_name, reservations.id AS reservation_id FROM reservations
                                                  LEFT JOIN users ON users.id = reservations.user_id
                                                  LEFT JOIN weapons ON weapons.id = reservations.weapon_id
                                                  WHERE users.first_name LIKE :query");
        }
        $statement->execute([
            ':query' => '%' . $query . '%'
        ]);

        $reservations = [];
        while (($row = $statement->fetch(PDO::FETCH_ASSOC)) !== false) {
            $reservation           = new Reservation();
            $reservation->id       = $row['id'];
            $reservation->stance  = $row['stance'];
            $reservation->date    = $row['date'];
            $reservation->time      = $row['time'];
            $reservation->lane   = $row['lane'];
            $user           = new User();
            $user->id       = $row['user_id'];
            $user->first_name = $row['user_name'];
            $reservation->user     = $user;
            $weapon = new Weapon();
            $weapon->name = $row['weapon_name'];
            $reservation->weapon = $weapon;
            $reservations[] = $reservation;
        }
        return $reservations;
    }




}
