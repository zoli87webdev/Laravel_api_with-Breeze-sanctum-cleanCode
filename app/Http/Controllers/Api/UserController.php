<?php

namespace App\Http\Controllers\Api;

use App\DTOs\UserDTO;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;



class UserController extends Controller
{

    public function __construct(protected UserService $userService)
    {}

    public function index()
    {
        return UserResource::collection($this->userService->getAll());
    }

    public function show($id): UserResource
    {
        return new UserResource($this->userService->getById($id));
    }

    public function store(StoreUserRequest $request): UserResource
    {
        $dto = new UserDTO(
            $request->validated()
        );

        $user = $this->userService->create($dto);
        return new UserResource($user);
    }

    public function update(UpdateUserRequest $request, $id): UserResource
    {
        $dto = new UserDTO($request->validated());
        $user = $this->userService->update($id, $dto);
        return new UserResource($user);

    }

    public function destroy($id)
    {
        $this->userService->delete($id);
        return response()->json(["message"=> "User deleted"]);
    }
}
