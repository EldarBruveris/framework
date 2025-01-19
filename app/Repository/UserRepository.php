<?php
namespace App\Repository;

use App\Models\User;
use App\Models\UserSave;
use PDO;

class UserRepository extends AbstractRepository{

    public function find($critery, $value){
        $query = "SELECT * FROM users WHERE {$critery} = {$value}";
        $statement = $this->connection->query($query);
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $user = new User($row['id'], $row['full_name'], $row['email'], $row['gender'], $row['status']);
        return $user;
    }

    public function findAll(): array {
        $users = [];
        $query = "SELECT * FROM users ORDER BY id";
        $statement = $this->connection->query($query);
        while($row = $statement->fetch(PDO::FETCH_ASSOC)){
            $users[] = new User($row['id'], $row['email'], $row['full_name'], $row['gender'], $row['status']);
        }

        return $users;
    }

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

    public function getPaginatedData(int $page = 1, int $perPage = 10): array
    {
        $offset = ($page - 1) * $perPage;

        $query = "SELECT * FROM users LIMIT :perPage OFFSET :offset";
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(':perPage', $perPage, \PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $totalQuery = "SELECT COUNT(*) as total FROM users";
        $stmt = $this->connection->query($totalQuery);
        $total = $stmt->fetch(\PDO::FETCH_ASSOC)['total'];

        return [
            'data' => $data,
            'total' => $total,
            'page' => $page,
            'perPage' => $perPage,
            'totalPages' => ceil($total / $perPage),
        ];
    }
}