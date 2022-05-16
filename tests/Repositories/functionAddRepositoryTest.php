<?php namespace Tests\Repositories;

use App\Models\functionAdd;
use App\Repositories\functionAddRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class functionAddRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var functionAddRepository
     */
    protected $functionAddRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->functionAddRepo = \App::make(functionAddRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_function_add()
    {
        $functionAdd = functionAdd::factory()->make()->toArray();

        $createdfunctionAdd = $this->functionAddRepo->create($functionAdd);

        $createdfunctionAdd = $createdfunctionAdd->toArray();
        $this->assertArrayHasKey('id', $createdfunctionAdd);
        $this->assertNotNull($createdfunctionAdd['id'], 'Created functionAdd must have id specified');
        $this->assertNotNull(functionAdd::find($createdfunctionAdd['id']), 'functionAdd with given id must be in DB');
        $this->assertModelData($functionAdd, $createdfunctionAdd);
    }

    /**
     * @test read
     */
    public function test_read_function_add()
    {
        $functionAdd = functionAdd::factory()->create();

        $dbfunctionAdd = $this->functionAddRepo->find($functionAdd->id);

        $dbfunctionAdd = $dbfunctionAdd->toArray();
        $this->assertModelData($functionAdd->toArray(), $dbfunctionAdd);
    }

    /**
     * @test update
     */
    public function test_update_function_add()
    {
        $functionAdd = functionAdd::factory()->create();
        $fakefunctionAdd = functionAdd::factory()->make()->toArray();

        $updatedfunctionAdd = $this->functionAddRepo->update($fakefunctionAdd, $functionAdd->id);

        $this->assertModelData($fakefunctionAdd, $updatedfunctionAdd->toArray());
        $dbfunctionAdd = $this->functionAddRepo->find($functionAdd->id);
        $this->assertModelData($fakefunctionAdd, $dbfunctionAdd->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_function_add()
    {
        $functionAdd = functionAdd::factory()->create();

        $resp = $this->functionAddRepo->delete($functionAdd->id);

        $this->assertTrue($resp);
        $this->assertNull(functionAdd::find($functionAdd->id), 'functionAdd should not exist in DB');
    }
}
