<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\businessAdvotise;

class businessAdvotiseApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_business_advotise()
    {
        $businessAdvotise = businessAdvotise::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/business_advotises', $businessAdvotise
        );

        $this->assertApiResponse($businessAdvotise);
    }

    /**
     * @test
     */
    public function test_read_business_advotise()
    {
        $businessAdvotise = businessAdvotise::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/business_advotises/'.$businessAdvotise->id
        );

        $this->assertApiResponse($businessAdvotise->toArray());
    }

    /**
     * @test
     */
    public function test_update_business_advotise()
    {
        $businessAdvotise = businessAdvotise::factory()->create();
        $editedbusinessAdvotise = businessAdvotise::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/business_advotises/'.$businessAdvotise->id,
            $editedbusinessAdvotise
        );

        $this->assertApiResponse($editedbusinessAdvotise);
    }

    /**
     * @test
     */
    public function test_delete_business_advotise()
    {
        $businessAdvotise = businessAdvotise::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/business_advotises/'.$businessAdvotise->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/business_advotises/'.$businessAdvotise->id
        );

        $this->response->assertStatus(404);
    }
}
