<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\MarraigeAnnounce;

class MarraigeAnnounceApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_marraige_announce()
    {
        $marraigeAnnounce = MarraigeAnnounce::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/marraige_announces', $marraigeAnnounce
        );

        $this->assertApiResponse($marraigeAnnounce);
    }

    /**
     * @test
     */
    public function test_read_marraige_announce()
    {
        $marraigeAnnounce = MarraigeAnnounce::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/marraige_announces/'.$marraigeAnnounce->id
        );

        $this->assertApiResponse($marraigeAnnounce->toArray());
    }

    /**
     * @test
     */
    public function test_update_marraige_announce()
    {
        $marraigeAnnounce = MarraigeAnnounce::factory()->create();
        $editedMarraigeAnnounce = MarraigeAnnounce::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/marraige_announces/'.$marraigeAnnounce->id,
            $editedMarraigeAnnounce
        );

        $this->assertApiResponse($editedMarraigeAnnounce);
    }

    /**
     * @test
     */
    public function test_delete_marraige_announce()
    {
        $marraigeAnnounce = MarraigeAnnounce::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/marraige_announces/'.$marraigeAnnounce->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/marraige_announces/'.$marraigeAnnounce->id
        );

        $this->response->assertStatus(404);
    }
}
