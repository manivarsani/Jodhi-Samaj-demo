<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatebusinessAdvotiseRequest;
use App\Http\Requests\UpdatebusinessAdvotiseRequest;
use App\Repositories\businessAdvotiseRepository;
use App\Http\Controllers\AppBaseController;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Models\businessAdvotise;
use App\Models\video;
use Flash;
use Response;

class businessAdvotiseController extends AppBaseController
{
    /** @var businessAdvotiseRepository $businessAdvotiseRepository*/
    private $businessAdvotiseRepository;

    public function __construct(businessAdvotiseRepository $businessAdvotiseRepo)
    {
        $this->businessAdvotiseRepository = $businessAdvotiseRepo;
    }

    /**
     * Display a listing of the businessAdvotise.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $businessAdvotises = $this->businessAdvotiseRepository->all();

        return view('business_advotises.index')
            ->with('businessAdvotises', $businessAdvotises);
    }

    /**
     * Show the form for creating a new businessAdvotise.
     *
     * @return Response
     */
    public function create()
    {
        return view('business_advotises.create');
    }

    /**
     * Store a newly created businessAdvotise in storage.
     *
     * @param CreatebusinessAdvotiseRequest $request
     *
     * @return Response
     */
    public function store(CreatebusinessAdvotiseRequest $request)
    {
        $input = $request->all();
        $file = $request->file('image');
        $originalName = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $path = uniqid() . '.' . $extension;
        $image = image::make($file);
        $image->save(public_path('file/' . $path));

        $input['image'] = $path;

        // $businessAdvotise = $this->businessAdvotiseRepository->create($input);

        $this->validate($request, [
            'video' => 'required|file|mimetypes:video/mp4',
        ]);

        // if ($request->hasFile('video')) {
        //     $path = $request->file('video')->store('videos', ['disk' => 'my_files']);
        //     $originalName = $file->getClientOriginalName();
        //     $extension = $file->getClientOriginalExtension();

        //     $videopath = uniqid() . '.' . $extension;
        //     // $image = image::make($path);
        //     $image->save(public_path('upload/' . $videopath));

        //     $input['video'] = $videopath;
        //     $businessAdvotise = $this->businessAdvotiseRepository->create($input);
        // }

        if ($request->hasFile('video')) {
            $file = $request->file('video');

            $extension = $file->getClientOriginalExtension();

            $filename = uniqid() . '.' . $extension;
        
            $file->storeAs('videos',$filename, ['disk' => 'my_files']);

            $input['video'] = $filename;
            $businessAdvotise = $this->businessAdvotiseRepository->create($input);
        }



        Flash::success('Business Advotise saved successfully.');

        return redirect(route('businessAdvotises.index'));
    }

    /**
     * Display the specified businessAdvotise.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $businessAdvotise = $this->businessAdvotiseRepository->find($id);

        if (empty($businessAdvotise)) {
            Flash::error('Business Advotise not found');

            return redirect(route('businessAdvotises.index'));
        }

        return view('business_advotises.show')->with('businessAdvotise', $businessAdvotise);
    }

    /**
     * Show the form for editing the specified businessAdvotise.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $businessAdvotise = $this->businessAdvotiseRepository->find($id);

        if (empty($businessAdvotise)) {
            Flash::error('Business Advotise not found');

            return redirect(route('businessAdvotises.index'));
        }

        return view('business_advotises.edit')->with('businessAdvotise', $businessAdvotise);
    }

    /**
     * Update the specified businessAdvotise in storage.
     *
     * @param int $id
     * @param UpdatebusinessAdvotiseRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatebusinessAdvotiseRequest $request)
    {
        $businessAdvotise = $this->businessAdvotiseRepository->find($id);

        if (empty($businessAdvotise)) {
            Flash::error('Business Advotise not found');

            return redirect(route('businessAdvotises.index'));
        }

        $businessAdvotise = $this->businessAdvotiseRepository->update($request->all(), $id);

        Flash::success('Business Advotise updated successfully.');

        return redirect(route('businessAdvotises.index'));
    }

    /**
     * Remove the specified businessAdvotise from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $businessAdvotise = $this->businessAdvotiseRepository->find($id);

        if (empty($businessAdvotise)) {
            Flash::error('Business Advotise not found');

            return redirect(route('businessAdvotises.index'));
        }

        $this->businessAdvotiseRepository->delete($id);

        Flash::success('Business Advotise deleted successfully.');

        return redirect(route('businessAdvotises.index'));
    }
}
