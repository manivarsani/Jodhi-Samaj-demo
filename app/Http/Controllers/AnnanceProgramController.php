<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAnnanceProgramRequest;
use App\Http\Requests\UpdateAnnanceProgramRequest;
use App\Repositories\AnnanceProgramRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class AnnanceProgramController extends AppBaseController
{
    /** @var AnnanceProgramRepository $annanceProgramRepository*/
    private $annanceProgramRepository;

    public function __construct(AnnanceProgramRepository $annanceProgramRepo)
    {
        $this->annanceProgramRepository = $annanceProgramRepo;
    }

    /**
     * Display a listing of the AnnanceProgram.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $annancePrograms = $this->annanceProgramRepository->all();

        return view('annance_programs.index')
            ->with('annancePrograms', $annancePrograms);
    }

    /**
     * Show the form for creating a new AnnanceProgram.
     *
     * @return Response
     */
    public function create()
    {
        return view('annance_programs.create');
    }

    /**
     * Store a newly created AnnanceProgram in storage.
     *
     * @param CreateAnnanceProgramRequest $request
     *
     * @return Response
     */
    public function store(CreateAnnanceProgramRequest $request)
    {
        $input = $request->all();

        $annanceProgram = $this->annanceProgramRepository->create($input);

        Flash::success('Annance Program saved successfully.');

        return redirect(route('annancePrograms.index'));
    }

    /**
     * Display the specified AnnanceProgram.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $annanceProgram = $this->annanceProgramRepository->find($id);

        if (empty($annanceProgram)) {
            Flash::error('Annance Program not found');

            return redirect(route('annancePrograms.index'));
        }

        return view('annance_programs.show')->with('annanceProgram', $annanceProgram);
    }

    /**
     * Show the form for editing the specified AnnanceProgram.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $annanceProgram = $this->annanceProgramRepository->find($id);

        if (empty($annanceProgram)) {
            Flash::error('Annance Program not found');

            return redirect(route('annancePrograms.index'));
        }

        return view('annance_programs.edit')->with('annanceProgram', $annanceProgram);
    }

    /**
     * Update the specified AnnanceProgram in storage.
     *
     * @param int $id
     * @param UpdateAnnanceProgramRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAnnanceProgramRequest $request)
    {
        $annanceProgram = $this->annanceProgramRepository->find($id);

        if (empty($annanceProgram)) {
            Flash::error('Annance Program not found');

            return redirect(route('annancePrograms.index'));
        }

        $annanceProgram = $this->annanceProgramRepository->update($request->all(), $id);

        Flash::success('Annance Program updated successfully.');

        return redirect(route('annancePrograms.index'));
    }

    /**
     * Remove the specified AnnanceProgram from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $annanceProgram = $this->annanceProgramRepository->find($id);

        if (empty($annanceProgram)) {
            Flash::error('Annance Program not found');

            return redirect(route('annancePrograms.index'));
        }

        $this->annanceProgramRepository->delete($id);

        Flash::success('Annance Program deleted successfully.');

        return redirect(route('annancePrograms.index'));
    }
}
