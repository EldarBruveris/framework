<?php

namespace App\Models;

class User extends UserSave{
    private int $id;
    public function __construct(int $id, string $name, string $email, string $gender, string $status)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->gender = $gender;
        $this->status = $status;
    }

    public function __get(string $name): mixed {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
        return null;
    }

    public function __set(string $name, $value){
        $this->$name = $value;
    }
}