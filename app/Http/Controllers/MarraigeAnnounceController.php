<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMarraigeAnnounceRequest;
use App\Http\Requests\UpdateMarraigeAnnounceRequest;
use App\Repositories\MarraigeAnnounceRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MarraigeAnnounceController extends AppBaseController
{
    /** @var MarraigeAnnounceRepository $marraigeAnnounceRepository*/
    private $marraigeAnnounceRepository;

    public function __construct(MarraigeAnnounceRepository $marraigeAnnounceRepo)
    {
        $this->marraigeAnnounceRepository = $marraigeAnnounceRepo;
    }

    /**
     * Display a listing of the MarraigeAnnounce.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $marraigeAnnounces = $this->marraigeAnnounceRepository->all();

        return view('marraige_announces.index')
            ->with('marraigeAnnounces', $marraigeAnnounces);
    }

    /**
     * Show the form for creating a new MarraigeAnnounce.
     *
     * @return Response
     */
    public function create()
    {
        return view('marraige_announces.create');
    }

    /**
     * Store a newly created MarraigeAnnounce in storage.
     *
     * @param CreateMarraigeAnnounceRequest $request
     *
     * @return Response
     */
    public function store(CreateMarraigeAnnounceRequest $request)
    {
        $input = $request->all();

        $marraigeAnnounce = $this->marraigeAnnounceRepository->create($input);

        Flash::success('Marraige Announce saved successfully.');

        return redirect(route('marraigeAnnounces.index'));
    }

    /**
     * Display the specified MarraigeAnnounce.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $marraigeAnnounce = $this->marraigeAnnounceRepository->find($id);

        if (empty($marraigeAnnounce)) {
            Flash::error('Marraige Announce not found');

            return redirect(route('marraigeAnnounces.index'));
        }

        return view('marraige_announces.show')->with('marraigeAnnounce', $marraigeAnnounce);
    }

    /**
     * Show the form for editing the specified MarraigeAnnounce.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $marraigeAnnounce = $this->marraigeAnnounceRepository->find($id);

        if (empty($marraigeAnnounce)) {
            Flash::error('Marraige Announce not found');

            return redirect(route('marraigeAnnounces.index'));
        }

        return view('marraige_announces.edit')->with('marraigeAnnounce', $marraigeAnnounce);
    }

    /**
     * Update the specified MarraigeAnnounce in storage.
     *
     * @param int $id
     * @param UpdateMarraigeAnnounceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMarraigeAnnounceRequest $request)
    {
        $marraigeAnnounce = $this->marraigeAnnounceRepository->find($id);

        if (empty($marraigeAnnounce)) {
            Flash::error('Marraige Announce not found');

            return redirect(route('marraigeAnnounces.index'));
        }

        $marraigeAnnounce = $this->marraigeAnnounceRepository->update($request->all(), $id);

        Flash::success('Marraige Announce updated successfully.');

        return redirect(route('marraigeAnnounces.index'));
    }

    /**
     * Remove the specified MarraigeAnnounce from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $marraigeAnnounce = $this->marraigeAnnounceRepository->find($id);

        if (empty($marraigeAnnounce)) {
            Flash::error('Marraige Announce not found');

            return redirect(route('marraigeAnnounces.index'));
        }

        $this->marraigeAnnounceRepository->delete($id);

        Flash::success('Marraige Announce deleted successfully.');

        return redirect(route('marraigeAnnounces.index'));
    }
}
