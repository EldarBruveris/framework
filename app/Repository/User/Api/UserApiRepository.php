<?php
namespace App\Repository\User\Api;

use App\Models\User;
use App\Models\UserSave;
use App\Repository\AbstractApiRepository;
use App\Repository\User\UserRepositoryInterface;

class UserApiRepository extends AbstractApiRepository implements UserRepositoryInterface{

    public function show($id){

        $response = $this->client->request('GET', 'users');
        $body = $response->getBody()->getContents();
        $users = json_decode($body, true);
        $foundUser = null;
        foreach($users as $user){
            if($user["id"]==$id){
                $foundUser = $user;
                break;
            }
        }
        return ['user' => $foundUser];
    }

    public function create(UserSave $user): bool{
        // $query = "INSERT INTO users (email, full_name, gender, status) VALUES(:email, :full_name, :gender, :status)";
        // $statement = $this->connection->prepare($query);
        // return $statement->execute([':email' => $user->email, ':full_name' => $user->name, ':gender' => $user->gender, ':status' => $user->status]);
        $response = $this->client->request('POST', 'users');
        return true;



    }

    public function update(User $user): bool{
        // $query = "UPDATE users SET full_name = :name, email = :email , gender = :gender, status = :status  WHERE id = {$user->id}";
        // $statement = $this->connection->prepare($query);
        // return $statement->execute([':name' => $user->name, ':email' => $user->email, ':gender' => $user->gender, ':status' => $user->status]);
        return true;

    }

    public function delete($id){
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

    public function paginate(int $page, int $perPage = 10): array
    {
        

        $response = $this->client->request('GET', 'users');
        $body = $response->getBody()->getContents();
        $users = json_decode($body, true);
        //TO DO странная пагинация
        $paginatedUsers = array_slice($users, $page==1 ? 0 : ($page-1)*$perPage, $perPage*$page);
        return ['users' => $paginatedUsers,
                'pagination' => [
                    'page' => $page,
                    'totalPages' => $this->getMaxPages($perPage)
                    ],
                ];
    }
}