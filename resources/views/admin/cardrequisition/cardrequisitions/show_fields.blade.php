<form action="{{ route('cardsapprove') }}" method = "post"><!-- form add -->
    {{ csrf_field() }}

    <section class="content pl-3 pr-3">
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-tabs ">
                    <li class=" nav-item ">
                        <a href="#tab1" data-toggle="tab" class="nav-link active">Rquest Details</a>
                    </li>
                    <li class="nav-item">
                        <a href="#tab2" data-toggle="tab" class="nav-link">Cards List</a>
                    </li>
                    <li class="nav-item">
                        <a href="#tab3" data-toggle="tab" class="nav-link">Actions</a>
                    </li>
                </ul>
                <div class="tab-content mar-top">
                    <div id="tab1" class="tab-pane fade  show active" role="tabpanel">
                        <br>
                        <!-- Customer Name Field -->
                        <div class="form-group">
                            <div class="row">
                               <div class="col-mod-6">
                               
                            <table>

                                
                                @foreach( $vendor_details as $value)
                                    <tr>
                                    <td><strong>Vendor Name:</strong></td>
                                    <td>{{$value->vendor_name}}</td>
                                    </tr>

                                    <tr>
                                    <td><strong>Vendor Description:</strong></td>
                                    <td>{{$value->vendor_description}}</td>
                                    </tr>

                                    <tr>
                                    <td><strong>Vendor Id:</strong></td>
                                    <td>{{$value->vendor_id}}</td>
                                    </tr>

                                    <tr>
                                    <td><strong>Vendor Status:</strong></td>
                                    <td>
                                    
                                         @if ($value->vendor_status === 'Active')
                                            <span class="label label-sm bg-primary text-white">{!! $value->vendor_status !!}</span>
                                        
                                        @elseif ($value->vendor_status === 'Suspended')
                                            <span class="label label-sm bg-warning text-white   ">{!! $value->vendor_status !!}</span>
                                        
                                      
                                        @elseif ($value->vendor_status === 'Inactive')
                                            <span class="label label-sm bg-danger text-white   ">{!! $value->vendor_status !!}</span>
                                        @endif
                                    
                                    
                                    </td>
                                    </tr>

                                    
                                    <tr>
                                    <td><strong>Total Cards Asigned:</strong></td>
                                    <td>{{$value->cards_assigned}}</td>
                                    </tr>

       

                                @endforeach

                            </table>
                               </div>

                               <div class="col-mod-6" style="padding-left: 20px;">
                               
                            <table>

                                
                                @foreach( $vendor_details as $value)
                                    <tr>
                                    <td><strong>Total Cards Requested:</strong></td>
                                    <td>{{$cardrequisition->card_quantity}}</td>
                                    </tr>

                                    <tr>
                                    <td><strong>Cardrequisition Date:</strong></td>
                                    <td>{{$cardrequisition->cardrequisition_date}}</td>
                                    </tr>

                                    <tr>
                                    <td><strong>Requested By:</strong></td>
                                    <td>{{$cardrequisition->created_by}}</td>
                                    </tr>

                                    <tr>
                                    <td><strong>Next Handler Field:</strong></td>
                                    <td>{{$cardrequisition->next_handler }}</td>
                                    </tr>

                                    <tr>
                                    <td><strong>Request Status:</strong></td>
                                    <td>

                                    
                                        @if ($cardrequisition->cardrequisition_status === 'Requested')
                                            <span class="label label-sm bg-warning text-white">{!! $cardrequisition->cardrequisition_status !!}</span>
                                        
                                        @elseif ($cardrequisition->cardrequisition_status === 'verified')
                                            <span class="label label-sm bg-warning text-white   ">{!! $cardrequisition->cardrequisition_status !!}</span>
                                        
                                        @elseif ($cardrequisition->cardrequisition_status === 'approved')
                                            <span class="label label-sm bg-success text-white   ">{!! $cardrequisition->cardrequisition_status !!}</span>
                                        
                                        @elseif ($cardrequisition->cardrequisition_status === 'issued')
                                            <span class="label label-sm bg-success text-white   ">{!! $cardrequisition->cardrequisition_status !!}</span>
                                        
                                        @elseif ($cardrequisition->cardrequisition_status === 'delivered')
                                            <span class="label label-sm bg-primary text-white   ">{!! $cardrequisition->cardrequisition_status !!}</span>
                                        
                                        @elseif ($cardrequisition->cardrequisition_status === 'canceled')
                                            <span class="label label-sm bg-danger text-white   ">{!! $cardrequisition->cardrequisition_status !!}</span>
                                        @endif
                                    
                                    
                                    
                                    </td>
                                    </tr>
                                    
       

                                @endforeach

                            </table>
                               </div>
                            </div>
                        </div>
                    
                    </div>

                    <div id="tab2" class="tab-pane fade" role="tabpanel">
                            <br>
                            
                            
                    
                        <table class="table table-bordered table-hover" style="width: 90%;">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Card Number</th>
                                <th>Card UID</th>
                            </tr>
                            </thead>
                            <tbody>
                            
                            @if($cards_details_count <= 10)

                                @foreach( $cards_details_asc->take(10) as $value)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$value->card_number}}</td>
                                    <td>{{$value->card_u_i_d}}</td>
                                </tr>
                                @endforeach

                            @else
                                    @foreach( $cards_details_asc->take(5) as $value)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$value->card_number}}</td>
                                        <td>{{$value->card_u_i_d}}</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td>.</td>
                                        <td>.... .... .... ....</td>
                                        <td>...........</td>
                                    </tr>
                                    <tr>
                                        <td>.</td>
                                        <td>.... .... .... ....</td>
                                        <td>...........</td>
                                    </tr>
                                    <tr>
                                        <td>.</td>
                                        <td>.... .... .... ....</td>
                                        <td>...........</td>
                                    </tr>

                                    @foreach( $cards_details_desc->take(5) as $value)
                                    <tr>
                                        <td>{{++$cards_details_count_minus}}</td>
                                        <td>{{$value->card_number}}</td>
                                        <td>{{$value->card_u_i_d}}</td>
                                    </tr>
                                    @endforeach

                              @endif
                            </tbody>
                        </table> 
                                

                    </div>

                    <div id="tab3" class="tab-pane fade" role="tabpanel">
                     <br>
                      {{--  comment begin  --}}
                     <div class="row">
                        <div class="col-md-6">
                        
                            <label for="inputContent" class=" control-label">Your Comment</label>
                            <div >
                                <textarea name="comment" id="inputContent" rows="3"
                                class="form-control resize_vertical "></textarea>
                            </div>
                            <br>
                            
                            <!-- Service Starting Date Field -->
                            @if (Sentinel::inRole('commercial-manager') && $cardrequisition->next_handler_role_id ==='3' && $serviceOrders['prev_handler_role_id']==='6'  && $serviceOrders['service_status']==='Inactive')
                            <div>
                                {!! Form::label('activation_date', 'Service Activation Date:') !!}
                                {!! Form::date('activation_date', null, ['class' => 'form-control']) !!}
                            </div>
                            @endif

                            <br>
                            {{--  finance document  --}}
                             @if (Sentinel::inRole('finance') && $cardrequisition->next_handler_role_id ==='5' && $cardrequisition->prev_handler_role_id ==='3')
                                    
                            <div >
                                <label class="c control-label" for="form-file-input">Supporting Document</label>
                                <div class=" pad-top20 ">
                                    <input type="file" id="finance_doc" name="finance_doc">
                                </div>
                            </div>
                            @endif
                            {{--  store document  --}}
                             @if (Sentinel::inRole('store') && $cardrequisition->next_handler_role_id ==='6' && $cardrequisition->prev_handler_role_id ==='5')
                                    
                            <div >
                                <label class="c control-label" for="form-file-input">Supporting Document</label>
                                <div class=" pad-top20 ">
                                    <input type="file" id="store_doc" name="store_doc">
                                </div>
                            </div>
                            @endif
                            {{--  sales document  --}}
                             @if (Sentinel::inRole('sales') && $cardrequisition->next_handler_role_id ==='4' && $cardrequisition->prev_handler_role_id ==='6')
                                    
                            <div >
                                <label class="c control-label" for="form-file-input">Delivered Date</label>
                                <div class=" pad-top20 ">
                                    <input type="date" id="delivered_date" name="delivered_date">
                                </div>
                            </div> 

                            <div >
                                <label class="c control-label" for="form-file-input">Supporting Document</label>
                                <div class=" pad-top20 ">
                                    <input type="file" id="sales_doc" name="sales_doc">
                                </div>
                            </div>
                            @endif

                            <br>
                            <div >
                                <label for="status">Change Service Status:</label>
                                <select id="req_status" name="req_status">
                                <option disabled selected value> -- select status -- </option>
                                
                                @if (Sentinel::inRole('manager') && $cardrequisition->next_handler_role_id ==='3' && $cardrequisition->prev_handler_role_id===null)
                                    <option value="verified">Verify</option>
                                        <option value="cancelled">Cancel</option>
                                @elseif (Sentinel::inRole('finance') && $cardrequisition->next_handler_role_id ==='5' && $cardrequisition->prev_handler_role_id ==='3')
                                    <option value="approved">Approve</option>
                                    <option value="cancelled">Cancel</option>
                                @elseif (Sentinel::inRole('store') && $cardrequisition->next_handler_role_id ==='6' && $cardrequisition->prev_handler_role_id ==='5')
                                    <option value="issued">Issue</option>
                                    <option value="cancelled">Cancel</option>
                                @elseif (Sentinel::inRole('sales') && $cardrequisition->next_handler_role_id ==='4' && $cardrequisition->prev_handler_role_id ==='6')
                                    <option value="delivered">Deliver</option>
                                    <option value="cancelled">Cancel</option>
                                @elseif (Sentinel::inRole('admin'))
                                    <option value="verified">Verify</option>
                                    <option value="approve">Approve</option>
                                    <option value="issued">Issue</option>
                                    <option value="delivered">Deliver</option>
                                    <option value="cancelled">Cancel</option>
                                @endif
                                </select>
                            </div>
                            <br>




                        </div>

                        <div class="col-md-6">
                        
                                <div id="container3">
                                    <ul>
                                        <li data-jstree='{"opened":true}'><strong>Previous Comment</strong>
                                        
                                            <ul>
                                          @foreach( $cards_comments as $value)

                                                <li><strong>{{$value->username}}:</strong> {{$value->comment}}</li>
                                          @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                    
                        </div>  

                    </div>
                   


                    <br>

