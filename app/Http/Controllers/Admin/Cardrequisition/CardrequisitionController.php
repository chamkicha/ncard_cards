<?php

namespace App\Http\Controllers\Admin\Cardrequisition;

use App\Http\Requests;
use App\Http\Requests\Cardrequisition\CreateCardrequisitionRequest;
use App\Http\Requests\Cardrequisition\UpdateCardrequisitionRequest;
use App\Repositories\Cardrequisition\CardrequisitionRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Cardrequisition\Cardrequisition;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use DB;

class CardrequisitionController extends InfyOmBaseController
{
    /** @var  CardrequisitionRepository */
    private $cardrequisitionRepository;

    public function __construct(CardrequisitionRepository $cardrequisitionRepo)
    {
        $this->cardrequisitionRepository = $cardrequisitionRepo;
    }

    /**
     * Display a listing of the Cardrequisition.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->cardrequisitionRepository->pushCriteria(new RequestCriteria($request));
        $cardrequisitions = $this->cardrequisitionRepository->all();
        return view('admin.cardrequisition.cardrequisitions.index')
            ->with('cardrequisitions', $cardrequisitions);
    }

    /**
     * Show the form for creating a new Cardrequisition.
     *
     * @return Response
     */
    public function create()
    {
        $vendor_list = DB::table('vendors')->get();
        return view('admin.cardrequisition.cardrequisitions.create')->with('vendor_list',$vendor_list);
    }

    /**
     * Store a newly created Cardrequisition in storage.
     *
     * @param CreateCardrequisitionRequest $request
     *
     * @return Response
     */
    public function store(CreateCardrequisitionRequest $request)
    {
        $input = $request->all();
        //dd($request);
        
        $assigned_refNo = DB::table('cardimports')-> first()->assigned_refNo;
        if(is_null($assigned_refNo)){

            $assigned_refNo=100;
        }else{
            $assigned_refNo=e($assigned_refNo) + 1;
        }
        
        $input= array(

            "cardrequisition_date" => $request->cardrequisition_date,
            "card_quantity" => $request->card_quantity,
            "cardrequisition_description" => $request->cardrequisition_description,
            "vendor_no" => $request->vendor_no,
            "cardrequisition_no" => $request->cardrequisition_no,
            "next_handler" => $request->next_handler,
            "assigned_refNo" => $assigned_refNo,
            "created_by" => $request->created_by,
            "next_handler_role_id" => $request->next_handler_role_id,
            "cardrequisition_status" => $request->cardrequisition_status,

        );
 

        //update card status
        $requestedCards =  (int)$request->card_quantity; 
        $cardstatus_no = DB::table('cardimports')
                                ->where('status', 'New')
                                ->count();       
        if($cardstatus_no == 0 )
        {
            

        return redirect(route('admin.cardrequisition.cardrequisitions.index'))->with('error', 'No Available Cards');

        }
        elseif($cardstatus_no < $requestedCards){
            
        return redirect(route('admin.cardrequisition.cardrequisitions.index'))->with('error', 'No Available Cards');


        }
        
        else{

            
                $cardrequisition = $this->cardrequisitionRepository->create($input);

                $cardstatuschange = DB::table('cardimports')
                                    ->where('status', 'New')
                                    ->orderBy('card_number', 'asc')
                                    ->take($request->card_quantity)
                                    ->update(['status' => 'Processing','assigned_refNo' => $assigned_refNo]);
                                

            Flash::success('Cardrequisition saved successfully.');

            return redirect(route('admin.cardrequisition.cardrequisitions.index'));

            }
    }

    /**
     * Display the specified Cardrequisition.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cardrequisition = $this->cardrequisitionRepository->findWithoutFail($id);
        
        $vendor_details = DB::table('vendors')->where('vendor_name', $cardrequisition->vendor_no)->get();
        $cards_details_asc = DB::table('cardimports')
                                 ->where('assigned_refNo', $cardrequisition->assigned_refNo)
                                 ->orderBy('card_number', 'asc')
                                 ->get();
        $cards_details_desc = DB::table('cardimports')
                                 ->where('assigned_refNo', $cardrequisition->assigned_refNo)
                                 ->orderBy('card_number', 'desc')
                                 ->get();
        $cards_details_count = DB::table('cardimports')
                                ->where('assigned_refNo', $cardrequisition->assigned_refNo)
                                ->count();
        $cards_details_count_minus = DB::table('cardimports')
                                ->where('assigned_refNo', $cardrequisition->assigned_refNo)
                                ->count();
        $cards_details_count_minus = $cards_details_count_minus - 5;
        
        $cards_comments = DB::table('commentss')
                                 ->where('cardrequisition_no', $cardrequisition->cardrequisition_no)
                                 ->get();
                            

        if (empty($cardrequisition)) {
            Flash::error('Cardrequisition not found');

            return redirect(route('cardrequisitions.index'));
        }

        return view('admin.cardrequisition.cardrequisitions.show')
               ->with('vendor_details', $vendor_details)
               ->with('cards_details_asc', $cards_details_asc)
               ->with('cards_details_desc', $cards_details_desc)
               ->with('cards_details_count', $cards_details_count)
               ->with('cards_comments', $cards_comments)
               ->with('cards_details_count_minus', $cards_details_count_minus)
               ->with('cardrequisition', $cardrequisition);
    }

    /**
     * Show the form for editing the specified Cardrequisition.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cardrequisition = $this->cardrequisitionRepository->findWithoutFail($id);

        if (empty($cardrequisition)) {
            Flash::error('Cardrequisition not found');

            return redirect(route('cardrequisitions.index'));
        }

        return view('admin.cardrequisition.cardrequisitions.edit')->with('cardrequisition', $cardrequisition);
    }

    /**
     * Update the specified Cardrequisition in storage.
     *
     * @param  int              $id
     * @param UpdateCardrequisitionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCardrequisitionRequest $request)
    {
        $cardrequisition = $this->cardrequisitionRepository->findWithoutFail($id);

        

        if (empty($cardrequisition)) {
            Flash::error('Cardrequisition not found');

            return redirect(route('cardrequisitions.index'));
        }

        $cardrequisition = $this->cardrequisitionRepository->update($request->all(), $id);

        Flash::success('Cardrequisition updated successfully.');

        return redirect(route('admin.cardrequisition.cardrequisitions.index'));
    }

    /**
     * Remove the specified Cardrequisition from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.cardrequisition.cardrequisitions.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = Cardrequisition::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.cardrequisition.cardrequisitions.index'))->with('success', Lang::get('message.success.delete'));

       }

}
