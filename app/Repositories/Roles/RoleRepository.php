<?php
namespace App\Repositories\Roles;

use App\Models\Role;

class RoleRepository implements RoleRepositoryInterface
{
    public function listRoles()
    {
        return Role::latest()->get();
    }

    public function createRole(array $data)
    {
        return Role::create($data);
    }

    public function updateRole(array $data, string $id)
    {
        return Role::find($id)->update($data);
    }

    public function deleteRole(string $id)
    {
        return Role::find($id)->delete();
    }
}
