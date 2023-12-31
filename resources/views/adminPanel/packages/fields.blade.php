<ul class="nav nav-light-success nav-pills" id="myTab" role="tablist">

    @foreach (config('langs') as $locale => $name)
        <li class="nav-item">
            <a class="nav-link {{ request('languages') == $locale ? 'active' : '' }}" id="{{ $name }}-tab"
                data-toggle="pill" href="#{{ $name }}" role="tab" aria-controls="{{ $name }}"
                aria-selected="{{ request('languages') == $locale ? 'true' : 'false' }}">{{ $name }}</a>
        </li>
    @endforeach
</ul>
<div class="tab-content mt-5" id="myTabContent">
    @foreach (config('langs') as $locale => $name)
        <div class="tab-pane fade {{ request('languages') == $locale ? 'show active' : '' }}" id="{{ $name }}"
            role="tabpanel" aria-labelledby="{{ $name }}-tab">
            <!-- name Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('name', __('models/packages.fields.name') . ':') !!}
                {!! Form::text($locale . '[name]', isset($package) ? $package->translate($locale)->name : '', [
                    'class' => 'form-control',
                    'placeholder' => $name . ' name',
                ]) !!}
            </div>

            <!-- note Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('note', __('models/packages.fields.note') . ':') !!}
                {!! Form::text($locale . '[note]', isset($package) ? $package->translate($locale)->note : '', [
                    'class' => 'form-control',
                    'placeholder' => $name . ' note',
                ]) !!}
            </div>

            <!-- description Field -->
            <div class="form-group col-sm-12">
                {!! Form::label('description', __('models/packages.fields.description') . ':') !!}
                {!! Form::textarea($locale . '[description]', isset($package) ? $package->translate($locale)->description : '', [
                    'class' => 'form-control',
                    'placeholder' => $name . ' description',
                ]) !!}
            </div>
            <script type="text/javascript">
                CKEDITOR.replace("{{ $locale . '[description]' }}", {
                    filebrowserUploadUrl: "{{ route('adminPanel.ckeditor.upload', ['_token' => csrf_token()]) }}",
                    filebrowserUploadMethod: 'form'
                });
            </script>

            <!-- fees name Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('name', __('models/packages.fields.fees_name') . ' 1:') !!}
                {!! Form::text("fees[0][name][$locale]", isset($package) ? $package->fees[0]['name'][$locale] : '', [
                    'class' => 'form-control',
                    'placeholder' => $name . ' fees name',
                ]) !!}
            </div>

            <!-- fees name Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('name', __('models/packages.fields.fees_name') . ' 2:') !!}
                {!! Form::text("fees[1][name][$locale]", isset($package) ? $package->fees[1]['name'][$locale] : '', [
                    'class' => 'form-control',
                    'placeholder' => $name . ' fees name',
                ]) !!}
            </div>

            <!-- fees name Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('name', __('models/packages.fields.fees_name') . ' 3:') !!}
                {!! Form::text("fees[2][name][$locale]", isset($package) ? $package->fees[2]['name'][$locale] : '', [
                    'class' => 'form-control',
                    'placeholder' => $name . ' fees name',
                ]) !!}
            </div>

        </div>
    @endforeach



    <!-- Fees Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('fees', __('models/packages.fields.fees_amount') . ' 1:') !!}
        {!! Form::number('fees[0][amount]', isset($package) ? $package->fees[0]['amount'] ?? '' : '', [
            'class' => 'form-control',
        ]) !!}
    </div>

    <!-- Fees Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('fees', __('models/packages.fields.fees_amount') . ' 2:') !!}
        {!! Form::number('fees[1][amount]', isset($package) ? $package->fees[1]['amount'] ?? '' : '', [
            'class' => 'form-control',
        ]) !!}
    </div>

    <!-- Fees Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('fees', __('models/packages.fields.fees_amount') . ' 3:') !!}
        {!! Form::number('fees[2][amount]', isset($package) ? $package->fees[2]['amount'] ?? '' : '', [
            'class' => 'form-control',
        ]) !!}
    </div>

    <!-- Office Fees Field -->
    {{-- <div class="form-group col-sm-6">
        {!! Form::label('office_fees', __('models/packages.fields.office_fees') . ':') !!}
        {!! Form::number('office_fees', isset($package) ? $package->office_fees ?? '' : '', ['class' => 'form-control']) !!}
    </div> --}}

    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('adminPanel.packages.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
    </div>

</div>
