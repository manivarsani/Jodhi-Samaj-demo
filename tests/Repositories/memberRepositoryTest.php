<?php namespace Tests\Repositories;

use App\Models\member;
use App\Repositories\memberRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class memberRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var memberRepository
     */
    protected $memberRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->memberRepo = \App::make(memberRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_member()
    {
        $member = member::factory()->make()->toArray();

        $createdmember = $this->memberRepo->create($member);

        $createdmember = $createdmember->toArray();
        $this->assertArrayHasKey('id', $createdmember);
        $this->assertNotNull($createdmember['id'], 'Created member must have id specified');
        $this->assertNotNull(member::find($createdmember['id']), 'member with given id must be in DB');
        $this->assertModelData($member, $createdmember);
    }

    /**
     * @test read
     */
    public function test_read_member()
    {
        $member = member::factory()->create();

        $dbmember = $this->memberRepo->find($member->id);

        $dbmember = $dbmember->toArray();
        $this->assertModelData($member->toArray(), $dbmember);
    }

    /**
     * @test update
     */
    public function test_update_member()
    {
        $member = member::factory()->create();
        $fakemember = member::factory()->make()->toArray();

        $updatedmember = $this->memberRepo->update($fakemember, $member->id);

        $this->assertModelData($fakemember, $updatedmember->toArray());
        $dbmember = $this->memberRepo->find($member->id);
        $this->assertModelData($fakemember, $dbmember->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_member()
    {
        $member = member::factory()->create();

        $resp = $this->memberRepo->delete($member->id);

        $this->assertTrue($resp);
        $this->assertNull(member::find($member->id), 'member should not exist in DB');
    }
}
