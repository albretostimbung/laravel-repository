<?php

namespace App\Http\Controllers\API\V1\Users;

use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Repositories\User\UserRepository;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $result = $this->userRepository->listUsers();

        if ($result) {
            return ResponseFormatter::success(
                UserResource::collection($result),
                'Users retrieved successfully'
            );
        } else {
            return response()->json([
                'message' => 'Users retrieval failed',
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $result = $this->userRepository->createUser($request->validated());

        if ($result) {
            return response()->json([
                'message' => 'User created successfully',
            ], 201);
        } else {
            return response()->json([
                'message' => 'User creation failed',
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
        $result = $this->userRepository->updateUser($request->validated(), $id);

        if ($result) {
            return response()->json([
                'message' => 'User updated successfully',
            ], 200);
        } else {
            return response()->json([
                'message' => 'User update failed',
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = $this->userRepository->deleteUser($id);

        if ($result) {
            return response()->json([
                'message' => 'User deleted successfully',
            ], 200);
        } else {
            return response()->json([
                'message' => 'User deletion failed',
            ], 500);
        }
    }
}
