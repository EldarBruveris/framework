<?php
namespace App\Repository;

use App\Models\User;
use App\Models\UserSave;
use GuzzleHttp\Client;
use PDO;

class UserAPIRepository extends AbstractRepository{

    public function find($critery, $value){
        // $query = "SELECT * FROM users WHERE {$critery} = {$value}";
        // $statement = $this->connection->query($query);
        // $row = $statement->fetch(PDO::FETCH_ASSOC);
        // $user = new User($row['id'], $row['full_name'], $row['email'], $row['gender'], $row['status']);
        // return $user;

        
    }

    public function findAll(): array{
        // $users = [];
        // $query = "SELECT * FROM users ORDER BY id";
        // $statement = $this->connection->query($query);
        // while($row = $statement->fetch(PDO::FETCH_ASSOC)){
        //     $users[] = new User($row['id'], $row['email'], $row['full_name'], $row['gender'], $row['status']);
        // }

        // return $users;

        $response = $this->client->request('GET', 'users');
        $body = $response->getBody()->getContents();
        $users = json_decode($body, true);
        return $users;

    }

    public function save(UserSave $user): bool{
        // $query = "INSERT INTO users (email, full_name, gender, status) VALUES(:email, :full_name, :gender, :status)";
        // $statement = $this->connection->prepare($query);
        // return $statement->execute([':email' => $user->email, ':full_name' => $user->name, ':gender' => $user->gender, ':status' => $user->status]);

    }

    public function edit(User $user): bool{
        // $query = "UPDATE users SET full_name = :name, email = :email , gender = :gender, status = :status  WHERE id = {$user->id}";
        // $statement = $this->connection->prepare($query);
        // return $statement->execute([':name' => $user->name, ':email' => $user->email, ':gender' => $user->gender, ':status' => $user->status]);


    }

    public function delete($userID){
        // $query = "DELETE FROM users WHERE id = {$userID}";
        // $this->connection->exec($query);


        
    }

    public function getMaxPages($perPage = 10){
        // $query = "SELECT COUNT(*) FROM users";
        // $stmt = $this->connection->query($query);
        // $rowCount = $stmt->fetchColumn();
        // return ceil($rowCount/$perPage);
        $response = $this->client->request('GET', 'users');
        $body = $response->getBody()->getContents();
        $users = json_decode($body, true);
        return ceil(count($users)/$perPage);


    }

    public function getPaginatedData(int $page, int $perPage = 10): array
    {
        // $offset = ($page - 1) * $perPage;
        // $query = "SELECT * FROM users ORDER BY id LIMIT {$perPage} OFFSET {$offset}";
        // $statement = $this->connection->query($query);
        // while($row = $statement->fetch(PDO::FETCH_ASSOC)){
        //     $users[] = new User($row['id'], $row['email'], $row['full_name'], $row['gender'], $row['status']);
        // }
        // return $users;

        $response = $this->client->request('GET', 'users');
        $body = $response->getBody()->getContents();
        $users = json_decode($body, true);
        //TO DO странная пагинация
        $paginatedUsers = array_slice($users, $page==1 ? 0 : ($page-1)*$perPage, $perPage*$page);
        return $paginatedUsers;
    }
}