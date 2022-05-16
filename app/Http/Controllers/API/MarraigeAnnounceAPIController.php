<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMarraigeAnnounceAPIRequest;
use App\Http\Requests\API\UpdateMarraigeAnnounceAPIRequest;
use App\Models\MarraigeAnnounce;
use App\Repositories\MarraigeAnnounceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MarraigeAnnounceController
 * @package App\Http\Controllers\API
 */

class MarraigeAnnounceAPIController extends AppBaseController
{
    /** @var  MarraigeAnnounceRepository */
    private $marraigeAnnounceRepository;

    public function __construct(MarraigeAnnounceRepository $marraigeAnnounceRepo)
    {
        $this->marraigeAnnounceRepository = $marraigeAnnounceRepo;
    }

    /**
     * Display a listing of the MarraigeAnnounce.
     * GET|HEAD /marraigeAnnounces
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $marraigeAnnounces = $this->marraigeAnnounceRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($marraigeAnnounces->toArray(), 'Marraige Announces retrieved successfully');
    }

    /**
     * Store a newly created MarraigeAnnounce in storage.
     * POST /marraigeAnnounces
     *
     * @param CreateMarraigeAnnounceAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMarraigeAnnounceAPIRequest $request)
    {
        $input = $request->all();

        $marraigeAnnounce = $this->marraigeAnnounceRepository->create($input);

        return $this->sendResponse($marraigeAnnounce->toArray(), 'Marraige Announce saved successfully');
    }

    /**
     * Display the specified MarraigeAnnounce.
     * GET|HEAD /marraigeAnnounces/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var MarraigeAnnounce $marraigeAnnounce */
        $marraigeAnnounce = $this->marraigeAnnounceRepository->find($id);

        if (empty($marraigeAnnounce)) {
            return $this->sendError('Marraige Announce not found');
        }

        return $this->sendResponse($marraigeAnnounce->toArray(), 'Marraige Announce retrieved successfully');
    }

    /**
     * Update the specified MarraigeAnnounce in storage.
     * PUT/PATCH /marraigeAnnounces/{id}
     *
     * @param int $id
     * @param UpdateMarraigeAnnounceAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMarraigeAnnounceAPIRequest $request)
    {
        $input = $request->all();

        /** @var MarraigeAnnounce $marraigeAnnounce */
        $marraigeAnnounce = $this->marraigeAnnounceRepository->find($id);

        if (empty($marraigeAnnounce)) {
            return $this->sendError('Marraige Announce not found');
        }

        $marraigeAnnounce = $this->marraigeAnnounceRepository->update($input, $id);

        return $this->sendResponse($marraigeAnnounce->toArray(), 'MarraigeAnnounce updated successfully');
    }

    /**
     * Remove the specified MarraigeAnnounce from storage.
     * DELETE /marraigeAnnounces/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var MarraigeAnnounce $marraigeAnnounce */
        $marraigeAnnounce = $this->marraigeAnnounceRepository->find($id);

        if (empty($marraigeAnnounce)) {
            return $this->sendError('Marraige Announce not found');
        }

        $marraigeAnnounce->delete();

        return $this->sendSuccess('Marraige Announce deleted successfully');
    }
}
