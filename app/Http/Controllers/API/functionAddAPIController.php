<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatefunctionAddAPIRequest;
use App\Http\Requests\API\UpdatefunctionAddAPIRequest;
use App\Models\functionAdd;
use App\Repositories\functionAddRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class functionAddController
 * @package App\Http\Controllers\API
 */

class functionAddAPIController extends AppBaseController
{
    /** @var  functionAddRepository */
    private $functionAddRepository;

    public function __construct(functionAddRepository $functionAddRepo)
    {
        $this->functionAddRepository = $functionAddRepo;
    }

    /**
     * Display a listing of the functionAdd.
     * GET|HEAD /functionAdds
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $functionAdds = $this->functionAddRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($functionAdds->toArray(), 'Function Adds retrieved successfully');
    }

    /**
     * Store a newly created functionAdd in storage.
     * POST /functionAdds
     *
     * @param CreatefunctionAddAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatefunctionAddAPIRequest $request)
    {
        $input = $request->all();

        $functionAdd = $this->functionAddRepository->create($input);

        return $this->sendResponse($functionAdd->toArray(), 'Function Add saved successfully');
    }

    /**
     * Display the specified functionAdd.
     * GET|HEAD /functionAdds/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var functionAdd $functionAdd */
        $functionAdd = $this->functionAddRepository->find($id);

        if (empty($functionAdd)) {
            return $this->sendError('Function Add not found');
        }

        return $this->sendResponse($functionAdd->toArray(), 'Function Add retrieved successfully');
    }

    /**
     * Update the specified functionAdd in storage.
     * PUT/PATCH /functionAdds/{id}
     *
     * @param int $id
     * @param UpdatefunctionAddAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatefunctionAddAPIRequest $request)
    {
        $input = $request->all();

        /** @var functionAdd $functionAdd */
        $functionAdd = $this->functionAddRepository->find($id);

        if (empty($functionAdd)) {
            return $this->sendError('Function Add not found');
        }

        $functionAdd = $this->functionAddRepository->update($input, $id);

        return $this->sendResponse($functionAdd->toArray(), 'functionAdd updated successfully');
    }

    /**
     * Remove the specified functionAdd from storage.
     * DELETE /functionAdds/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var functionAdd $functionAdd */
        $functionAdd = $this->functionAddRepository->find($id);

        if (empty($functionAdd)) {
            return $this->sendError('Function Add not found');
        }

        $functionAdd->delete();

        return $this->sendSuccess('Function Add deleted successfully');
    }
}
