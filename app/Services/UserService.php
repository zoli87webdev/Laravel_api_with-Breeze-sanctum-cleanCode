<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\DTOs\UserDTO;

class UserService
{
    public function __construct(protected UserRepository $repository) {}

    public function getAll()
    {
        return $this->repository->all();
    }

    public function getById($id)
    {
        return $this->repository->find($id);
    }

    public function create(UserDTO $dto)
    {
        return $this->repository->create($dto->getData());
    }

    public function update($id, UserDTO $dto)
    {
        return $this->repository->update($id, $dto->getData());
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}
