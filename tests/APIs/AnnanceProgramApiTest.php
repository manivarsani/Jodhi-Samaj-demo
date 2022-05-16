<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\AnnanceProgram;

class AnnanceProgramApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_annance_program()
    {
        $annanceProgram = AnnanceProgram::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/annance_programs', $annanceProgram
        );

        $this->assertApiResponse($annanceProgram);
    }

    /**
     * @test
     */
    public function test_read_annance_program()
    {
        $annanceProgram = AnnanceProgram::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/annance_programs/'.$annanceProgram->id
        );

        $this->assertApiResponse($annanceProgram->toArray());
    }

    /**
     * @test
     */
    public function test_update_annance_program()
    {
        $annanceProgram = AnnanceProgram::factory()->create();
        $editedAnnanceProgram = AnnanceProgram::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/annance_programs/'.$annanceProgram->id,
            $editedAnnanceProgram
        );

        $this->assertApiResponse($editedAnnanceProgram);
    }

    /**
     * @test
     */
    public function test_delete_annance_program()
    {
        $annanceProgram = AnnanceProgram::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/annance_programs/'.$annanceProgram->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/annance_programs/'.$annanceProgram->id
        );

        $this->response->assertStatus(404);
    }
}
