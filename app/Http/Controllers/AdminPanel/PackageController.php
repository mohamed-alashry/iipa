<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreatePackageRequest;
use App\Http\Requests\AdminPanel\UpdatePackageRequest;
use App\Repositories\AdminPanel\PackageRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PackageController extends AppBaseController
{
    /** @var PackageRepository $packageRepository*/
    private $packageRepository;

    public function __construct(PackageRepository $packageRepo)
    {
        $this->packageRepository = $packageRepo;
    }

    /**
     * Display a listing of the Package.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $packages = $this->packageRepository->paginate(10);

        return view('adminPanel.packages.index')
            ->with('packages', $packages);
    }

    /**
     * Show the form for creating a new Package.
     *
     * @return Response
     */
    public function create()
    {
        return view('adminPanel.packages.create');
    }

    /**
     * Store a newly created Package in storage.
     *
     * @param CreatePackageRequest $request
     *
     * @return Response
     */
    public function store(CreatePackageRequest $request)
    {
        $input = $request->all();

        $package = $this->packageRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/packages.singular')]));

        return redirect(route('adminPanel.packages.index'));
    }

    /**
     * Display the specified Package.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $package = $this->packageRepository->find($id);

        if (empty($package)) {
            Flash::error(__('messages.not_found', ['model' => __('models/packages.singular')]));

            return redirect(route('adminPanel.packages.index'));
        }

        return view('adminPanel.packages.show')->with('package', $package);
    }

    /**
     * Show the form for editing the specified Package.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $package = $this->packageRepository->find($id);

        if (empty($package)) {
            Flash::error(__('messages.not_found', ['model' => __('models/packages.singular')]));

            return redirect(route('adminPanel.packages.index'));
        }

        return view('adminPanel.packages.edit')->with('package', $package);
    }

    /**
     * Update the specified Package in storage.
     *
     * @param int $id
     * @param UpdatePackageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePackageRequest $request)
    {
        $package = $this->packageRepository->find($id);

        if (empty($package)) {
            Flash::error(__('messages.not_found', ['model' => __('models/packages.singular')]));

            return redirect(route('adminPanel.packages.index'));
        }

        $package = $this->packageRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/packages.singular')]));

        return redirect(route('adminPanel.packages.index'));
    }

    /**
     * Remove the specified Package from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $package = $this->packageRepository->find($id);

        if (empty($package)) {
            Flash::error(__('messages.not_found', ['model' => __('models/packages.singular')]));

            return redirect(route('adminPanel.packages.index'));
        }

        $this->packageRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/packages.singular')]));

        return redirect(route('adminPanel.packages.index'));
    }
}
