<?php namespace Tests\Repositories;

use App\Models\MarraigeAnnounce;
use App\Repositories\MarraigeAnnounceRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MarraigeAnnounceRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MarraigeAnnounceRepository
     */
    protected $marraigeAnnounceRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->marraigeAnnounceRepo = \App::make(MarraigeAnnounceRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_marraige_announce()
    {
        $marraigeAnnounce = MarraigeAnnounce::factory()->make()->toArray();

        $createdMarraigeAnnounce = $this->marraigeAnnounceRepo->create($marraigeAnnounce);

        $createdMarraigeAnnounce = $createdMarraigeAnnounce->toArray();
        $this->assertArrayHasKey('id', $createdMarraigeAnnounce);
        $this->assertNotNull($createdMarraigeAnnounce['id'], 'Created MarraigeAnnounce must have id specified');
        $this->assertNotNull(MarraigeAnnounce::find($createdMarraigeAnnounce['id']), 'MarraigeAnnounce with given id must be in DB');
        $this->assertModelData($marraigeAnnounce, $createdMarraigeAnnounce);
    }

    /**
     * @test read
     */
    public function test_read_marraige_announce()
    {
        $marraigeAnnounce = MarraigeAnnounce::factory()->create();

        $dbMarraigeAnnounce = $this->marraigeAnnounceRepo->find($marraigeAnnounce->id);

        $dbMarraigeAnnounce = $dbMarraigeAnnounce->toArray();
        $this->assertModelData($marraigeAnnounce->toArray(), $dbMarraigeAnnounce);
    }

    /**
     * @test update
     */
    public function test_update_marraige_announce()
    {
        $marraigeAnnounce = MarraigeAnnounce::factory()->create();
        $fakeMarraigeAnnounce = MarraigeAnnounce::factory()->make()->toArray();

        $updatedMarraigeAnnounce = $this->marraigeAnnounceRepo->update($fakeMarraigeAnnounce, $marraigeAnnounce->id);

        $this->assertModelData($fakeMarraigeAnnounce, $updatedMarraigeAnnounce->toArray());
        $dbMarraigeAnnounce = $this->marraigeAnnounceRepo->find($marraigeAnnounce->id);
        $this->assertModelData($fakeMarraigeAnnounce, $dbMarraigeAnnounce->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_marraige_announce()
    {
        $marraigeAnnounce = MarraigeAnnounce::factory()->create();

        $resp = $this->marraigeAnnounceRepo->delete($marraigeAnnounce->id);

        $this->assertTrue($resp);
        $this->assertNull(MarraigeAnnounce::find($marraigeAnnounce->id), 'MarraigeAnnounce should not exist in DB');
    }
}
