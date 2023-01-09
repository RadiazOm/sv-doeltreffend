<?php

class User
{
    public int $id;
    public ?string $first_name = null;
    public ?string $last_name = null;
    public string $knsa;
    public ?string $email = null;
    public ?string $phone = null;
    public ?string $password = null;
    public ?int $admin = 0;

    public static function create(User $user, \PDO $db): bool
    {
        $query = "UPDATE users
                    SET first_name = :first_name, last_name = :last_name, email = :email, phone = :phone, password = :password
                    WHERE knsa = :knsa";
        $statement =$db->prepare($query);
        return $statement->execute([
            ':first_name' => $user->first_name,
            ':last_name' => $user->last_name,
            ':knsa' => $user->knsa,
            ':email' => $user->email,
            ':phone' => $user->phone,
            ':password' => $user->password
        ]);
    }

    public static function getByKNSA(string $knsa, \PDO $db): User
    {
        $statement = $db->prepare('SELECT * FROM users WHERE knsa = :knsa');
        $statement->execute([
            ':knsa' => $knsa
        ]);

        if (($user = $statement->fetchObject('\\User')) === false) {
            throw new \Exception('User KNSA-number is not available in the database');
        }

        return $user;
    }

}