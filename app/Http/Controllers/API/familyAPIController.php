<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatefamilyAPIRequest;
use App\Http\Requests\API\UpdatefamilyAPIRequest;
use App\Models\family;
use App\Repositories\familyRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class familyController
 * @package App\Http\Controllers\API
 */

class familyAPIController extends AppBaseController
{
    /** @var  familyRepository */
    private $familyRepository;

    public function __construct(familyRepository $familyRepo)
    {
        $this->familyRepository = $familyRepo;
    }

    /**
     * Display a listing of the family.
     * GET|HEAD /families
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $families = $this->familyRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($families->toArray(), 'Families retrieved successfully');
    }

    /**
     * Store a newly created family in storage.
     * POST /families
     *
     * @param CreatefamilyAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatefamilyAPIRequest $request)
    {
        $input = $request->all();

        $family = $this->familyRepository->create($input);

        return $this->sendResponse($family->toArray(), 'Family saved successfully');
    }

    /**
     * Display the specified family.
     * GET|HEAD /families/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var family $family */
        $family = $this->familyRepository->find($id);

        if (empty($family)) {
            return $this->sendError('Family not found');
        }

        return $this->sendResponse($family->toArray(), 'Family retrieved successfully');
    }

    /**
     * Update the specified family in storage.
     * PUT/PATCH /families/{id}
     *
     * @param int $id
     * @param UpdatefamilyAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatefamilyAPIRequest $request)
    {
        $input = $request->all();

        /** @var family $family */
        $family = $this->familyRepository->find($id);

        if (empty($family)) {
            return $this->sendError('Family not found');
        }

        $family = $this->familyRepository->update($input, $id);

        return $this->sendResponse($family->toArray(), 'family updated successfully');
    }

    /**
     * Remove the specified family from storage.
     * DELETE /families/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var family $family */
        $family = $this->familyRepository->find($id);

        if (empty($family)) {
            return $this->sendError('Family not found');
        }

        $family->delete();

        return $this->sendSuccess('Family deleted successfully');
    }
}
