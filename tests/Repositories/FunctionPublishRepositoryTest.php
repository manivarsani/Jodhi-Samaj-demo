<?php namespace Tests\Repositories;

use App\Models\FunctionPublish;
use App\Repositories\FunctionPublishRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class FunctionPublishRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var FunctionPublishRepository
     */
    protected $functionPublishRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->functionPublishRepo = \App::make(FunctionPublishRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_function_publish()
    {
        $functionPublish = FunctionPublish::factory()->make()->toArray();

        $createdFunctionPublish = $this->functionPublishRepo->create($functionPublish);

        $createdFunctionPublish = $createdFunctionPublish->toArray();
        $this->assertArrayHasKey('id', $createdFunctionPublish);
        $this->assertNotNull($createdFunctionPublish['id'], 'Created FunctionPublish must have id specified');
        $this->assertNotNull(FunctionPublish::find($createdFunctionPublish['id']), 'FunctionPublish with given id must be in DB');
        $this->assertModelData($functionPublish, $createdFunctionPublish);
    }

    /**
     * @test read
     */
    public function test_read_function_publish()
    {
        $functionPublish = FunctionPublish::factory()->create();

        $dbFunctionPublish = $this->functionPublishRepo->find($functionPublish->id);

        $dbFunctionPublish = $dbFunctionPublish->toArray();
        $this->assertModelData($functionPublish->toArray(), $dbFunctionPublish);
    }

    /**
     * @test update
     */
    public function test_update_function_publish()
    {
        $functionPublish = FunctionPublish::factory()->create();
        $fakeFunctionPublish = FunctionPublish::factory()->make()->toArray();

        $updatedFunctionPublish = $this->functionPublishRepo->update($fakeFunctionPublish, $functionPublish->id);

        $this->assertModelData($fakeFunctionPublish, $updatedFunctionPublish->toArray());
        $dbFunctionPublish = $this->functionPublishRepo->find($functionPublish->id);
        $this->assertModelData($fakeFunctionPublish, $dbFunctionPublish->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_function_publish()
    {
        $functionPublish = FunctionPublish::factory()->create();

        $resp = $this->functionPublishRepo->delete($functionPublish->id);

        $this->assertTrue($resp);
        $this->assertNull(FunctionPublish::find($functionPublish->id), 'FunctionPublish should not exist in DB');
    }
}
