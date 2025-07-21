<?php

namespace App\DTOs;

class UserDTO
{
    public function __construct(
        public readonly array $data
    ) {}

    public function getData(): array
    {
        return [
            'name' => $this->data['name'] ?? null,
            'email' => $this->data['email'] ?? null,
            'password' => isset($this->data['password']) ? bcrypt($this->data['password']) : null,
        ];
    }
}

