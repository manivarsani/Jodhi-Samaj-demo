<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatebusinessAdvotiseAPIRequest;
use App\Http\Requests\API\UpdatebusinessAdvotiseAPIRequest;
use App\Models\businessAdvotise;
use App\Repositories\businessAdvotiseRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class businessAdvotiseController
 * @package App\Http\Controllers\API
 */

class businessAdvotiseAPIController extends AppBaseController
{
    /** @var  businessAdvotiseRepository */
    private $businessAdvotiseRepository;

    public function __construct(businessAdvotiseRepository $businessAdvotiseRepo)
    {
        $this->businessAdvotiseRepository = $businessAdvotiseRepo;
    }

    /**
     * Display a listing of the businessAdvotise.
     * GET|HEAD /businessAdvotises
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $businessAdvotises = $this->businessAdvotiseRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($businessAdvotises->toArray(), 'Business Advotises retrieved successfully');
    }

    /**
     * Store a newly created businessAdvotise in storage.
     * POST /businessAdvotises
     *
     * @param CreatebusinessAdvotiseAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatebusinessAdvotiseAPIRequest $request)
    {
        $input = $request->all();

        $businessAdvotise = $this->businessAdvotiseRepository->create($input);

        return $this->sendResponse($businessAdvotise->toArray(), 'Business Advotise saved successfully');
    }

    /**
     * Display the specified businessAdvotise.
     * GET|HEAD /businessAdvotises/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var businessAdvotise $businessAdvotise */
        $businessAdvotise = $this->businessAdvotiseRepository->find($id);

        if (empty($businessAdvotise)) {
            return $this->sendError('Business Advotise not found');
        }

        return $this->sendResponse($businessAdvotise->toArray(), 'Business Advotise retrieved successfully');
    }

    /**
     * Update the specified businessAdvotise in storage.
     * PUT/PATCH /businessAdvotises/{id}
     *
     * @param int $id
     * @param UpdatebusinessAdvotiseAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatebusinessAdvotiseAPIRequest $request)
    {
        $input = $request->all();

        /** @var businessAdvotise $businessAdvotise */
        $businessAdvotise = $this->businessAdvotiseRepository->find($id);

        if (empty($businessAdvotise)) {
            return $this->sendError('Business Advotise not found');
        }

        $businessAdvotise = $this->businessAdvotiseRepository->update($input, $id);

        return $this->sendResponse($businessAdvotise->toArray(), 'businessAdvotise updated successfully');
    }

    /**
     * Remove the specified businessAdvotise from storage.
     * DELETE /businessAdvotises/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var businessAdvotise $businessAdvotise */
        $businessAdvotise = $this->businessAdvotiseRepository->find($id);

        if (empty($businessAdvotise)) {
            return $this->sendError('Business Advotise not found');
        }

        $businessAdvotise->delete();

        return $this->sendSuccess('Business Advotise deleted successfully');
    }
}
