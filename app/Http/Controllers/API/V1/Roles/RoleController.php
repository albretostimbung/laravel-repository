<?php

namespace App\Http\Controllers\API\V1\Roles;

use App\Http\Controllers\Controller;
use App\Http\Resources\RoleResource;
use App\Repositories\Roles\RoleRepository;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    private $roleRepository;

    public function __construct(RoleRepository $roleRepository) {
        $this->roleRepository = $roleRepository;
    }

    public function index()
    {
        $result = $this->roleRepository->listRoles();

        if ($result) {
            return response()->json([
                'message' => 'Roles retrieved successfully',
                'data' => RoleResource::collection($result),
            ], 200);
        } else {
            return response()->json([
                'message' => 'Roles retrieval failed',
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $result = $this->roleRepository->createRole($request->validated());

        if ($result) {
            return response()->json([
                'message' => 'Role created successfully',
            ], 201);
        } else {
            return response()->json([
                'message' => 'Role creation failed',
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $result = $this->roleRepository->updateRole($request->validated(), $id);

        if ($result) {
            return response()->json([
                'message' => 'Role updated successfully',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Role update failed',
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = $this->roleRepository->deleteRole($id);

        if ($result) {
            return response()->json([
                'message' => 'Role deleted successfully',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Role deletion failed',
            ], 500);
        }
    }
}
