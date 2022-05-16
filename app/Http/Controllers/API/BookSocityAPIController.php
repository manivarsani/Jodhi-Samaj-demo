<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBookSocityAPIRequest;
use App\Http\Requests\API\UpdateBookSocityAPIRequest;
use App\Models\BookSocity;
use App\Repositories\BookSocityRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BookSocityController
 * @package App\Http\Controllers\API
 */

class BookSocityAPIController extends AppBaseController
{
    /** @var  BookSocityRepository */
    private $bookSocityRepository;

    public function __construct(BookSocityRepository $bookSocityRepo)
    {
        $this->bookSocityRepository = $bookSocityRepo;
    }

    /**
     * Display a listing of the BookSocity.
     * GET|HEAD /bookSocities
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $bookSocities = $this->bookSocityRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($bookSocities->toArray(), 'Book Socities retrieved successfully');
    }

    /**
     * Store a newly created BookSocity in storage.
     * POST /bookSocities
     *
     * @param CreateBookSocityAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBookSocityAPIRequest $request)
    {
        $input = $request->all();

        $bookSocity = $this->bookSocityRepository->create($input);

        return $this->sendResponse($bookSocity->toArray(), 'Book Socity saved successfully');
    }

    /**
     * Display the specified BookSocity.
     * GET|HEAD /bookSocities/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var BookSocity $bookSocity */
        $bookSocity = $this->bookSocityRepository->find($id);

        if (empty($bookSocity)) {
            return $this->sendError('Book Socity not found');
        }

        return $this->sendResponse($bookSocity->toArray(), 'Book Socity retrieved successfully');
    }

    /**
     * Update the specified BookSocity in storage.
     * PUT/PATCH /bookSocities/{id}
     *
     * @param int $id
     * @param UpdateBookSocityAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBookSocityAPIRequest $request)
    {
        $input = $request->all();

        /** @var BookSocity $bookSocity */
        $bookSocity = $this->bookSocityRepository->find($id);

        if (empty($bookSocity)) {
            return $this->sendError('Book Socity not found');
        }

        $bookSocity = $this->bookSocityRepository->update($input, $id);

        return $this->sendResponse($bookSocity->toArray(), 'BookSocity updated successfully');
    }

    /**
     * Remove the specified BookSocity from storage.
     * DELETE /bookSocities/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var BookSocity $bookSocity */
        $bookSocity = $this->bookSocityRepository->find($id);

        if (empty($bookSocity)) {
            return $this->sendError('Book Socity not found');
        }

        $bookSocity->delete();

        return $this->sendSuccess('Book Socity deleted successfully');
    }
}
