<?php
namespace App\Repository;

use App\Models\User;
use App\Models\UserSave;
use PDO;

class UserRepository extends AbstractRepository{
    //TODO поиск одного пользователя по email/ID/гендер... 
    public function find($critery, $value){
        $query = "SELECT * FROM users WHERE {$critery} = {$value}";
        $statement = $this->connection->query($query);
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $user = new User($row['id'], $row['full_name'], $row['email'], $row['gender'], $row['status']);
        return $user;
    }

    //TODO выбрать всех из БД
    public function findAll(): array {
        $users = [];
        $query = "SELECT * FROM users ORDER BY id";
        $statement = $this->connection->query($query);
        while($row = $statement->fetch(PDO::FETCH_ASSOC)){
            $users[] = new User($row['id'], $row['email'], $row['full_name'], $row['gender'], $row['status']);
        }

        return $users;
    }

    //TODO сохранение одного пользователя
    public function save(UserSave $user): bool{
        $query = "INSERT INTO users (email, full_name, gender, status) VALUES(:email, :full_name, :gender, :status)";
        $statement = $this->connection->prepare($query);
        return $statement->execute([':email' => $user->email, ':full_name' => $user->name, ':gender' => $user->gender, ':status' => $user->status]);
    }

    public function edit(User $user): bool{
        $query = "UPDATE users SET full_name = :name, email = :email , gender = :gender, status = :status  WHERE id = {$user->id}";
        $statement = $this->connection->prepare($query);
        return $statement->execute([':name' => $user->name, ':email' => $user->email, ':gender' => $user->gender, ':status' => $user->status]);
    }

    public function delete($userID){
        $query = "DELETE FROM users WHERE id = {$userID}";
        $statement = $this->connection->exec($query);
        
    }
}