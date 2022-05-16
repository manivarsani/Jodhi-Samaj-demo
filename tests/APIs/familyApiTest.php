<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\family;

class familyApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_family()
    {
        $family = family::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/families', $family
        );

        $this->assertApiResponse($family);
    }

    /**
     * @test
     */
    public function test_read_family()
    {
        $family = family::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/families/'.$family->id
        );

        $this->assertApiResponse($family->toArray());
    }

    /**
     * @test
     */
    public function test_update_family()
    {
        $family = family::factory()->create();
        $editedfamily = family::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/families/'.$family->id,
            $editedfamily
        );

        $this->assertApiResponse($editedfamily);
    }

    /**
     * @test
     */
    public function test_delete_family()
    {
        $family = family::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/families/'.$family->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/families/'.$family->id
        );

        $this->response->assertStatus(404);
    }
}
