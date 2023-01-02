<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/consultings.fields.id') . ':') !!}
    <b>{{ $consulting->id }}</b>
</div>


<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/consultings.fields.name') . ':') !!}
    <b>{{ $consulting->name }}</b>
</div>


<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', __('models/consultings.fields.email') . ':') !!}
    <b>{{ $consulting->email }}</b>
</div>


<!-- Country Code Field -->
<div class="form-group">
    {!! Form::label('country_code', __('models/consultings.fields.country_code') . ':') !!}
    <b>{{ $consulting->country_code }}</b>
</div>


<!-- Phone Field -->
<div class="form-group">
    {!! Form::label('phone', __('models/consultings.fields.phone') . ':') !!}
    <b>{{ $consulting->phone }}</b>
</div>


<!-- Country Id Field -->
<div class="form-group">
    {!! Form::label('country_id', __('models/consultings.fields.country_id') . ':') !!}
    <b>{{ $consulting->country->name ?? '' }}</b>
</div>


<!-- Job Id Field -->
<div class="form-group">
    {!! Form::label('job_id', __('models/consultings.fields.job_id') . ':') !!}
    <b>{{ $consulting->job->name ?? '' }}</b>
</div>


<!-- Consultant Type Id Field -->
<div class="form-group">
    {!! Form::label('consultant_type_id', __('models/consultings.fields.consultant_type_id') . ':') !!}
    <b>{{ $consulting->consultant_type->name ?? '' }}</b>
</div>


<!-- Type Field -->
<div class="form-group">
    {!! Form::label('type', __('models/consultings.fields.type') . ':') !!}
    <b>{{ $consulting->type }}</b>
</div>


<!-- Date Of Birth Field -->
<div class="form-group">
    {!! Form::label('date_of_birth', __('models/consultings.fields.date_of_birth') . ':') !!}
    <b>{{ $consulting->date_of_birth }}</b>
</div>


<!-- Fav Lang Field -->
<div class="form-group">
    {!! Form::label('fav_lang', __('models/consultings.fields.fav_lang') . ':') !!}
    <b>{{ $consulting->fav_lang }}</b>
</div>


<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', __('models/consultings.fields.description') . ':') !!}
    <b>{{ $consulting->description }}</b>
</div>


<!-- Attachment Letter Field -->
<div class="form-group">
    {!! Form::label('attachment_letter', __('models/consultings.fields.attachment_letter') . ':') !!}
    <a href="{{ $consulting->attachment_letter }}" target="_blank" class="btn btn-sm btn-primary">@lang('lang.open_file')</a>
</div>


<!-- Gender Field -->
<div class="form-group">
    {!! Form::label('gender', __('models/consultings.fields.gender') . ':') !!}
    <b>{{ $consulting->gender }}</b>
</div>


<!-- Nationality Field -->
<div class="form-group">
    {!! Form::label('nationality', __('models/consultings.fields.nationality') . ':') !!}
    <b>{{ $consulting->nationality }}</b>
</div>


<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/consultings.fields.created_at') . ':') !!}
    <b>{{ $consulting->created_at }}</b>
</div>


<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/consultings.fields.updated_at') . ':') !!}
    <b>{{ $consulting->updated_at }}</b>
</div>
