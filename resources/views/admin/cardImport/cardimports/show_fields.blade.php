<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $cardimport->id !!}</p>
    <hr>
</div>

<!-- Card Number Field -->
<div class="form-group">
    {!! Form::label('card_number', 'Card Number:') !!}
    <p>{!! $cardimport->card_number !!}</p>
    <hr>
</div>

<!-- Card U I D Field -->
<div class="form-group">
    {!! Form::label('card_u_i_d', 'Card U I D:') !!}
    <p>{!! $cardimport->card_u_i_d !!}</p>
    <hr>
</div>

<!-- Order Number Field -->
<div class="form-group">
    {!! Form::label('order_number', 'Order Number:') !!}
    <p>{!! $cardimport->order_number !!}</p>
    <hr>
</div>

<!-- Batch No Field -->
<div class="form-group">
    {!! Form::label('batch_no', 'Batch No:') !!}
    <p>{!! $cardimport->batch_no !!}</p>
    <hr>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>
    
                
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
            
    
    </p>
    <hr>
</div>

<!-- Receive Date Field -->
<div class="form-group">
    {!! Form::label('receive_date', 'Receive Date:') !!}
    <p>{!! $cardimport->receive_date !!}</p>
    <hr>
</div>

<!-- Attachment Field -->
<div class="form-group">
    {!! Form::label('attachment', 'Attachment:') !!}
    <p>{!! $cardimport->attachment !!}</p>
    <hr>
</div>

