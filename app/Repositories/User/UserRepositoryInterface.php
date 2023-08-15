<?php
namespace App\Repositories\User;

interface UserRepositoryInterface
{
    public function listUsers();
    public function createUser(array $data);
    public function updateUser(array $data, string $id);
    public function deleteUser(string $id);
}
