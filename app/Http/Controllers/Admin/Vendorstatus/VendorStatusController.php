<?php

namespace App\Http\Controllers\Admin\Vendorstatus;

use App\Http\Requests;
use App\Http\Requests\Vendorstatus\CreateVendorStatusRequest;
use App\Http\Requests\Vendorstatus\UpdateVendorStatusRequest;
use App\Repositories\Vendorstatus\VendorStatusRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Vendorstatus\VendorStatus;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class VendorStatusController extends InfyOmBaseController
{
    /** @var  VendorStatusRepository */
    private $vendorStatusRepository;

    public function __construct(VendorStatusRepository $vendorStatusRepo)
    {
        $this->vendorStatusRepository = $vendorStatusRepo;
    }

    /**
     * Display a listing of the VendorStatus.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->vendorStatusRepository->pushCriteria(new RequestCriteria($request));
        $vendorStatuses = $this->vendorStatusRepository->all();
        return view('admin.vendorStatus.vendorStatuses.index')
            ->with('vendorStatuses', $vendorStatuses);
    }

    /**
     * Show the form for creating a new VendorStatus.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.vendorStatus.vendorStatuses.create');
    }

    /**
     * Store a newly created VendorStatus in storage.
     *
     * @param CreateVendorStatusRequest $request
     *
     * @return Response
     */
    public function store(CreateVendorStatusRequest $request)
    {
        $input = $request->all();

        $vendorStatus = $this->vendorStatusRepository->create($input);

        Flash::success('VendorStatus saved successfully.');

        return redirect(route('admin.vendorStatus.vendorStatuses.index'));
    }

    /**
     * Display the specified VendorStatus.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $vendorStatus = $this->vendorStatusRepository->findWithoutFail($id);

        if (empty($vendorStatus)) {
            Flash::error('VendorStatus not found');

            return redirect(route('vendorStatuses.index'));
        }

        return view('admin.vendorStatus.vendorStatuses.show')->with('vendorStatus', $vendorStatus);
    }

    /**
     * Show the form for editing the specified VendorStatus.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $vendorStatus = $this->vendorStatusRepository->findWithoutFail($id);

        if (empty($vendorStatus)) {
            Flash::error('VendorStatus not found');

            return redirect(route('vendorStatuses.index'));
        }

        return view('admin.vendorStatus.vendorStatuses.edit')->with('vendorStatus', $vendorStatus);
    }

    /**
     * Update the specified VendorStatus in storage.
     *
     * @param  int              $id
     * @param UpdateVendorStatusRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVendorStatusRequest $request)
    {
        $vendorStatus = $this->vendorStatusRepository->findWithoutFail($id);

        

        if (empty($vendorStatus)) {
            Flash::error('VendorStatus not found');

            return redirect(route('vendorStatuses.index'));
        }

        $vendorStatus = $this->vendorStatusRepository->update($request->all(), $id);

        Flash::success('VendorStatus updated successfully.');

        return redirect(route('admin.vendorStatus.vendorStatuses.index'));
    }

    /**
     * Remove the specified VendorStatus from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.vendorStatus.vendorStatuses.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = VendorStatus::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.vendorStatus.vendorStatuses.index'))->with('success', Lang::get('message.success.delete'));

       }

}
