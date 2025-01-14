<?php

namespace App\Models;

class UserSave{
    protected string $name;
    protected string $email;
    protected string $gender;
    protected string $status;

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