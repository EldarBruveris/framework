<?php

namespace App\Models;

class UserSave{
    public string $name;
    public string $email;
    public string $gender;
    public string $status;

    public function __construct(string $name, string $email, string $gender, string $status)
    {
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
}