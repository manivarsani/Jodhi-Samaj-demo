<?php namespace Tests\Repositories;

use App\Models\family;
use App\Repositories\familyRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class familyRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var familyRepository
     */
    protected $familyRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->familyRepo = \App::make(familyRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_family()
    {
        $family = family::factory()->make()->toArray();

        $createdfamily = $this->familyRepo->create($family);

        $createdfamily = $createdfamily->toArray();
        $this->assertArrayHasKey('id', $createdfamily);
        $this->assertNotNull($createdfamily['id'], 'Created family must have id specified');
        $this->assertNotNull(family::find($createdfamily['id']), 'family with given id must be in DB');
        $this->assertModelData($family, $createdfamily);
    }

    /**
     * @test read
     */
    public function test_read_family()
    {
        $family = family::factory()->create();

        $dbfamily = $this->familyRepo->find($family->id);

        $dbfamily = $dbfamily->toArray();
        $this->assertModelData($family->toArray(), $dbfamily);
    }

    /**
     * @test update
     */
    public function test_update_family()
    {
        $family = family::factory()->create();
        $fakefamily = family::factory()->make()->toArray();

        $updatedfamily = $this->familyRepo->update($fakefamily, $family->id);

        $this->assertModelData($fakefamily, $updatedfamily->toArray());
        $dbfamily = $this->familyRepo->find($family->id);
        $this->assertModelData($fakefamily, $dbfamily->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_family()
    {
        $family = family::factory()->create();

        $resp = $this->familyRepo->delete($family->id);

        $this->assertTrue($resp);
        $this->assertNull(family::find($family->id), 'family should not exist in DB');
    }
}
