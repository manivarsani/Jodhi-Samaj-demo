<?php namespace Tests\Repositories;

use App\Models\Dashbord;
use App\Repositories\DashbordRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class DashbordRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var DashbordRepository
     */
    protected $dashbordRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->dashbordRepo = \App::make(DashbordRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_dashbord()
    {
        $dashbord = Dashbord::factory()->make()->toArray();

        $createdDashbord = $this->dashbordRepo->create($dashbord);

        $createdDashbord = $createdDashbord->toArray();
        $this->assertArrayHasKey('id', $createdDashbord);
        $this->assertNotNull($createdDashbord['id'], 'Created Dashbord must have id specified');
        $this->assertNotNull(Dashbord::find($createdDashbord['id']), 'Dashbord with given id must be in DB');
        $this->assertModelData($dashbord, $createdDashbord);
    }

    /**
     * @test read
     */
    public function test_read_dashbord()
    {
        $dashbord = Dashbord::factory()->create();

        $dbDashbord = $this->dashbordRepo->find($dashbord->id);

        $dbDashbord = $dbDashbord->toArray();
        $this->assertModelData($dashbord->toArray(), $dbDashbord);
    }

    /**
     * @test update
     */
    public function test_update_dashbord()
    {
        $dashbord = Dashbord::factory()->create();
        $fakeDashbord = Dashbord::factory()->make()->toArray();

        $updatedDashbord = $this->dashbordRepo->update($fakeDashbord, $dashbord->id);

        $this->assertModelData($fakeDashbord, $updatedDashbord->toArray());
        $dbDashbord = $this->dashbordRepo->find($dashbord->id);
        $this->assertModelData($fakeDashbord, $dbDashbord->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_dashbord()
    {
        $dashbord = Dashbord::factory()->create();

        $resp = $this->dashbordRepo->delete($dashbord->id);

        $this->assertTrue($resp);
        $this->assertNull(Dashbord::find($dashbord->id), 'Dashbord should not exist in DB');
    }
}
