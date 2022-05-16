<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\MeetingSchedul;

class MeetingSchedulApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_meeting_schedul()
    {
        $meetingSchedul = MeetingSchedul::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/meeting_scheduls', $meetingSchedul
        );

        $this->assertApiResponse($meetingSchedul);
    }

    /**
     * @test
     */
    public function test_read_meeting_schedul()
    {
        $meetingSchedul = MeetingSchedul::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/meeting_scheduls/'.$meetingSchedul->id
        );

        $this->assertApiResponse($meetingSchedul->toArray());
    }

    /**
     * @test
     */
    public function test_update_meeting_schedul()
    {
        $meetingSchedul = MeetingSchedul::factory()->create();
        $editedMeetingSchedul = MeetingSchedul::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/meeting_scheduls/'.$meetingSchedul->id,
            $editedMeetingSchedul
        );

        $this->assertApiResponse($editedMeetingSchedul);
    }

    /**
     * @test
     */
    public function test_delete_meeting_schedul()
    {
        $meetingSchedul = MeetingSchedul::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/meeting_scheduls/'.$meetingSchedul->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/meeting_scheduls/'.$meetingSchedul->id
        );

        $this->response->assertStatus(404);
    }
}
