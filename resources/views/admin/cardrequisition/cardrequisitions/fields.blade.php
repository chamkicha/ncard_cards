
<?php
use App\Models\Servicestatus\Servicestatus;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


function cardrequisition_no()
{   

              
    $cardrequisition_no = DB::table('cardrequisitions')->orderBy('cardrequisition_no', 'desc')->first();
    
    if(is_null($cardrequisition_no)){

        $cardrequisition_no1 = 'RQ_';

        $cardrequisition_no2 = 1000;
        $cardrequisition_no = $cardrequisition_no1.$cardrequisition_no2;

    }else{
        $cardrequisition_no = DB::table('cardrequisitions')->orderBy('cardrequisition_no', 'desc')->first()->cardrequisition_no;
        $cardrequisition_no=substr($cardrequisition_no, -4);
        $cardrequisition_no2 = e($cardrequisition_no) + 1;
        $cardrequisition_no1 = 'RQ_';

        $cardrequisition_no = $cardrequisition_no1.$cardrequisition_no2;
    }
        return $cardrequisition_no;
} 

function status()
{   

              
    $status = DB::table('cardstatuss')->where('status_name', 'New')->first()->status_name;

    return $status; 
    
}

function next_handler()
{   

              
    $next_handler = DB::table('role_users')->where('role_id', '3')->first()->user_id;
    $next_handler = DB::table('users')->where('id', $next_handler)->get();

    $nexthandler1 = $next_handler[0]->first_name;
    $nexthandler2 = $next_handler[0]->last_name;
    $nexthandler3 = ' ';
    $nexthandler = $nexthandler1.$nexthandler3.$nexthandler2;
    return $nexthandler;

    
}



function next_handler_role_id()
{   

              
    $next_handler_role_id = DB::table('role_users')->where('role_id', '3')->first()->role_id;
    

    return $next_handler_role_id; 
    
}



function created_by()
{

    
        $created_by = Sentinel::getUser()['first_name'];
        $created_by2 = Sentinel::getUser()['last_name'];
        $created_by3 =' ';
        $created_by =$created_by.$created_by3.$created_by2;
        return $created_by;
}

function cardrequisition_status()
{   

              
    $cardrequisition_status = DB::table('cardrequisitionstatuss')->where('id', '1')->first()->cardrequisition__status__name;

    return $cardrequisition_status; 
    
}


?>




    <div class="col-md-12 col-lg-6 col-sm-12 col-12">
        <!--lg-6 starts-->
        <!--basic form starts-->
        <div class="my-3">
        <div class="card " id="hidepanel1">

            <div class="card-body">
                        <!-- Name input-->
                        
                        <!-- Card requisition Date Field -->

                        <div class="form-group">
                            <div class="row">
                            <label class="col-md-3 col-lg-3 col-12 control-label" for="name">Requisition Date:</label>
                            <div class="col-md-9 col-lg-9 col-12">
                                <input id="cardrequisition_date" name="cardrequisition_date" type="date"  class="form-control" ></div>
                            </div>
                        </div>

                        <!-- Card Quantity Field -->

                        <div class="form-group">
                            <div class="row">
                            <label class="col-md-3 col-lg-3 col-12 control-label" for="name">Card Quantity:</label>
                            <div class="col-md-9 col-lg-9 col-12">
                                <input id="card_quantity" name="card_quantity" type="text"  class="form-control" placeholder="Enter Card Quantity" ></div>
                            </div>
                        </div>
                        


                        <!-- Card Requisition Description Field -->
                        <div class="form-group">
                            <div class="row">
                            <label class="col-md-3 col-lg-3 col-12 control-label" for="message">Card REquisition Description</label>
                            <div class="col-md-9 col-lg-9 col-12">
                                <textarea class="form-control resize_vertical" id="cardrequisition_description" name="cardrequisition_description" placeholder="Please enter your comment here..." rows="5"></textarea>
                            </div>
                        </div>
                        </div>

                        <!-- Vendor Name Field -->
                        <div class="form-group">
                            <div class="row">
                            <label class="col-md-3 col-lg-3 col-12 control-label" for="upload">Vendor Name</label>
                            <div class="col-md-9 col-12 col-lg-9">

                                    @foreach($vendor_list as $vendors_lists)
                                        <div class="checkbox mar-left5">
                                                <label for="form-checkbox1">
                                                    <input type="radio" id="vendor_no" name="vendor_no" value="{{$vendors_lists->vendor_name}}" class="square-blue"> {{$vendors_lists->vendor_name}}</label>
                                        </div>
                                    @endforeach
                            </div>
                            </div>
                        </div>



                        <!-- Submit Field -->
                        <div class="form-group col-sm-12 text-center">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                            <a href="{!! route('admin.cardrequisition.cardrequisitions.index') !!}" class="btn btn-secondary">Cancel</a>
                        </div>


                </div>
            </div>
            </div>
    </div>

<!-- Cardrequisition No Field -->
<div class="form-group col-sm-12"> 
        
    <input type="hidden" id="cardrequisition_no" name="cardrequisition_no" class="form-control" value = "{{cardrequisition_no()}}">
    
</div>

<!-- created by Field -->
<div class="form-group col-sm-12"> 
        
    <input type="hidden" id="created_by" name="created_by" class="form-control" value = "{{created_by()}}">
    
</div>

<!-- Next Handler Field -->
<div class="form-group col-sm-12"> 
        
    <input type="hidden" id="next_handler" name="next_handler" class="form-control" value = "{{next_handler()}}">
    
</div>


<!-- Next Handler Role ID Field -->
<div class="form-group col-sm-12"> 
        
    <input type="hidden" id="next_handler_role_id" name="next_handler_role_id" class="form-control" value = "{{next_handler_role_id()}}">
    
</div>


<!-- Cardrequisition Status Field -->
<div class="form-group col-sm-12"> 
        
    <input type="hidden" id="cardrequisition_status" name="cardrequisition_status" class="form-control" value = "{{cardrequisition_status()}}">
    
</div>