<!-- next handler -->
<div class="form-group col-sm-12">
    <input type="hidden" id="next_handler"name="next_handler" class="form-control" value = "{{$cardrequisition->next_handler}}">
</div>

<!-- vendor_no name -->
<div class="form-group col-sm-12">
    <input type="hidden" id="vendor_no"name="vendor_no" class="form-control" value = "{{$cardrequisition->vendor_no}}">
</div>


<!-- next handler role id  -->
<div class="form-group col-sm-12">
    
    <input type="hidden" id="next_handler_role_id" name="next_handler_role_id" class="form-control" value = "{{$cardrequisition->next_handler_role_id}}">
    
</div>


<!-- card ref number  -->
<div class="form-group col-sm-12">
    
    <input type="hidden" id="assigned_refNo" name="assigned_refNo" class="form-control" value = "{{$cardrequisition->assigned_refNo}}">
    
</div>

<!-- prev handler id -->
<div class="form-group col-sm-12">
    
    <input type="hidden" id="prev_handler_role_id" name="prev_handler_role_id" class="form-control" value = "{{$cardrequisition->prev_handler_role_id}}">
    
</div>

<!-- cardrequisition_no ID -->
<div class="form-group col-sm-12">
    <input type="hidden" id="cardrequisition_no"name="cardrequisition_no" class="form-control" value = "{{$cardrequisition->cardrequisition_no}}">
</div>







<button type="submit" id=""name="" class="btn btn-success  waves-light" style="float: right;"><i class="icofont icofont-check-circled"></i>Save and Submit</button>
          

</form><!-- form add end -->

                    </div>
                </div>
            </div>
        </div>

    </section>

{{-- page level scripts --}}
@section('footer_scripts')
<!-- begining of page level js -->
<script src="{{ asset('vendors/jstree/js/jstree.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/pages/bootstrap-treeview.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendors/iCheck/js/icheck.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/pages/treeview_jstree.js') }}" type="text/javascript"></script>

@stop




