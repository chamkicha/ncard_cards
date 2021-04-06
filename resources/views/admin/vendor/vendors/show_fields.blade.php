<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $vendor->id !!}</p>
    <hr>
</div>

<!-- Vendor Name Field -->
<div class="form-group">
    {!! Form::label('vendor_name', 'Vendor Name:') !!}
    <p>{!! $vendor->vendor_name !!}</p>
    <hr>
</div>

<!-- Vendor Id Field -->
<div class="form-group">
    {!! Form::label('vendor_id', 'Vendor Id:') !!}
    <p>{!! $vendor->vendor_id !!}</p>
    <hr>
</div>

<!-- Cards Assigned Field -->
<div class="form-group">
    {!! Form::label('cards_assigned', 'Cards Assigned:') !!}
    <p>{!! $vendor->cards_assigned !!}</p>
    <hr>
</div>

<!-- Vendor Status Field -->
<div class="form-group">
    {!! Form::label('vendor_status', 'Vendor Status:') !!}
    <p>{!! $vendor->vendor_status !!}</p>
    <hr>
</div>

