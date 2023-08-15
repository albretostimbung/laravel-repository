<?php
namespace App\Repositories\User;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function listUsers()
    {
        return User::latest()->get();
    }

    public function createUser(array $data)
    {
        return User::create($data);
    }

    public function updateUser(array $data, string $id)
    {
        return User::find($id)->update($data);
    }

    public function deleteUser(string $id)
    {
        return User::find($id)->delete();
    }
}
