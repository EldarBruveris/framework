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
        $response = $this->client->request('POST', 'users',[
            'headers' => [
                'Authorization' => 'Bearer '. $this->TOKEN,
                'Content-Type' => 'application/json'
            ],
            'json' => $user
        ]);
        if($response) return true;
        else return false;
    }

    public function update(User $user, int $id): bool{
        //TODO check why doesn't work
        $parts = explode('/', $_SERVER['REQUEST_URI']);
        $id = end($parts);
        $response = $this->client->request('PUT', "users/{$id}",[
            'headers' => [
                'Authorization' => 'Bearer '. $this->TOKEN,
                'Content-Type' => 'application/json'
            ],
            'json' => $user
        ]);
        if($response) return true;
        else return false;

    }

    public function delete($id){
        $response = $this->client->request('DELETE', "users/{$id}", [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->TOKEN,
            ],
        ]);

    }

    public function getMaxPages($perPage = 10){
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