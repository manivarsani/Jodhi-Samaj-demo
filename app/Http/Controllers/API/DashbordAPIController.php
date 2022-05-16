<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDashbordAPIRequest;
use App\Http\Requests\API\UpdateDashbordAPIRequest;
use App\Models\Dashbord;
use App\Repositories\DashbordRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class DashbordController
 * @package App\Http\Controllers\API
 */

class DashbordAPIController extends AppBaseController
{
    /** @var  DashbordRepository */
    private $dashbordRepository;

    public function __construct(DashbordRepository $dashbordRepo)
    {
        $this->dashbordRepository = $dashbordRepo;
    }

    /**
     * Display a listing of the Dashbord.
     * GET|HEAD /dashbords
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $dashbords = $this->dashbordRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($dashbords->toArray(), 'Dashbords retrieved successfully');
    }

    /**
     * Store a newly created Dashbord in storage.
     * POST /dashbords
     *
     * @param CreateDashbordAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDashbordAPIRequest $request)
    {
        $input = $request->all();

        $dashbord = $this->dashbordRepository->create($input);

        return $this->sendResponse($dashbord->toArray(), 'Dashbord saved successfully');
    }

    /**
     * Display the specified Dashbord.
     * GET|HEAD /dashbords/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Dashbord $dashbord */
        $dashbord = $this->dashbordRepository->find($id);

        if (empty($dashbord)) {
            return $this->sendError('Dashbord not found');
        }

        return $this->sendResponse($dashbord->toArray(), 'Dashbord retrieved successfully');
    }

    /**
     * Update the specified Dashbord in storage.
     * PUT/PATCH /dashbords/{id}
     *
     * @param int $id
     * @param UpdateDashbordAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDashbordAPIRequest $request)
    {
        $input = $request->all();

        /** @var Dashbord $dashbord */
        $dashbord = $this->dashbordRepository->find($id);

        if (empty($dashbord)) {
            return $this->sendError('Dashbord not found');
        }

        $dashbord = $this->dashbordRepository->update($input, $id);

        return $this->sendResponse($dashbord->toArray(), 'Dashbord updated successfully');
    }

    /**
     * Remove the specified Dashbord from storage.
     * DELETE /dashbords/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Dashbord $dashbord */
        $dashbord = $this->dashbordRepository->find($id);

        if (empty($dashbord)) {
            return $this->sendError('Dashbord not found');
        }

        $dashbord->delete();

        return $this->sendSuccess('Dashbord deleted successfully');
    }
}
