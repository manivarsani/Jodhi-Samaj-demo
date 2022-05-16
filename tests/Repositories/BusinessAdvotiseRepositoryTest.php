<?php namespace Tests\Repositories;

use App\Models\businessAdvotise;
use App\Repositories\businessAdvotiseRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class businessAdvotiseRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var businessAdvotiseRepository
     */
    protected $businessAdvotiseRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->businessAdvotiseRepo = \App::make(businessAdvotiseRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_business_advotise()
    {
        $businessAdvotise = businessAdvotise::factory()->make()->toArray();

        $createdbusinessAdvotise = $this->businessAdvotiseRepo->create($businessAdvotise);

        $createdbusinessAdvotise = $createdbusinessAdvotise->toArray();
        $this->assertArrayHasKey('id', $createdbusinessAdvotise);
        $this->assertNotNull($createdbusinessAdvotise['id'], 'Created businessAdvotise must have id specified');
        $this->assertNotNull(businessAdvotise::find($createdbusinessAdvotise['id']), 'businessAdvotise with given id must be in DB');
        $this->assertModelData($businessAdvotise, $createdbusinessAdvotise);
    }

    /**
     * @test read
     */
    public function test_read_business_advotise()
    {
        $businessAdvotise = businessAdvotise::factory()->create();

        $dbbusinessAdvotise = $this->businessAdvotiseRepo->find($businessAdvotise->id);

        $dbbusinessAdvotise = $dbbusinessAdvotise->toArray();
        $this->assertModelData($businessAdvotise->toArray(), $dbbusinessAdvotise);
    }

    /**
     * @test update
     */
    public function test_update_business_advotise()
    {
        $businessAdvotise = businessAdvotise::factory()->create();
        $fakebusinessAdvotise = businessAdvotise::factory()->make()->toArray();

        $updatedbusinessAdvotise = $this->businessAdvotiseRepo->update($fakebusinessAdvotise, $businessAdvotise->id);

        $this->assertModelData($fakebusinessAdvotise, $updatedbusinessAdvotise->toArray());
        $dbbusinessAdvotise = $this->businessAdvotiseRepo->find($businessAdvotise->id);
        $this->assertModelData($fakebusinessAdvotise, $dbbusinessAdvotise->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_business_advotise()
    {
        $businessAdvotise = businessAdvotise::factory()->create();

        $resp = $this->businessAdvotiseRepo->delete($businessAdvotise->id);

        $this->assertTrue($resp);
        $this->assertNull(businessAdvotise::find($businessAdvotise->id), 'businessAdvotise should not exist in DB');
    }
}
