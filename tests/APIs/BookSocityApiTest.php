<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\BookSocity;

class BookSocityApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_book_socity()
    {
        $bookSocity = BookSocity::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/book_socities', $bookSocity
        );

        $this->assertApiResponse($bookSocity);
    }

    /**
     * @test
     */
    public function test_read_book_socity()
    {
        $bookSocity = BookSocity::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/book_socities/'.$bookSocity->id
        );

        $this->assertApiResponse($bookSocity->toArray());
    }

    /**
     * @test
     */
    public function test_update_book_socity()
    {
        $bookSocity = BookSocity::factory()->create();
        $editedBookSocity = BookSocity::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/book_socities/'.$bookSocity->id,
            $editedBookSocity
        );

        $this->assertApiResponse($editedBookSocity);
    }

    /**
     * @test
     */
    public function test_delete_book_socity()
    {
        $bookSocity = BookSocity::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/book_socities/'.$bookSocity->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/book_socities/'.$bookSocity->id
        );

        $this->response->assertStatus(404);
    }
}
