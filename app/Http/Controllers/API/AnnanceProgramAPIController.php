<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAnnanceProgramAPIRequest;
use App\Http\Requests\API\UpdateAnnanceProgramAPIRequest;
use App\Models\AnnanceProgram;
use App\Repositories\AnnanceProgramRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class AnnanceProgramController
 * @package App\Http\Controllers\API
 */

class AnnanceProgramAPIController extends AppBaseController
{
    /** @var  AnnanceProgramRepository */
    private $annanceProgramRepository;

    public function __construct(AnnanceProgramRepository $annanceProgramRepo)
    {
        $this->annanceProgramRepository = $annanceProgramRepo;
    }

    /**
     * Display a listing of the AnnanceProgram.
     * GET|HEAD /annancePrograms
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $annancePrograms = $this->annanceProgramRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($annancePrograms->toArray(), 'Annance Programs retrieved successfully');
    }

    /**
     * Store a newly created AnnanceProgram in storage.
     * POST /annancePrograms
     *
     * @param CreateAnnanceProgramAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAnnanceProgramAPIRequest $request)
    {
        $input = $request->all();

        $annanceProgram = $this->annanceProgramRepository->create($input);

        return $this->sendResponse($annanceProgram->toArray(), 'Annance Program saved successfully');
    }

    /**
     * Display the specified AnnanceProgram.
     * GET|HEAD /annancePrograms/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var AnnanceProgram $annanceProgram */
        $annanceProgram = $this->annanceProgramRepository->find($id);

        if (empty($annanceProgram)) {
            return $this->sendError('Annance Program not found');
        }

        return $this->sendResponse($annanceProgram->toArray(), 'Annance Program retrieved successfully');
    }

    /**
     * Update the specified AnnanceProgram in storage.
     * PUT/PATCH /annancePrograms/{id}
     *
     * @param int $id
     * @param UpdateAnnanceProgramAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAnnanceProgramAPIRequest $request)
    {
        $input = $request->all();

        /** @var AnnanceProgram $annanceProgram */
        $annanceProgram = $this->annanceProgramRepository->find($id);

        if (empty($annanceProgram)) {
            return $this->sendError('Annance Program not found');
        }

        $annanceProgram = $this->annanceProgramRepository->update($input, $id);

        return $this->sendResponse($annanceProgram->toArray(), 'AnnanceProgram updated successfully');
    }

    /**
     * Remove the specified AnnanceProgram from storage.
     * DELETE /annancePrograms/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var AnnanceProgram $annanceProgram */
        $annanceProgram = $this->annanceProgramRepository->find($id);

        if (empty($annanceProgram)) {
            return $this->sendError('Annance Program not found');
        }

        $annanceProgram->delete();

        return $this->sendSuccess('Annance Program deleted successfully');
    }
}
