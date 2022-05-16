<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatefamilyRequest;
use App\Http\Requests\UpdatefamilyRequest;
use App\Repositories\familyRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class familyController extends AppBaseController
{
    /** @var familyRepository $familyRepository*/
    private $familyRepository;

    public function __construct(familyRepository $familyRepo)
    {
        $this->familyRepository = $familyRepo;
    }

    /**
     * Display a listing of the family.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $families = $this->familyRepository->all();

        return view('families.index')
            ->with('families', $families);
    }

    /**
     * Show the form for creating a new family.
     *
     * @return Response
     */
    public function create()
    {
        return view('families.create');
    }

    /**
     * Store a newly created family in storage.
     *
     * @param CreatefamilyRequest $request
     *
     * @return Response
     */
    public function store(CreatefamilyRequest $request)
    {
        $input = $request->all();

        $family = $this->familyRepository->create($input);

        Flash::success('Family saved successfully.');

        return redirect(route('families.index'));
    }

    /**
     * Display the specified family.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $family = $this->familyRepository->find($id);

        if (empty($family)) {
            Flash::error('Family not found');

            return redirect(route('families.index'));
        }

        return view('families.show')->with('family', $family);
    }

    /**
     * Show the form for editing the specified family.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $family = $this->familyRepository->find($id);

        if (empty($family)) {
            Flash::error('Family not found');

            return redirect(route('families.index'));
        }

        return view('families.edit')->with('family', $family);
    }

    /**
     * Update the specified family in storage.
     *
     * @param int $id
     * @param UpdatefamilyRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatefamilyRequest $request)
    {
        $family = $this->familyRepository->find($id);

        if (empty($family)) {
            Flash::error('Family not found');

            return redirect(route('families.index'));
        }

        $family = $this->familyRepository->update($request->all(), $id);

        Flash::success('Family updated successfully.');

        return redirect(route('families.index'));
    }

    /**
     * Remove the specified family from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $family = $this->familyRepository->find($id);

        if (empty($family)) {
            Flash::error('Family not found');

            return redirect(route('families.index'));
        }

        $this->familyRepository->delete($id);

        Flash::success('Family deleted successfully.');

        return redirect(route('families.index'));
    }
}
