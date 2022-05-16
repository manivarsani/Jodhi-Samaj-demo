<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFunctionPublishAPIRequest;
use App\Http\Requests\API\UpdateFunctionPublishAPIRequest;
use App\Models\FunctionPublish;
use App\Repositories\FunctionPublishRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class FunctionPublishController
 * @package App\Http\Controllers\API
 */

class FunctionPublishAPIController extends AppBaseController
{
    /** @var  FunctionPublishRepository */
    private $functionPublishRepository;

    public function __construct(FunctionPublishRepository $functionPublishRepo)
    {
        $this->functionPublishRepository = $functionPublishRepo;
    }

    /**
     * Display a listing of the FunctionPublish.
     * GET|HEAD /functionPublishes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $functionPublishes = $this->functionPublishRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($functionPublishes->toArray(), 'Function Publishes retrieved successfully');
    }

    /**
     * Store a newly created FunctionPublish in storage.
     * POST /functionPublishes
     *
     * @param CreateFunctionPublishAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateFunctionPublishAPIRequest $request)
    {
        $input = $request->all();

        $functionPublish = $this->functionPublishRepository->create($input);

        return $this->sendResponse($functionPublish->toArray(), 'Function Publish saved successfully');
    }

    /**
     * Display the specified FunctionPublish.
     * GET|HEAD /functionPublishes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var FunctionPublish $functionPublish */
        $functionPublish = $this->functionPublishRepository->find($id);

        if (empty($functionPublish)) {
            return $this->sendError('Function Publish not found');
        }

        return $this->sendResponse($functionPublish->toArray(), 'Function Publish retrieved successfully');
    }

    /**
     * Update the specified FunctionPublish in storage.
     * PUT/PATCH /functionPublishes/{id}
     *
     * @param int $id
     * @param UpdateFunctionPublishAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFunctionPublishAPIRequest $request)
    {
        $input = $request->all();

        /** @var FunctionPublish $functionPublish */
        $functionPublish = $this->functionPublishRepository->find($id);

        if (empty($functionPublish)) {
            return $this->sendError('Function Publish not found');
        }

        $functionPublish = $this->functionPublishRepository->update($input, $id);

        return $this->sendResponse($functionPublish->toArray(), 'FunctionPublish updated successfully');
    }

    /**
     * Remove the specified FunctionPublish from storage.
     * DELETE /functionPublishes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var FunctionPublish $functionPublish */
        $functionPublish = $this->functionPublishRepository->find($id);

        if (empty($functionPublish)) {
            return $this->sendError('Function Publish not found');
        }

        $functionPublish->delete();

        return $this->sendSuccess('Function Publish deleted successfully');
    }
}
