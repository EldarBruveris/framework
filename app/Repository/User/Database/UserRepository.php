<?php
namespace App\Repository\User\Database;

use App\Models\User;
use App\Models\UserSave;
use App\Repository\AbstractRepository;
use App\Repository\User\UserRepositoryInterface;
use PDO;

class UserRepository extends AbstractRepository implements UserRepositoryInterface{

    public function show(int $id){
        $query = "SELECT * FROM users WHERE id = {$id}";
        $statement = $this->connection->query($query);
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $user = new User($row['id'], $row['full_name'], $row['email'], $row['gender'], $row['status']);
        return ['user' => $user];
    }

    public function create(UserSave $user): bool{
        $query = "INSERT INTO users (email, full_name, gender, status) VALUES(:email, :full_name, :gender, :status)";
        $statement = $this->connection->prepare($query);
        return $statement->execute([':email' => $user->email, ':full_name' => $user->name, ':gender' => $user->gender, ':status' => $user->status]);
    }

    public function update(User $user): bool{
        $query = "UPDATE users SET full_name = :name, email = :email , gender = :gender, status = :status  WHERE id = {$user->id}";
        $statement = $this->connection->prepare($query);
        return $statement->execute([':name' => $user->name, ':email' => $user->email, ':gender' => $user->gender, ':status' => $user->status]);
    }

    public function delete($id){
        $query = "DELETE FROM users WHERE id = {$id}";
        $this->connection->exec($query);
        
    }

    public function getMaxPages($perPage = 10){
        $query = "SELECT COUNT(*) FROM users";
        $stmt = $this->connection->query($query);
        $rowCount = $stmt->fetchColumn();
        return ceil($rowCount/$perPage);
    }

    public function paginate(int $page, int $perPage = 10): array
    {
        $offset = ($page - 1) * $perPage;

        $query = "SELECT * FROM users ORDER BY id LIMIT {$perPage} OFFSET {$offset}";
        $statement = $this->connection->query($query);
        while($row = $statement->fetch(PDO::FETCH_ASSOC)){
            $users[] = new User($row['id'], $row['email'], $row['full_name'], $row['gender'], $row['status']);
        }

        return ['users' => $users,
                'pagination' => [
                    'page' => $page,
                    'totalPages' => $this->getMaxPages($perPage)
                    ],
                ];
    }
}