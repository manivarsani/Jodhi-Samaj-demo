<?php namespace Tests\Repositories;

use App\Models\BookSocity;
use App\Repositories\BookSocityRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BookSocityRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BookSocityRepository
     */
    protected $bookSocityRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->bookSocityRepo = \App::make(BookSocityRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_book_socity()
    {
        $bookSocity = BookSocity::factory()->make()->toArray();

        $createdBookSocity = $this->bookSocityRepo->create($bookSocity);

        $createdBookSocity = $createdBookSocity->toArray();
        $this->assertArrayHasKey('id', $createdBookSocity);
        $this->assertNotNull($createdBookSocity['id'], 'Created BookSocity must have id specified');
        $this->assertNotNull(BookSocity::find($createdBookSocity['id']), 'BookSocity with given id must be in DB');
        $this->assertModelData($bookSocity, $createdBookSocity);
    }

    /**
     * @test read
     */
    public function test_read_book_socity()
    {
        $bookSocity = BookSocity::factory()->create();

        $dbBookSocity = $this->bookSocityRepo->find($bookSocity->id);

        $dbBookSocity = $dbBookSocity->toArray();
        $this->assertModelData($bookSocity->toArray(), $dbBookSocity);
    }

    /**
     * @test update
     */
    public function test_update_book_socity()
    {
        $bookSocity = BookSocity::factory()->create();
        $fakeBookSocity = BookSocity::factory()->make()->toArray();

        $updatedBookSocity = $this->bookSocityRepo->update($fakeBookSocity, $bookSocity->id);

        $this->assertModelData($fakeBookSocity, $updatedBookSocity->toArray());
        $dbBookSocity = $this->bookSocityRepo->find($bookSocity->id);
        $this->assertModelData($fakeBookSocity, $dbBookSocity->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_book_socity()
    {
        $bookSocity = BookSocity::factory()->create();

        $resp = $this->bookSocityRepo->delete($bookSocity->id);

        $this->assertTrue($resp);
        $this->assertNull(BookSocity::find($bookSocity->id), 'BookSocity should not exist in DB');
    }
}
