<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\functionAdd;

class functionAddApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_function_add()
    {
        $functionAdd = functionAdd::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/function_adds', $functionAdd
        );

        $this->assertApiResponse($functionAdd);
    }

    /**
     * @test
     */
    public function test_read_function_add()
    {
        $functionAdd = functionAdd::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/function_adds/'.$functionAdd->id
        );

        $this->assertApiResponse($functionAdd->toArray());
    }

    /**
     * @test
     */
    public function test_update_function_add()
    {
        $functionAdd = functionAdd::factory()->create();
        $editedfunctionAdd = functionAdd::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/function_adds/'.$functionAdd->id,
            $editedfunctionAdd
        );

        $this->assertApiResponse($editedfunctionAdd);
    }

    /**
     * @test
     */
    public function test_delete_function_add()
    {
        $functionAdd = functionAdd::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/function_adds/'.$functionAdd->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/function_adds/'.$functionAdd->id
        );

        $this->response->assertStatus(404);
    }
}
