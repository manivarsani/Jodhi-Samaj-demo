<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatefunctionAddRequest;
use App\Http\Requests\UpdatefunctionAddRequest;
use App\Repositories\functionAddRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class functionAddController extends AppBaseController
{
    /** @var functionAddRepository $functionAddRepository*/
    private $functionAddRepository;

    public function __construct(functionAddRepository $functionAddRepo)
    {
        $this->functionAddRepository = $functionAddRepo;
    }

    /**
     * Display a listing of the functionAdd.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $functionAdds = $this->functionAddRepository->all();

        return view('function_adds.index')
            ->with('functionAdds', $functionAdds);
    }

    /**
     * Show the form for creating a new functionAdd.
     *
     * @return Response
     */
    public function create()
    {
        return view('function_adds.create');
    }

    /**
     * Store a newly created functionAdd in storage.
     *
     * @param CreatefunctionAddRequest $request
     *
     * @return Response
     */
    public function store(CreatefunctionAddRequest $request)
    {
        $input = $request->all();

        $functionAdd = $this->functionAddRepository->create($input);

        Flash::success('Function Add saved successfully.');

        return redirect(route('functionAdds.index'));
    }

    /**
     * Display the specified functionAdd.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $functionAdd = $this->functionAddRepository->find($id);

        if (empty($functionAdd)) {
            Flash::error('Function Add not found');

            return redirect(route('functionAdds.index'));
        }

        return view('function_adds.show')->with('functionAdd', $functionAdd);
    }

    /**
     * Show the form for editing the specified functionAdd.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $functionAdd = $this->functionAddRepository->find($id);

        if (empty($functionAdd)) {
            Flash::error('Function Add not found');

            return redirect(route('functionAdds.index'));
        }

        return view('function_adds.edit')->with('functionAdd', $functionAdd);
    }

    /**
     * Update the specified functionAdd in storage.
     *
     * @param int $id
     * @param UpdatefunctionAddRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatefunctionAddRequest $request)
    {
        $functionAdd = $this->functionAddRepository->find($id);

        if (empty($functionAdd)) {
            Flash::error('Function Add not found');

            return redirect(route('functionAdds.index'));
        }

        $functionAdd = $this->functionAddRepository->update($request->all(), $id);

        Flash::success('Function Add updated successfully.');

        return redirect(route('functionAdds.index'));
    }

    /**
     * Remove the specified functionAdd from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $functionAdd = $this->functionAddRepository->find($id);

        if (empty($functionAdd)) {
            Flash::error('Function Add not found');

            return redirect(route('functionAdds.index'));
        }

        $this->functionAddRepository->delete($id);

        Flash::success('Function Add deleted successfully.');

        return redirect(route('functionAdds.index'));
    }
}
