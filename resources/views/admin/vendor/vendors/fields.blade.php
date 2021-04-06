
<?php

function vendor_ids()
{   

              
    $vendor_id = DB::table('vendors')->orderBy('vendor_id', 'desc')->first();
    
    if(is_null($vendor_id)){

        $vendor_id1 = 'VN_';

        $vendor_id2 = 1000;
        $vendor_id= $vendor_id1.$vendor_id2;

    }else{
        $vendor_id = DB::table('vendors')->orderBy('vendor_id', 'desc')->first()->vendor_id;
        $vendor_id =substr($vendor_id, -4);
        $vendor_id2 = e($vendor_id) + 1;
        $vendor_id1 = 'VN_';

        $vendor_id = $vendor_id1.$vendor_id2;
    }
        return $vendor_id;
} 



?>


    <div class="col-md-12 col-lg-6 col-sm-12 col-12">
        <!--lg-6 starts-->
        <!--basic form starts-->
        <div class="my-3">
        <div class="card " id="hidepanel1">

            <div class="card-body">
                        <!-- Name input-->
                        
                        <!-- Vendor Name Field -->

                        <div class="form-group">
                            <div class="row">
                            <label class="col-md-3 col-lg-3 col-12 control-label" for="name">Vendor Name</label>
                            <div class="col-md-9 col-lg-9 col-12">
                                <input id="vendor_name" name="vendor_name" type="text" placeholder="Vendor Name" class="form-control" ></div>
                            </div>
                        </div>


                        <!-- Description Field -->
                        <div class="form-group">
                            <div class="row">
                            <label class="col-md-3 col-lg-3 col-12 control-label" for="message">Vendor Description</label>
                            <div class="col-md-9 col-lg-9 col-12">
                                <textarea class="form-control resize_vertical" id="vendor_description" name="vendor_description" placeholder="Please enter your comment here..." rows="5"></textarea>
                            </div>
                        </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                            <label class="col-md-3 col-lg-3 col-12 control-label" for="upload">Vendor Status</label>
                            <div class="col-md-9 col-12 col-lg-9">

                                    @foreach($status_list as $statues_lists)
                                        <div class="checkbox mar-left5">
                                                <label for="form-checkbox1">
                                                    <input type="radio" id="vendor_status" name="vendor_status" value="{{$statues_lists->status_name}}" class="square-blue"> {{$statues_lists->status_name}}</label>
                                        </div>
                                    @endforeach
                            </div>
                            </div>
                        </div>

                        <!-- Submit Field -->
                        <div class="form-group col-sm-12 text-center">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                            <a href="{!! route('admin.vendor.vendors.index') !!}" class="btn btn-secondary">Cancel</a>
                        </div>

                </div>
            </div>
            </div>
    </div>


<div class="form-group col-sm-12"> 
        
    <input type="hidden" id="vendor_id" name="vendor_id" class="form-control" value = "{{vendor_ids()}}">
    
</div>
