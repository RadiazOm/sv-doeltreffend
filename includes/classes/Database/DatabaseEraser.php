<?php

class DatabaseEraser extends Database
{
    /**
     * Save a album to the database
     *
     * @param $id
     * @return bool
     */
    public function deleteFormById(int $id): bool
    {
        $query = 'DELETE FROM forms
                  WHERE id = :id';
        $statement = $this->connection->prepare($query);
        return $statement->execute([':id' => $id]);
    }
}