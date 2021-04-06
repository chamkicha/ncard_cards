<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use DB;
use Illuminate\Support\Facades\Http;

class CardsApproveController extends Controller
{
    public function cardsapprove(Request $request)
    {   
//dd($request);
            // if  manager verify
        if($request->next_handler_role_id==='3' && $request->req_status==='verified')
        {

            
                $nexthandler = DB::table('role_users')->where('role_id','5')->get();
                $nexthandler = DB::table('users')->where('id',$nexthandler[0]->user_id)->get();
                $nexthandler_role = $nexthandler[0]->id;
                $nexthandler_role_id = '5';
                $prevhandler_role = DB::table('role_users')->where('role_id','3')->get();
                $prevhandler_role = DB::table('users')->where('id',$prevhandler_role[0]->user_id)->get();
                $prevhandler_role = $prevhandler_role[0]->id;
                $prevhandler_role_id = '3';
                $nexthandler1 = $nexthandler[0]->first_name;
                $nexthandler2 = $nexthandler[0]->last_name;
                $nexthandler3 = ' ';
                $nexthandler = $nexthandler1.$nexthandler3.$nexthandler2;
                
                $servicestatus = DB::table('cardrequisitions')->where('cardrequisition_no', $request->cardrequisition_no)
                ->update(['next_handler' => $nexthandler, 
                          'next_handler_role_id' => $nexthandler_role_id, 
                          'cardrequisition_status' => 'verified', 
                          'prev_handler_role_id' => $prevhandler_role_id]);
            
                
            // comment installation
            $comment= $request->comment;
            $username= Sentinel::getUser()->first_name;
            $comment_insert = DB::table('commentss')
            ->insert(['comment' => $comment, 'cardrequisition_no' => $request->cardrequisition_no, 'username' => $username]);
        

            return redirect(route('admin.cardrequisition.cardrequisitions.index'))->with('success', 'Request successfull Verified and Sent to Finance Department');


        }  // if manager aprove END


        // if  finance aprove
    elseif($request->next_handler_role_id==='5' && $request->req_status==='approved')
    {

        //dd($request);
            $nexthandler = DB::table('role_users')->where('role_id','6')->get();
            $nexthandler = DB::table('users')->where('id',$nexthandler[0]->user_id)->get();
            $nexthandler_role = $nexthandler[0]->id;
            $nexthandler_role_id = '6';
            $prevhandler_role = DB::table('role_users')->where('role_id','5')->get();
            $prevhandler_role = DB::table('users')->where('id',$prevhandler_role[0]->user_id)->get();
            $prevhandler_role = $prevhandler_role[0]->id;
            $prevhandler_role_id = '5';
            $nexthandler1 = $nexthandler[0]->first_name;
            $nexthandler2 = $nexthandler[0]->last_name;
            $nexthandler3 = ' ';
            $nexthandler = $nexthandler1.$nexthandler3.$nexthandler2;
            
            $servicestatus = DB::table('cardrequisitions')->where('cardrequisition_no', $request->cardrequisition_no)
            ->update(['next_handler' => $nexthandler, 
                      'next_handler_role_id' => $nexthandler_role_id, 
                      'cardrequisition_status' => 'approved', 
                      'prev_handler_role_id' => $prevhandler_role_id]);
        
            
        // comment installation
        $comment= $request->comment;
        $username= Sentinel::getUser()->first_name;
        $comment_insert = DB::table('commentss')
        ->insert(['comment' => $comment, 'cardrequisition_no' => $request->cardrequisition_no, 'username' => $username]);
    

        return redirect(route('admin.cardrequisition.cardrequisitions.index'))->with('success', 'Request successfull Approved and Sent to Store Department');


    }  // if finance aprove END

    
        // if  store aprove
        elseif($request->next_handler_role_id==='6' && $request->req_status==='issued')
        {
    
            //dd($request);
                $nexthandler = DB::table('role_users')->where('role_id','4')->get();
                $nexthandler = DB::table('users')->where('id',$nexthandler[0]->user_id)->get();
                $nexthandler_role = $nexthandler[0]->id;
                $nexthandler_role_id = '4';
                $prevhandler_role = DB::table('role_users')->where('role_id','6')->get();
                $prevhandler_role = DB::table('users')->where('id',$prevhandler_role[0]->user_id)->get();
                $prevhandler_role = $prevhandler_role[0]->id;
                $prevhandler_role_id = '6';
                $nexthandler1 = $nexthandler[0]->first_name;
                $nexthandler2 = $nexthandler[0]->last_name;
                $nexthandler3 = ' ';
                $nexthandler = $nexthandler1.$nexthandler3.$nexthandler2;
                
                $servicestatus = DB::table('cardrequisitions')->where('cardrequisition_no', $request->cardrequisition_no)
                ->update(['next_handler' => $nexthandler, 
                          'next_handler_role_id' => $nexthandler_role_id, 
                          'cardrequisition_status' => 'issued', 
                          'prev_handler_role_id' => $prevhandler_role_id]);
            
                
            // comment installation
            $comment= $request->comment;
            $username= Sentinel::getUser()->first_name;
            $comment_insert = DB::table('commentss')
            ->insert(['comment' => $comment, 'cardrequisition_no' => $request->cardrequisition_no, 'username' => $username]);
        
    
            return redirect(route('admin.cardrequisition.cardrequisitions.index'))->with('success', 'Request successfull Approved and Sent to Store Department');
    
    
        }  // if store issue END

    
        // if  sales  deliuver
        elseif($request->next_handler_role_id==='4' && $request->req_status==='delivered')
        {
    
            //dd($request);
                $nexthandler = DB::table('role_users')->where('role_id','4')->get();
                $nexthandler = DB::table('users')->where('id',$nexthandler[0]->user_id)->get();
                $nexthandler_role = $nexthandler[0]->id;
                $nexthandler_role_id = '4';
                $prevhandler_role = DB::table('role_users')->where('role_id','4')->get();
                $prevhandler_role = DB::table('users')->where('id',$prevhandler_role[0]->user_id)->get();
                $prevhandler_role = $prevhandler_role[0]->id;
                $prevhandler_role_id = '4';
                $nexthandler1 = $nexthandler[0]->first_name;
                $nexthandler2 = $nexthandler[0]->last_name;
                $nexthandler3 = ' ';
                $nexthandler = $nexthandler1.$nexthandler3.$nexthandler2;
                
                $servicestatus = DB::table('cardrequisitions')->where('cardrequisition_no', $request->cardrequisition_no)
                ->update(['next_handler' => $nexthandler, 
                          'next_handler_role_id' => $nexthandler_role_id, 
                          'cardrequisition_status' => 'delivered', 
                          'prev_handler_role_id' => $prevhandler_role_id]);
            
                
            // comment installation
            $comment= $request->comment;
            $username= Sentinel::getUser()->first_name;
            $comment_insert = DB::table('commentss')
            ->insert(['comment' => $comment, 'cardrequisition_no' => $request->cardrequisition_no, 'username' => $username]);
        
            // card status change
            $card_status = DB::table('cardimports')->where('assigned_refNo', $request->assigned_refNo)
            ->update(['status' => 'assigned', 
            'assigned_to' => $request->vendor_no]);

            // send to ncards
            $batch_number = DB::table('cardimports')
                                ->where('assigned_refNo', $request->assigned_refNo)
                                ->first()
                                ->batch_no;
            $date = $request->delivered_date;
            $vendor = $request->vendor_no;
            $cards = DB::table('cardimports')
                        ->where('assigned_refNo', $request->assigned_refNo)
                        ->get();
            
            foreach($cards as $cardsno)
            {
                $cardnumber[] = $cardsno->card_number;
                $card_number= str_replace(' ','',$cardnumber);
                $carduid[] = $cardsno->card_u_i_d;
                $card_details = array (
                    "card_number" => $card_number,
                    "card_uid" => $carduid,

                );

            }


            $batch_data= array (
                "batch_number" => $batch_number,
                "date" => $date,
                "vendor" => $vendor,
                "cards" => $cards

            );

            $response = Http::post('http://41.59.225.82:8090/api/card-management/send-batch-data', [
                
                "batch_number" => $batch_number,
                "date" => $date,
                "vendor" => $vendor,
                "cards" => $card_details
            ]);

            //dd($batch_data);
                     
    
            return redirect(route('admin.cardrequisition.cardrequisitions.index'))->with('success', 'Cards successfull Delivered to client and Sent to N-CARD');
    
    
        }  // if store issue END


    }
}
