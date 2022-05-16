<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFunctionPublishRequest;
use App\Http\Requests\UpdateFunctionPublishRequest;
use App\Repositories\FunctionPublishRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class FunctionPublishController extends AppBaseController
{
    /** @var FunctionPublishRepository $functionPublishRepository*/
    private $functionPublishRepository;

    public function __construct(FunctionPublishRepository $functionPublishRepo)
    {
        $this->functionPublishRepository = $functionPublishRepo;
    }

    /**
     * Display a listing of the FunctionPublish.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $functionPublishes = $this->functionPublishRepository->all();

        return view('function_publishes.index')
            ->with('functionPublishes', $functionPublishes);
    }

    /**
     * Show the form for creating a new FunctionPublish.
     *
     * @return Response
     */
    public function create()
    {
        return view('function_publishes.create');
    }

    /**
     * Store a newly created FunctionPublish in storage.
     *
     * @param CreateFunctionPublishRequest $request
     *
     * @return Response
     */
    public function store(CreateFunctionPublishRequest $request)
    {
        $input = $request->all();

        $functionPublish = $this->functionPublishRepository->create($input);

        Flash::success('Function Publish saved successfully.');

        return redirect(route('functionPublishes.index'));
    }

    /**
     * Display the specified FunctionPublish.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $functionPublish = $this->functionPublishRepository->find($id);

        if (empty($functionPublish)) {
            Flash::error('Function Publish not found');

            return redirect(route('functionPublishes.index'));
        }

        return view('function_publishes.show')->with('functionPublish', $functionPublish);
    }

    /**
     * Show the form for editing the specified FunctionPublish.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $functionPublish = $this->functionPublishRepository->find($id);

        if (empty($functionPublish)) {
            Flash::error('Function Publish not found');

            return redirect(route('functionPublishes.index'));
        }

        return view('function_publishes.edit')->with('functionPublish', $functionPublish);
    }

    /**
     * Update the specified FunctionPublish in storage.
     *
     * @param int $id
     * @param UpdateFunctionPublishRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFunctionPublishRequest $request)
    {
        $functionPublish = $this->functionPublishRepository->find($id);

        if (empty($functionPublish)) {
            Flash::error('Function Publish not found');

            return redirect(route('functionPublishes.index'));
        }

        $functionPublish = $this->functionPublishRepository->update($request->all(), $id);

        Flash::success('Function Publish updated successfully.');

        return redirect(route('functionPublishes.index'));
    }

    /**
     * Remove the specified FunctionPublish from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $functionPublish = $this->functionPublishRepository->find($id);

        if (empty($functionPublish)) {
            Flash::error('Function Publish not found');

            return redirect(route('functionPublishes.index'));
        }

        $this->functionPublishRepository->delete($id);

        Flash::success('Function Publish deleted successfully.');

        return redirect(route('functionPublishes.index'));
    }
}
