<?php namespace Tests\Repositories;

use App\Models\MeetingSchedul;
use App\Repositories\MeetingSchedulRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MeetingSchedulRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MeetingSchedulRepository
     */
    protected $meetingSchedulRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->meetingSchedulRepo = \App::make(MeetingSchedulRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_meeting_schedul()
    {
        $meetingSchedul = MeetingSchedul::factory()->make()->toArray();

        $createdMeetingSchedul = $this->meetingSchedulRepo->create($meetingSchedul);

        $createdMeetingSchedul = $createdMeetingSchedul->toArray();
        $this->assertArrayHasKey('id', $createdMeetingSchedul);
        $this->assertNotNull($createdMeetingSchedul['id'], 'Created MeetingSchedul must have id specified');
        $this->assertNotNull(MeetingSchedul::find($createdMeetingSchedul['id']), 'MeetingSchedul with given id must be in DB');
        $this->assertModelData($meetingSchedul, $createdMeetingSchedul);
    }

    /**
     * @test read
     */
    public function test_read_meeting_schedul()
    {
        $meetingSchedul = MeetingSchedul::factory()->create();

        $dbMeetingSchedul = $this->meetingSchedulRepo->find($meetingSchedul->id);

        $dbMeetingSchedul = $dbMeetingSchedul->toArray();
        $this->assertModelData($meetingSchedul->toArray(), $dbMeetingSchedul);
    }

    /**
     * @test update
     */
    public function test_update_meeting_schedul()
    {
        $meetingSchedul = MeetingSchedul::factory()->create();
        $fakeMeetingSchedul = MeetingSchedul::factory()->make()->toArray();

        $updatedMeetingSchedul = $this->meetingSchedulRepo->update($fakeMeetingSchedul, $meetingSchedul->id);

        $this->assertModelData($fakeMeetingSchedul, $updatedMeetingSchedul->toArray());
        $dbMeetingSchedul = $this->meetingSchedulRepo->find($meetingSchedul->id);
        $this->assertModelData($fakeMeetingSchedul, $dbMeetingSchedul->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_meeting_schedul()
    {
        $meetingSchedul = MeetingSchedul::factory()->create();

        $resp = $this->meetingSchedulRepo->delete($meetingSchedul->id);

        $this->assertTrue($resp);
        $this->assertNull(MeetingSchedul::find($meetingSchedul->id), 'MeetingSchedul should not exist in DB');
    }
}
