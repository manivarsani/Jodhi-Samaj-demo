<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Dashbord;

class DashbordApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_dashbord()
    {
        $dashbord = Dashbord::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/dashbords', $dashbord
        );

        $this->assertApiResponse($dashbord);
    }

    /**
     * @test
     */
    public function test_read_dashbord()
    {
        $dashbord = Dashbord::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/dashbords/'.$dashbord->id
        );

        $this->assertApiResponse($dashbord->toArray());
    }

    /**
     * @test
     */
    public function test_update_dashbord()
    {
        $dashbord = Dashbord::factory()->create();
        $editedDashbord = Dashbord::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/dashbords/'.$dashbord->id,
            $editedDashbord
        );

        $this->assertApiResponse($editedDashbord);
    }

    /**
     * @test
     */
    public function test_delete_dashbord()
    {
        $dashbord = Dashbord::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/dashbords/'.$dashbord->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/dashbords/'.$dashbord->id
        );

        $this->response->assertStatus(404);
    }
}
