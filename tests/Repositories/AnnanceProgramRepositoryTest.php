<?php namespace Tests\Repositories;

use App\Models\AnnanceProgram;
use App\Repositories\AnnanceProgramRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class AnnanceProgramRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var AnnanceProgramRepository
     */
    protected $annanceProgramRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->annanceProgramRepo = \App::make(AnnanceProgramRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_annance_program()
    {
        $annanceProgram = AnnanceProgram::factory()->make()->toArray();

        $createdAnnanceProgram = $this->annanceProgramRepo->create($annanceProgram);

        $createdAnnanceProgram = $createdAnnanceProgram->toArray();
        $this->assertArrayHasKey('id', $createdAnnanceProgram);
        $this->assertNotNull($createdAnnanceProgram['id'], 'Created AnnanceProgram must have id specified');
        $this->assertNotNull(AnnanceProgram::find($createdAnnanceProgram['id']), 'AnnanceProgram with given id must be in DB');
        $this->assertModelData($annanceProgram, $createdAnnanceProgram);
    }

    /**
     * @test read
     */
    public function test_read_annance_program()
    {
        $annanceProgram = AnnanceProgram::factory()->create();

        $dbAnnanceProgram = $this->annanceProgramRepo->find($annanceProgram->id);

        $dbAnnanceProgram = $dbAnnanceProgram->toArray();
        $this->assertModelData($annanceProgram->toArray(), $dbAnnanceProgram);
    }

    /**
     * @test update
     */
    public function test_update_annance_program()
    {
        $annanceProgram = AnnanceProgram::factory()->create();
        $fakeAnnanceProgram = AnnanceProgram::factory()->make()->toArray();

        $updatedAnnanceProgram = $this->annanceProgramRepo->update($fakeAnnanceProgram, $annanceProgram->id);

        $this->assertModelData($fakeAnnanceProgram, $updatedAnnanceProgram->toArray());
        $dbAnnanceProgram = $this->annanceProgramRepo->find($annanceProgram->id);
        $this->assertModelData($fakeAnnanceProgram, $dbAnnanceProgram->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_annance_program()
    {
        $annanceProgram = AnnanceProgram::factory()->create();

        $resp = $this->annanceProgramRepo->delete($annanceProgram->id);

        $this->assertTrue($resp);
        $this->assertNull(AnnanceProgram::find($annanceProgram->id), 'AnnanceProgram should not exist in DB');
    }
}
