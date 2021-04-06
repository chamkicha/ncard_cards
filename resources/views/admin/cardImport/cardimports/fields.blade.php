
<?php
use App\Models\Servicestatus\Servicestatus;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


function batch_no()
{   

              
    $batch_no = DB::table('cardimports')->orderBy('batch_no', 'desc')->first();
    
    if(is_null($batch_no)){

        $batch_no1 = 'BA_';

        $batch_no2 = 1000;
        $batch_no = $batch_no1.$batch_no2;

    }else{
        $batch_no = DB::table('cardimports')->orderBy('batch_no', 'desc')->first()->batch_no;
        $batch_no=substr($batch_no, -4);
        $batch_no2 = e($batch_no) + 1;
        $batch_no1 = 'BA_';

        $batch_no = $batch_no1.$batch_no2;
    }
        return $batch_no;
} 

function status()
{   

              
    $status = DB::table('cardstatuss')->where('status_name', 'New')->first()->status_name;

    return $status;
    
}

function received_by()
{

    
        $received_by = Sentinel::getUser()['first_name'];
        $received_by2 = Sentinel::getUser()['last_name'];
        $received_by3 =' ';
        $received_by =$received_by.$received_by3.$received_by2;
        return $received_by;
}


?>



    <div class="col-md-12 col-lg-6 col-sm-12 col-12">
        <!--lg-6 starts-->
        <!--basic form starts-->
        <div class="my-3">
        <div class="card " id="hidepanel1">

            <div class="card-body">
                        <!-- Name input-->
                        
                        <!-- Order Number Field -->

                        <div class="form-group">
                            <div class="row">
                            <label class="col-md-3 col-lg-3 col-12 control-label" for="name">Order Number</label>
                            <div class="col-md-9 col-lg-9 col-12">
                                <input id="order_number" name="order_number" type="text" placeholder="Order Number" class="form-control" ></div>
                        </div>
                        </div>

                        <!-- Receive Date Field -->
                        <div class="form-group">
                            <div class="row">
                            <label class="col-md-3 col-lg-3 col-12 control-label" for="email">Receive Date</label>
                            <div class="col-md-9 col-lg-9 col-12">
                                <input id="receive_date" name="receive_date" type="date" class="form-control"></div>
                        </div>
                        </div>

                        <!-- Message body -->
                        <div class="form-group">
                            <div class="row">
                            <label class="col-md-3 col-lg-3 col-12 control-label" for="message">Your Comment</label>
                            <div class="col-md-9 col-lg-9 col-12">
                                <textarea class="form-control resize_vertical" id="import_comment" name="import_comment" placeholder="Please enter your comment here..." rows="5"></textarea>
                            </div>
                        </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                            <label class="col-md-3 col-lg-3 col-12 control-label" for="upload">File Upload</label>
                            <div class="col-md-9 col-12 col-lg-9">
                                <div class="input-group image-preview">
                                    <input type="file" id="file" name="file">
                                </div><!-- /input-group image-preview [TO HERE]-->
                            </div>
                            </div>
                        </div>

                        

                        <!-- Submit Field -->
                        <div class="form-group col-sm-12 text-center">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                            <a href="{!! route('admin.cardImport.cardimports.index') !!}" class="btn btn-secondary">Cancel</a>
                        </div>

                
                </div>
            </div>
            </div>
    </div>






<!-- Batch No Field -->
<div class="form-group col-sm-12"> 
        
    <input type="hidden" id="batch_no" name="batch_no" class="form-control" value = "{{batch_no()}}">
    
</div>


<!-- Status Field -->
<div class="form-group col-sm-12"> 
        
    <input type="hidden" id="status" name="status" class="form-control" value = "{{status()}}">
    
</div>


<!-- received by Field -->
<div class="form-group col-sm-12"> 
        
    <input type="hidden" id="received_by" name="received_by" class="form-control" value = "{{received_by()}}">
    
</div>