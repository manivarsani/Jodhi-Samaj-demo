<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\FunctionPublish;

class FunctionPublishApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_function_publish()
    {
        $functionPublish = FunctionPublish::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/function_publishes', $functionPublish
        );

        $this->assertApiResponse($functionPublish);
    }

    /**
     * @test
     */
    public function test_read_function_publish()
    {
        $functionPublish = FunctionPublish::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/function_publishes/'.$functionPublish->id
        );

        $this->assertApiResponse($functionPublish->toArray());
    }

    /**
     * @test
     */
    public function test_update_function_publish()
    {
        $functionPublish = FunctionPublish::factory()->create();
        $editedFunctionPublish = FunctionPublish::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/function_publishes/'.$functionPublish->id,
            $editedFunctionPublish
        );

        $this->assertApiResponse($editedFunctionPublish);
    }

    /**
     * @test
     */
    public function test_delete_function_publish()
    {
        $functionPublish = FunctionPublish::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/function_publishes/'.$functionPublish->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/function_publishes/'.$functionPublish->id
        );

        $this->response->assertStatus(404);
    }
}
