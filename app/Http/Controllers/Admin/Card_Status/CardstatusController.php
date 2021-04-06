<?php

namespace App\Http\Controllers\Admin\Card_Status;

use App\Http\Requests;
use App\Http\Requests\Card_Status\CreateCardstatusRequest;
use App\Http\Requests\Card_Status\UpdateCardstatusRequest;
use App\Repositories\Card_Status\CardstatusRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Card_Status\Cardstatus;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CardstatusController extends InfyOmBaseController
{
    /** @var  CardstatusRepository */
    private $cardstatusRepository;

    public function __construct(CardstatusRepository $cardstatusRepo)
    {
        $this->cardstatusRepository = $cardstatusRepo;
    }

    /**
     * Display a listing of the Cardstatus.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->cardstatusRepository->pushCriteria(new RequestCriteria($request));
        $cardstatuses = $this->cardstatusRepository->all();
        return view('admin.cardStatus.cardstatuses.index')
            ->with('cardstatuses', $cardstatuses);
    }

    /**
     * Show the form for creating a new Cardstatus.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.cardStatus.cardstatuses.create');
    }

    /**
     * Store a newly created Cardstatus in storage.
     *
     * @param CreateCardstatusRequest $request
     *
     * @return Response
     */
    public function store(CreateCardstatusRequest $request)
    {
        
        $this->validate($request, [
            'status_name'  => ['required', 'unique:cardstatuss,status_name'],
        ]);
        $input = $request->all();

        $cardstatus = $this->cardstatusRepository->create($input);

        Flash::success('Cardstatus saved successfully.');

        return redirect(route('admin.cardStatus.cardstatuses.index'));
    }

    /**
     * Display the specified Cardstatus.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cardstatus = $this->cardstatusRepository->findWithoutFail($id);

        if (empty($cardstatus)) {
            Flash::error('Cardstatus not found');

            return redirect(route('cardstatuses.index'));
        }

        return view('admin.cardStatus.cardstatuses.show')->with('cardstatus', $cardstatus);
    }

    /**
     * Show the form for editing the specified Cardstatus.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cardstatus = $this->cardstatusRepository->findWithoutFail($id);

        if (empty($cardstatus)) {
            Flash::error('Cardstatus not found');

            return redirect(route('cardstatuses.index'));
        }

        return view('admin.cardStatus.cardstatuses.edit')->with('cardstatus', $cardstatus);
    }

    /**
     * Update the specified Cardstatus in storage.
     *
     * @param  int              $id
     * @param UpdateCardstatusRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCardstatusRequest $request)
    {
        $cardstatus = $this->cardstatusRepository->findWithoutFail($id);

        

        if (empty($cardstatus)) {
            Flash::error('Cardstatus not found');

            return redirect(route('cardstatuses.index'));
        }

        $cardstatus = $this->cardstatusRepository->update($request->all(), $id);

        Flash::success('Cardstatus updated successfully.');

        return redirect(route('admin.cardStatus.cardstatuses.index'));
    }

    /**
     * Remove the specified Cardstatus from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.cardStatus.cardstatuses.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = Cardstatus::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.cardStatus.cardstatuses.index'))->with('success', Lang::get('message.success.delete'));

       }

}
