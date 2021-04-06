@extends('admin/layouts/default')

@section('title')
Cardimport
@parent
@stop

@section('content')
<section class="content-header">
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>Cardimports</li>
        <li class="active">Cardimport View</li>
    </ol>
</section>

<section class="content">
<div class="container">
    <div class="row">
      <div class="col-12">
       <div class="card border-primary">
                <div class="card-header bg-primary text-white">
                    <h4 class="card-title"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Cardimport details
                    </h4>
                </div>
                
    <div class="row">
      <div class="col-6">
                    <div class="card-body">
                    
                        <div class="container" style="  position: relative;text-align: center; color: white;">
                            <img src="{{ asset('images/ncard_front.png')}}" alt="Snow" style="width:100%;">
                            <div class="centered" style="position:absolute; top:78%; left:28%; transform:translate(-25%, -75%); ">
                            <p style="font-family: OCRAStd; font-size: 25px;">{!! $cardimport->card_number !!}</p>
                            </div>
                        </div>

                    </div>

      </div>
      <div class="col-6">
      <div class="card-body">
                    
                        <div class="container" style="  position: relative;text-align: center; color: white;">
                            <img src="{{ asset('images/ncard_back.png')}}" alt="Snow" style="width:100%;">
                            <div class="centered" style="position:absolute; top:60%; left:40%; transform:translate(-30%, -70%); ">
                            
                                <table>

                                <!-- Card Number Field -->
                                <tr>
                                    <td>{!! Form::label('card_number', 'Card Number:') !!}</td>
                                    <td>{!! $cardimport->card_number !!}</td>
                                </tr>

                                <!-- Card U I D Field -->
                                <tr>
                                    <td>{!! Form::label('card_u_i_d', 'Card U I D:') !!}</td>
                                    <td>{!! $cardimport->card_u_i_d !!}</td>
                                <tr>

                            
                                <!-- Batch No Field -->
                                <tr>
                                    <td>{!! Form::label('batch_no', 'Batch No:') !!}</td>
                                    <td>{!! $cardimport->batch_no !!}</td>
                                <tr>

                                <!-- Status Field -->
                                <tr>
                                    <td>{!! Form::label('status', 'Status:') !!}</td>
                                    <td>
                                    
                                    @if ($cardimport->status === 'New')
                                        <span class="label label-sm bg-warning text-white">{!! $cardimport->status !!}</span>
                                    
                                    @elseif ($cardimport->status === 'Assigned')
                                        <span class="label label-sm bg-warning text-white   ">{!! $cardimport->status !!}</span>
                                    
                                    @elseif ($cardimport->status === 'Active')
                                        <span class="label label-sm bg-success text-white   ">{!! $cardimport->status !!}</span>
                                    
                                    @elseif ($cardimport->status === 'Deactivated')
                                        <span class="label label-sm bg-success text-white   ">{!! $cardimport->status !!}</span>
                                    
                                    @elseif ($cardimport->status === 'Processing')
                                        <span class="label label-sm bg-danger text-white   ">{!! $cardimport->status !!}</span>
                                    @endif
                                    </td>
                                </tr>

                                
                                <!-- Receive Date Field -->
                                <tr>
                                    <td>{!! Form::label('receive_date', 'Receive Date:') !!}</td>
                                    <td>{!! $cardimport->receive_date !!}</td>
                                </tr>

                                
                                <!-- received_by Field -->
                                <tr>
                                    <td>{!! Form::label('received_by', 'Receive By:') !!}</td>
                                    <td>{!! $cardimport->received_by !!}</td>
                                </tr>

                                
                                <!-- Receive Date Field -->
                                <tr>
                                    <td>{!! Form::label('assigned_to', 'Assigned to:') !!}</td>
                                    <td>{!! $cardimport->assigned_to !!}</td>
                                </tr>

                                <!-- Receive Date Field -->
                                <tr>
                                    <td>{!! Form::label('user_phone_number', 'Phone Number:') !!}</td>
                                    <td>{!! $cardimport->user_phone_number !!}</td>
                                </tr>

                                </table>
                            </div>
                        </div>

                    </div>
      
                        {{--  @include('admin.cardImport.cardimports.show_fields')  --}}
      
      </div>
    </div>
                    
                </div>

    <div class="form-group">
           <a href="{!! route('admin.cardImport.cardimports.index') !!}" class="btn btn-warning mt-2">Back</a>
    </div>
     </div>
     </div>
  </div>

</section>

@stop
  <style type="text/css">
    @font-face {
        font-family: OCRAStd;
        src: src: url('{{ asset('webfonts/OCRAStd.otf') }}');
    }
</style>


