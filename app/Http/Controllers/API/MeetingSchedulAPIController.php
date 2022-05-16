<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMeetingSchedulAPIRequest;
use App\Http\Requests\API\UpdateMeetingSchedulAPIRequest;
use App\Models\MeetingSchedul;
use App\Repositories\MeetingSchedulRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MeetingSchedulController
 * @package App\Http\Controllers\API
 */

class MeetingSchedulAPIController extends AppBaseController
{
    /** @var  MeetingSchedulRepository */
    private $meetingSchedulRepository;

    public function __construct(MeetingSchedulRepository $meetingSchedulRepo)
    {
        $this->meetingSchedulRepository = $meetingSchedulRepo;
    }

    /**
     * Display a listing of the MeetingSchedul.
     * GET|HEAD /meetingScheduls
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $meetingScheduls = $this->meetingSchedulRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($meetingScheduls->toArray(), 'Meeting Scheduls retrieved successfully');
    }

    /**
     * Store a newly created MeetingSchedul in storage.
     * POST /meetingScheduls
     *
     * @param CreateMeetingSchedulAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMeetingSchedulAPIRequest $request)
    {
        $input = $request->all();

        $meetingSchedul = $this->meetingSchedulRepository->create($input);

        return $this->sendResponse($meetingSchedul->toArray(), 'Meeting Schedul saved successfully');
    }

    /**
     * Display the specified MeetingSchedul.
     * GET|HEAD /meetingScheduls/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var MeetingSchedul $meetingSchedul */
        $meetingSchedul = $this->meetingSchedulRepository->find($id);

        if (empty($meetingSchedul)) {
            return $this->sendError('Meeting Schedul not found');
        }

        return $this->sendResponse($meetingSchedul->toArray(), 'Meeting Schedul retrieved successfully');
    }

    /**
     * Update the specified MeetingSchedul in storage.
     * PUT/PATCH /meetingScheduls/{id}
     *
     * @param int $id
     * @param UpdateMeetingSchedulAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMeetingSchedulAPIRequest $request)
    {
        $input = $request->all();

        /** @var MeetingSchedul $meetingSchedul */
        $meetingSchedul = $this->meetingSchedulRepository->find($id);

        if (empty($meetingSchedul)) {
            return $this->sendError('Meeting Schedul not found');
        }

        $meetingSchedul = $this->meetingSchedulRepository->update($input, $id);

        return $this->sendResponse($meetingSchedul->toArray(), 'MeetingSchedul updated successfully');
    }

    /**
     * Remove the specified MeetingSchedul from storage.
     * DELETE /meetingScheduls/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var MeetingSchedul $meetingSchedul */
        $meetingSchedul = $this->meetingSchedulRepository->find($id);

        if (empty($meetingSchedul)) {
            return $this->sendError('Meeting Schedul not found');
        }

        $meetingSchedul->delete();

        return $this->sendSuccess('Meeting Schedul deleted successfully');
    }
}
