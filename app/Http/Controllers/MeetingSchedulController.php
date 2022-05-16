<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMeetingSchedulRequest;
use App\Http\Requests\UpdateMeetingSchedulRequest;
use App\Repositories\MeetingSchedulRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MeetingSchedulController extends AppBaseController
{
    /** @var MeetingSchedulRepository $meetingSchedulRepository*/
    private $meetingSchedulRepository;

    public function __construct(MeetingSchedulRepository $meetingSchedulRepo)
    {
        $this->meetingSchedulRepository = $meetingSchedulRepo;
    }

    /**
     * Display a listing of the MeetingSchedul.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $meetingScheduls = $this->meetingSchedulRepository->all();

        return view('meeting_scheduls.index')
            ->with('meetingScheduls', $meetingScheduls);
    }

    /**
     * Show the form for creating a new MeetingSchedul.
     *
     * @return Response
     */
    public function create()
    {
        return view('meeting_scheduls.create');
    }

    /**
     * Store a newly created MeetingSchedul in storage.
     *
     * @param CreateMeetingSchedulRequest $request
     *
     * @return Response
     */
    public function store(CreateMeetingSchedulRequest $request)
    {
        $input = $request->all();

        $meetingSchedul = $this->meetingSchedulRepository->create($input);

        Flash::success('Meeting Schedul saved successfully.');

        return redirect(route('meetingScheduls.index'));
    }

    /**
     * Display the specified MeetingSchedul.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $meetingSchedul = $this->meetingSchedulRepository->find($id);

        if (empty($meetingSchedul)) {
            Flash::error('Meeting Schedul not found');

            return redirect(route('meetingScheduls.index'));
        }

        return view('meeting_scheduls.show')->with('meetingSchedul', $meetingSchedul);
    }

    /**
     * Show the form for editing the specified MeetingSchedul.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $meetingSchedul = $this->meetingSchedulRepository->find($id);

        if (empty($meetingSchedul)) {
            Flash::error('Meeting Schedul not found');

            return redirect(route('meetingScheduls.index'));
        }

        return view('meeting_scheduls.edit')->with('meetingSchedul', $meetingSchedul);
    }

    /**
     * Update the specified MeetingSchedul in storage.
     *
     * @param int $id
     * @param UpdateMeetingSchedulRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMeetingSchedulRequest $request)
    {
        $meetingSchedul = $this->meetingSchedulRepository->find($id);

        if (empty($meetingSchedul)) {
            Flash::error('Meeting Schedul not found');

            return redirect(route('meetingScheduls.index'));
        }

        $meetingSchedul = $this->meetingSchedulRepository->update($request->all(), $id);

        Flash::success('Meeting Schedul updated successfully.');

        return redirect(route('meetingScheduls.index'));
    }

    /**
     * Remove the specified MeetingSchedul from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $meetingSchedul = $this->meetingSchedulRepository->find($id);

        if (empty($meetingSchedul)) {
            Flash::error('Meeting Schedul not found');

            return redirect(route('meetingScheduls.index'));
        }

        $this->meetingSchedulRepository->delete($id);

        Flash::success('Meeting Schedul deleted successfully.');

        return redirect(route('meetingScheduls.index'));
    }
}
