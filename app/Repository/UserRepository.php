<?php
namespace app\Repository;

use app\Models\User;
use app\Models\UserSave;
use PDO;

class UserRepository extends AbstractRepository{
    //TODO поиск одного пользователя по email/ID/гендер... 
    public function find(array $critery = []){

    }

    //TODO выбрать всех из БД
    public function findAll(): array {
        $users = [];
        $query = "SELECT * FROM users";
        $statement = $this->connection->query($query);
        while($row = $statement->fetch(PDO::FETCH_ASSOC)){
            $users[] = new User($row['id'], $row['name'], $row['email'], $row['gender'], $row['status']);
        }

        return $users;
    }

    //TODO сохранение одного пользователя
    public function save(UserSave $user): bool{
        $query = "INSERT INTO users (name, email, gender, status) VALUES(:name, :email, :gender, :status)";
        $statement = $this->connection->prepare($query);
        return $statement->execute([':name' => $user->name, ':email' => $user->email, ':gender' => $user->gender, ':status' => $user->status]);
    }
}