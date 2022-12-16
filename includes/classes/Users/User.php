<?php

class User
{
    public int $id;
    public string $first_name;
    public string $last_name;
    public string $knsa;
    public string $email;
    public string $phone;
    public string $password;
    public int $admin;

    public static function create(User $user, \PDO $db): bool
    {
        $query = 'INSERT INTO users (first_name, last_name, knsa, email, phone, password, admin)
                VALUES (:first_name, :last_name, :knsa, :email, :phone, :password, 0)';
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

    public function getByKNSA(string $knsa, \PDO $db): User
    {
        $statement = $db->prepare('SELECT * FROM users WHERE knsa = :knsa');
        $statement->execute([
            ':knsa' => $ksna
        ]);

        if (($user = $statement->fetchObject('\\User')) === false) {
            throw new \Exception('User KNSA-number is not available in the database');
        }

        return $user;
    }

}