<?php

namespace App\Http\Controllers\Admin\Vendor;

use App\Http\Requests;
use App\Http\Requests\Vendor\CreateVendorRequest;
use App\Http\Requests\Vendor\UpdateVendorRequest;
use App\Repositories\Vendor\VendorRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Vendor\Vendor;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use DB;

class VendorController extends InfyOmBaseController
{
    /** @var  VendorRepository */
    private $vendorRepository;

    public function __construct(VendorRepository $vendorRepo)
    {
        $this->vendorRepository = $vendorRepo;
    }

    /**
     * Display a listing of the Vendor.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->vendorRepository->pushCriteria(new RequestCriteria($request));
        $vendors = $this->vendorRepository->all();
        return view('admin.vendor.vendors.index')
            ->with('vendors', $vendors);
    }

    /**
     * Show the form for creating a new Vendor.
     *
     * @return Response
     */
    public function create()
    {
        $status_list = DB::table('vendorstatuss')->get();
        return view('admin.vendor.vendors.create')->with('status_list',$status_list);
    }

    /**
     * Store a newly created Vendor in storage.
     *
     * @param CreateVendorRequest $request
     *
     * @return Response
     */
    public function store(CreateVendorRequest $request)
    {
        $this->validate($request, [
            'vendor_name'  => ['required', 'unique:vendors,vendor_name'],
        ]);


        $input = $request->all();

        $vendor = $this->vendorRepository->create($input);

        Flash::success('Vendor saved successfully.');

        return redirect(route('admin.vendor.vendors.index'));
    }

    /**
     * Display the specified Vendor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $vendor = $this->vendorRepository->findWithoutFail($id);

        if (empty($vendor)) {
            Flash::error('Vendor not found');

            return redirect(route('vendors.index'));
        }

        return view('admin.vendor.vendors.show')->with('vendor', $vendor);
    }

    /**
     * Show the form for editing the specified Vendor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $status_list = DB::table('vendorstatuss')->get();
        $vendor = $this->vendorRepository->findWithoutFail($id);

        if (empty($vendor)) {
            Flash::error('Vendor not found');

            return redirect(route('vendors.index'));
        }

        return view('admin.vendor.vendors.edit')->with('vendor', $vendor)->with('status_list',$status_list);
    }

    /**
     * Update the specified Vendor in storage.
     *
     * @param  int              $id
     * @param UpdateVendorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVendorRequest $request)
    {
        $vendor = $this->vendorRepository->findWithoutFail($id);

        

        if (empty($vendor)) {
            Flash::error('Vendor not found');

            return redirect(route('vendors.index'));
        }

        $vendor = $this->vendorRepository->update($request->all(), $id);

        Flash::success('Vendor updated successfully.');

        return redirect(route('admin.vendor.vendors.index'));
    }

    /**
     * Remove the specified Vendor from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.vendor.vendors.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = Vendor::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.vendor.vendors.index'))->with('success', Lang::get('message.success.delete'));

       }

}
