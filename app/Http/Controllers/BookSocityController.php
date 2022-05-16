<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBookSocityRequest;
use App\Http\Requests\UpdateBookSocityRequest;
use App\Repositories\BookSocityRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\BookSocity;
use App\Models\functionAdd;
use App\Models\member;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Flash;
use Response;

class BookSocityController extends AppBaseController
{
    /** @var BookSocityRepository $bookSocityRepository*/
    private $bookSocityRepository;

    public function __construct(BookSocityRepository $bookSocityRepo)
    {
        $this->bookSocityRepository = $bookSocityRepo;
    }

    /**
     * Display a listing of the BookSocity.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $bookSocities = $this->bookSocityRepository->all();
        $data = BookSocity::get();
        return view('book_socities.index', compact(['data' => $data]))
            ->with('bookSocities', $bookSocities);
    }

    /**
     * Show the form for creating a new BookSocity.
     *
     * @return Response
     */
    public function create()
    {
        $member = member::pluck('firstname', 'firstname');
        $function = functionAdd::pluck('name', 'name');
        return view('book_socities.create', compact('member', 'function'));
    }

    /**
     * Store a newly created BookSocity in storage.
     *
     * @param CreateBookSocityRequest $request
     *
     * @return Response
     */
    public function store(CreateBookSocityRequest $request)
    {
        $input = $request->all();

        $start_date = Carbon::parse($request->input('startingdate'));
        $end_date = Carbon::parse($request->input('endingdate'));
        $input['totaldaybook'] = $start_date->diffInDays($end_date);

        $bookSocity = $this->bookSocityRepository->create($input);

        Flash::success('Book Socity saved successfully.');

        return redirect(route('bookSocities.index'));
    }

    /**
     * Display the specified BookSocity.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $bookSocity = $this->bookSocityRepository->find($id);

        if (empty($bookSocity)) {
            Flash::error('Book Socity not found');

            return redirect(route('bookSocities.index'));
        }

        return view('book_socities.show')->with('bookSocity', $bookSocity);
    }

    /**
     * Show the form for editing the specified BookSocity.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $bookSocity = $this->bookSocityRepository->find($id);
        $member = member::pluck('firstname', 'firstname');
        $function = functionAdd::pluck('name', 'name');

        if (empty($bookSocity)) {
            Flash::error('Book Socity not found');

            return redirect(route('bookSocities.index'));
        }

        return view('book_socities.edit',compact('member','function'))->with('bookSocity', $bookSocity);
    }

    /**
     * Update the specified BookSocity in storage.
     *
     * @param int $id
     * @param UpdateBookSocityRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBookSocityRequest $request)
    {
        $bookSocity = $this->bookSocityRepository->find($id);

        if (empty($bookSocity)) {
            Flash::error('Book Socity not found');

            return redirect(route('bookSocities.index'));
        }

        $bookSocity = $this->bookSocityRepository->update($request->all(), $id);

        Flash::success('Book Socity updated successfully.');

        return redirect(route('bookSocities.index'));
    }

    /**
     * Remove the specified BookSocity from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bookSocity = $this->bookSocityRepository->find($id);

        if (empty($bookSocity)) {
            Flash::error('Book Socity not found');

            return redirect(route('bookSocities.index'));
        }

        $this->bookSocityRepository->delete($id);

        Flash::success('Book Socity deleted successfully.');

        return redirect(route('bookSocities.index'));
    }
}
