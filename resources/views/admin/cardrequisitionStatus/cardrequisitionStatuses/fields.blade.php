<!-- Cardrequisition  Status  Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('cardrequisition__status__name', 'Cardrequisition  Status  Name:') !!}
    {!! Form::text('cardrequisition__status__name', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.cardrequisitionStatus.cardrequisitionStatuses.index') !!}" class="btn btn-secondary">Cancel</a>
</div>
