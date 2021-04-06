<?php

namespace App\Http\Controllers\Admin\Card_Import;

use App\Http\Requests;
use App\Http\Requests\Card_Import\CreateCardimportRequest;
use App\Http\Requests\Card_Import\UpdateCardimportRequest;
use App\Repositories\Card_Import\CardimportRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Card_Import\Cardimport;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Imports\CardsImport;
use Maatwebsite\Excel\Facades\Excel;
use Response;
use DB;

class CardimportController extends InfyOmBaseController
{
    /** @var  CardimportRepository */
    private $cardimportRepository;

    public function __construct(CardimportRepository $cardimportRepo)
    {
        $this->cardimportRepository = $cardimportRepo;
    }

    /**
     * Display a listing of the Cardimport.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->cardimportRepository->pushCriteria(new RequestCriteria($request));
        $cardimports = $this->cardimportRepository->all();
        return view('admin.cardImport.cardimports.index')
            ->with('cardimports', $cardimports);
    }

    /**
     * Show the form for creating a new Cardimport.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.cardImport.cardimports.create');
    }

    /**
     * Store a newly created Cardimport in storage.
     *
     * @param CreateCardimportRequest $request
     *
     * @return Response
     */
    public function store(CreateCardimportRequest $request)
    {
        $this->validate($request, [
            'file'  => 'required|mimes:xls,xlsx',
            'receive_date'  => 'required',
            'order_number'  => ['required', 'unique:cardimports,order_number'],
        ],

        [
            'select_file.required' => __('.'),
        ]);


        $input = $request->card_number;
        $file = $request->file('file')->store('import');
        // $import = new CardsImport;
        // $import->import($file);
        Excel ::import(new CardsImport($request), $file);
       // $cardimport = $this->cardimportRepository->create($input);

        Flash::success('Cardimport saved successfully.');

        return redirect(route('admin.cardImport.cardimports.index'));
    }

    /**
     * Display the specified Cardimport.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cardimport = $this->cardimportRepository->findWithoutFail($id);

        if (empty($cardimport)) {
            Flash::error('Cardimport not found');

            return redirect(route('cardimports.index'));
        }

        return view('admin.cardImport.cardimports.show')->with('cardimport', $cardimport);
    }

    /**
     * Show the form for editing the specified Cardimport.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cardimport = $this->cardimportRepository->findWithoutFail($id);

        if (empty($cardimport)) {
            Flash::error('Cardimport not found');

            return redirect(route('cardimports.index'));
        }

        return view('admin.cardImport.cardimports.edit')->with('cardimport', $cardimport);
    }

    /**
     * Update the specified Cardimport in storage.
     *
     * @param  int              $id
     * @param UpdateCardimportRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCardimportRequest $request)
    {
        $cardimport = $this->cardimportRepository->findWithoutFail($id);

        

        if (empty($cardimport)) {
            Flash::error('Cardimport not found');

            return redirect(route('cardimports.index'));
        }

        $cardimport = $this->cardimportRepository->update($request->all(), $id);

        Flash::success('Cardimport updated successfully.');

        return redirect(route('admin.cardImport.cardimports.index'));
    }

    /**
     * Remove the specified Cardimport from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.cardImport.cardimports.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = Cardimport::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.cardImport.cardimports.index'))->with('success', Lang::get('message.success.delete'));

       }

}
