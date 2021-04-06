<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $cardrequisitionStatus->id !!}</p>
    <hr>
</div>

<!-- Cardrequisition  Status  Name Field -->
<div class="form-group">
    {!! Form::label('cardrequisition__status__name', 'Cardrequisition  Status  Name:') !!}
    <p>{!! $cardrequisitionStatus->cardrequisition__status__name !!}</p>
    <hr>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{!! $cardrequisitionStatus->description !!}</p>
    <hr>
</div>

