<?php
namespace App\Repositories\Roles;

interface RoleRepositoryInterface
{
    public function listRoles();
    public function createRole(array $data);
    public function updateRole(array $data, string $id);
    public function deleteRole(string $id);
}
