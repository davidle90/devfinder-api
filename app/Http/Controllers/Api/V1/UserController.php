<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Filters\V1\UserFilter;
use App\Http\Resources\V1\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends ApiController
{
    public function index(UserFilter $filters)
    {
        return UserResource::collection(
            User::filter($filters)->paginate()
        );
    }

    public function show(User $user)
    {
        if($this->include('projects')){
            return new UserResource($user->load('projects'));
        }

        return new UserResource($user);
    }
}
