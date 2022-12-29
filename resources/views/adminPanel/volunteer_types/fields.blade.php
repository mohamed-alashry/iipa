<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/volunteerTypes.fields.name').':') !!}
    {!! Form::text('name', isset($volunteerType)? $volunteerType->name ??'' : '', ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('adminPanel.volunteerTypes.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
