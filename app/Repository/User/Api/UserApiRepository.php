<?php
namespace App\Repository\User\Api;

use App\Models\User;
use App\Models\UserSave;
use App\Repository\AbstractApiRepository;
use App\Repository\User\UserRepositoryInterface;

class UserApiRepository extends AbstractApiRepository implements UserRepositoryInterface{

    public function show($id): User{

        $response = $this->client->request('GET', "users/{$id}");
        $body = $response->getBody()->getContents();
        $user = json_decode($body, true);
        $user =  new User($user['id'], $user['name'], $user['email'], $user['gender'], $user['status']);
        return $user;
    }

    public function create(UserSave $user): bool{
        $response = $this->client->request('POST', 'users',[
            'headers' => [
                'Authorization' => 'Bearer '. $this->TOKEN,
                'Content-Type' => 'application/json'
            ],
            'json' => $user
        ]);
        return $response->getStatusCode() === 201;
    }

    public function update(User $user): bool{
        //TODO check why doesn't work
        $parts = explode('/', $_SERVER['REQUEST_URI']);
        $response = $this->client->request('PUT', "users/{$user->id}",[
            'headers' => [
                'Authorization' => 'Bearer '. $this->TOKEN,
                'Content-Type' => 'application/json'
            ],
            'json' => $user
        ]);
        return $response->getStatusCode() === 200;

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
        return 30;


    }

    public function paginate(int $page, int $perPage = 10): array
    {
        if($page <=0 ) $page =1;

        $response = $this->client->request('GET', 'users', [
            'query' =>[
                'page' => $page,
                'per_page' => $perPage
            ]
        ]);
        $body = $response->getBody()->getContents();
        $users = json_decode($body, true);
        //TO DO странная пагинация
        return ['users' => $users,
                'pagination' => [
                    'page' => $page,
                    'totalPages' => $this->getMaxPages($perPage)
                    ],
                ];
    }
}