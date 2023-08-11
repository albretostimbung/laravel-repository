<?php

namespace Tests\Feature\Roles;

use Tests\TestCase;
use App\Models\Role;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_return_list_of_roles_correctly(): void
    {
        Role::factory()->count(3)->create();

        $response = $this->get('/api/v1/roles');
        $response->assertStatus(200)
        ->assertJsonCount(3, 'data')
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'title',
                ],
            ],
        ]);
    }
}
