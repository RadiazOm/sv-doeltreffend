<?php

class Users
{
    public string $name = 'users list';
    private array $users = [];

    /**
     * @return Form[]
     */
    public function getUsers(): array
    {
        return $this->users;
    }

    /**
     * Retrieve raw array value & pass to Student object
     *
     * @param User[] $users
     * @throws \Exception
     */
    public function setUsers(array $users): void
    {
        $this->users = $users;
    }

    /**
     * @return int
     */
    public function getTotalUsers(): int
    {
        return count($this->users);
    }
}