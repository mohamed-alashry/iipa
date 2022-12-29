<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateDirectorRequest;
use App\Http\Requests\AdminPanel\UpdateDirectorRequest;
use App\Repositories\AdminPanel\DirectorRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class DirectorController extends AppBaseController
{
    /** @var DirectorRepository $directorRepository*/
    private $directorRepository;

    public function __construct(DirectorRepository $directorRepo)
    {
        $this->directorRepository = $directorRepo;
    }

    /**
     * Display a listing of the Director.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $directors = $this->directorRepository->paginate(10);

        return view('adminPanel.directors.index')
            ->with('directors', $directors);
    }

    /**
     * Show the form for creating a new Director.
     *
     * @return Response
     */
    public function create()
    {
        return view('adminPanel.directors.create');
    }

    /**
     * Store a newly created Director in storage.
     *
     * @param CreateDirectorRequest $request
     *
     * @return Response
     */
    public function store(CreateDirectorRequest $request)
    {
        $input = $request->all();

        $director = $this->directorRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/directors.singular')]));

        return redirect(route('adminPanel.directors.index'));
    }

    /**
     * Display the specified Director.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $director = $this->directorRepository->find($id);

        if (empty($director)) {
            Flash::error(__('messages.not_found', ['model' => __('models/directors.singular')]));

            return redirect(route('adminPanel.directors.index'));
        }

        return view('adminPanel.directors.show')->with('director', $director);
    }

    /**
     * Show the form for editing the specified Director.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $director = $this->directorRepository->find($id);

        if (empty($director)) {
            Flash::error(__('messages.not_found', ['model' => __('models/directors.singular')]));

            return redirect(route('adminPanel.directors.index'));
        }

        return view('adminPanel.directors.edit')->with('director', $director);
    }

    /**
     * Update the specified Director in storage.
     *
     * @param int $id
     * @param UpdateDirectorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDirectorRequest $request)
    {
        $director = $this->directorRepository->find($id);

        if (empty($director)) {
            Flash::error(__('messages.not_found', ['model' => __('models/directors.singular')]));

            return redirect(route('adminPanel.directors.index'));
        }

        $director = $this->directorRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/directors.singular')]));

        return redirect(route('adminPanel.directors.index'));
    }

    /**
     * Remove the specified Director from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $director = $this->directorRepository->find($id);

        if (empty($director)) {
            Flash::error(__('messages.not_found', ['model' => __('models/directors.singular')]));

            return redirect(route('adminPanel.directors.index'));
        }

        $this->directorRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/directors.singular')]));

        return redirect(route('adminPanel.directors.index'));
    }
}
