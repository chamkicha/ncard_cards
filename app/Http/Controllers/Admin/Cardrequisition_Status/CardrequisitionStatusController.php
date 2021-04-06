<?php

namespace App\Http\Controllers\Admin\Cardrequisition_Status;

use App\Http\Requests;
use App\Http\Requests\Cardrequisition_Status\CreateCardrequisitionStatusRequest;
use App\Http\Requests\Cardrequisition_Status\UpdateCardrequisitionStatusRequest;
use App\Repositories\Cardrequisition_Status\CardrequisitionStatusRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Cardrequisition_Status\CardrequisitionStatus;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CardrequisitionStatusController extends InfyOmBaseController
{
    /** @var  CardrequisitionStatusRepository */
    private $cardrequisitionStatusRepository;

    public function __construct(CardrequisitionStatusRepository $cardrequisitionStatusRepo)
    {
        $this->cardrequisitionStatusRepository = $cardrequisitionStatusRepo;
    }

    /**
     * Display a listing of the CardrequisitionStatus.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->cardrequisitionStatusRepository->pushCriteria(new RequestCriteria($request));
        $cardrequisitionStatuses = $this->cardrequisitionStatusRepository->all();
        return view('admin.cardrequisitionStatus.cardrequisitionStatuses.index')
            ->with('cardrequisitionStatuses', $cardrequisitionStatuses);
    }

    /**
     * Show the form for creating a new CardrequisitionStatus.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.cardrequisitionStatus.cardrequisitionStatuses.create');
    }

    /**
     * Store a newly created CardrequisitionStatus in storage.
     *
     * @param CreateCardrequisitionStatusRequest $request
     *
     * @return Response
     */
    public function store(CreateCardrequisitionStatusRequest $request)
    {
        $input = $request->all();

        $cardrequisitionStatus = $this->cardrequisitionStatusRepository->create($input);

        Flash::success('CardrequisitionStatus saved successfully.');

        return redirect(route('admin.cardrequisitionStatus.cardrequisitionStatuses.index'));
    }

    /**
     * Display the specified CardrequisitionStatus.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cardrequisitionStatus = $this->cardrequisitionStatusRepository->findWithoutFail($id);

        if (empty($cardrequisitionStatus)) {
            Flash::error('CardrequisitionStatus not found');

            return redirect(route('cardrequisitionStatuses.index'));
        }

        return view('admin.cardrequisitionStatus.cardrequisitionStatuses.show')->with('cardrequisitionStatus', $cardrequisitionStatus);
    }

    /**
     * Show the form for editing the specified CardrequisitionStatus.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cardrequisitionStatus = $this->cardrequisitionStatusRepository->findWithoutFail($id);

        if (empty($cardrequisitionStatus)) {
            Flash::error('CardrequisitionStatus not found');

            return redirect(route('cardrequisitionStatuses.index'));
        }

        return view('admin.cardrequisitionStatus.cardrequisitionStatuses.edit')->with('cardrequisitionStatus', $cardrequisitionStatus);
    }

    /**
     * Update the specified CardrequisitionStatus in storage.
     *
     * @param  int              $id
     * @param UpdateCardrequisitionStatusRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCardrequisitionStatusRequest $request)
    {
        $cardrequisitionStatus = $this->cardrequisitionStatusRepository->findWithoutFail($id);

        

        if (empty($cardrequisitionStatus)) {
            Flash::error('CardrequisitionStatus not found');

            return redirect(route('cardrequisitionStatuses.index'));
        }

        $cardrequisitionStatus = $this->cardrequisitionStatusRepository->update($request->all(), $id);

        Flash::success('CardrequisitionStatus updated successfully.');

        return redirect(route('admin.cardrequisitionStatus.cardrequisitionStatuses.index'));
    }

    /**
     * Remove the specified CardrequisitionStatus from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.cardrequisitionStatus.cardrequisitionStatuses.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = CardrequisitionStatus::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.cardrequisitionStatus.cardrequisitionStatuses.index'))->with('success', Lang::get('message.success.delete'));

       }

}
