<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\member;

class memberApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_member()
    {
        $member = member::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/members', $member
        );

        $this->assertApiResponse($member);
    }

    /**
     * @test
     */
    public function test_read_member()
    {
        $member = member::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/members/'.$member->id
        );

        $this->assertApiResponse($member->toArray());
    }

    /**
     * @test
     */
    public function test_update_member()
    {
        $member = member::factory()->create();
        $editedmember = member::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/members/'.$member->id,
            $editedmember
        );

        $this->assertApiResponse($editedmember);
    }

    /**
     * @test
     */
    public function test_delete_member()
    {
        $member = member::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/members/'.$member->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/members/'.$member->id
        );

        $this->response->assertStatus(404);
    }
}
