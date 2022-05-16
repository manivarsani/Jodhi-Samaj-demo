<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDashbordRequest;
use App\Http\Requests\UpdateDashbordRequest;
use App\Repositories\DashbordRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\BookSocity;
use App\Models\member;
use Illuminate\Http\Request;
use Flash;
use Response;

class DashbordController extends AppBaseController
{
    /** @var DashbordRepository $dashbordRepository*/
    private $dashbordRepository;

    public function __construct(DashbordRepository $dashbordRepo)
    {
        $this->dashbordRepository = $dashbordRepo;
    }

    /**
     * Display a listing of the Dashbord.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $member = member::count();
        $booking = BookSocity::count();

        return view('dashbords.index',compact('member','booking'));
    }

    /**
     * Show the form for creating a new Dashbord.
     *
     * @return Response
     */
    public function create($id)
    {
        $count = member::count();
        return view('dashbords.table', compact('count'));
    }

    /**
     * Store a newly created Dashbord in storage.
     *
     * @param CreateDashbordRequest $request
     *
     * @return Response
     */
    public function store(CreateDashbordRequest $request)
    {
        $input = $request->all();

        $dashbord = $this->dashbordRepository->create($input);

        Flash::success('Dashbord saved successfully.');

        return redirect(route('dashbords.index'));
    }

    /**
     * Display the specified Dashbord.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dashbord = $this->dashbordRepository->find($id);

        if (empty($dashbord)) {
            Flash::error('Dashbord not found');

            return redirect(route('dashbords.index'));
        }

        return view('dashbords.show')->with('dashbord', $dashbord);
    }

    /**
     * Show the form for editing the specified Dashbord.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dashbord = $this->dashbordRepository->find($id);

        if (empty($dashbord)) {
            Flash::error('Dashbord not found');

            return redirect(route('dashbords.index'));
        }

        return view('dashbords.edit')->with('dashbord', $dashbord);
    }

    /**
     * Update the specified Dashbord in storage.
     *
     * @param int $id
     * @param UpdateDashbordRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDashbordRequest $request)
    {
        $dashbord = $this->dashbordRepository->find($id);

        if (empty($dashbord)) {
            Flash::error('Dashbord not found');

            return redirect(route('dashbords.index'));
        }

        $dashbord = $this->dashbordRepository->update($request->all(), $id);

        Flash::success('Dashbord updated successfully.');

        return redirect(route('dashbords.index'));
    }

    /**
     * Remove the specified Dashbord from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dashbord = $this->dashbordRepository->find($id);

        if (empty($dashbord)) {
            Flash::error('Dashbord not found');

            return redirect(route('dashbords.index'));
        }

        $this->dashbordRepository->delete($id);

        Flash::success('Dashbord deleted successfully.');

        return redirect(route('dashbords.index'));
    }
}
