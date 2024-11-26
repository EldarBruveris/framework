<?php

namespace app\Models;

class User{
    private int $id;
    private string $name;
    private string $email;
    private string $gender;
    private string $status;

    public function __construct(int $id, string $name, string $email, string $gender, string $status)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->gender = $gender;
        $this->status = $status;
    }

    public function __get(string $name): mixed {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }
        return null;
    }
}