<!--begin::Search Form-->
<div class="mb-7">
    <div class="row align-items-center">
        <div class="col-lg-12 col-xl-12">
            <div class="row align-items-center">
                <div class="col-md-12 my-md-0">
                    {!! Form::open(['route' => 'adminPanel.individualTrainings.index', 'method' => 'GET']) !!}
                    <div class="row">

                        <!-- status Field -->
                        <div class="form-group col-sm-4">
                            {!! Form::label('status', __('lang.status') . ':') !!}
                            {!! Form::select('status', \App\Models\Follow::status_types(), null, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.status'),
                            ]) !!}
                        </div>

                        <!-- from Field -->
                        <div class="form-group col-sm-4">
                            {!! Form::label('from', __('lang.from') . ':') !!}
                            {!! Form::date('from', request('from') ?? null, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.from'),
                            ]) !!}
                        </div>

                        <!-- to Field -->
                        <div class="form-group col-sm-4">
                            {!! Form::label('to', __('lang.to') . ':') !!}
                            {!! Form::date('to', request('to') ?? null, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.to'),
                            ]) !!}
                        </div>

                        <!-- pagination Field -->
                        <div class="form-group col-sm-4">
                            {!! Form::label('pagination', __('crud.pagination') . ':') !!}
                            {!! Form::select('pagination', config('statusSystem.pagination'), request('pagination') ?? null, [
                                'class' => 'form-control',
                            ]) !!}
                        </div>


                        <!-- Submit Field -->
                        <div class="form-group col-sm-4">
                            {!! Form::label('user_id', __('crud.action') . ':') !!} <br>
                            {!! Form::submit(__('crud.search'), ['class' => 'btn btn-light-success']) !!}
                            <a href="{{ route('adminPanel.individualTrainings.index') }}"
                                class="btn btn-light-danger font-weight-bold">@lang('crud.reset')</a>
                            <button type="button" class="btn btn-light-primary font-weight-bold"
                                id="exportButton">@lang('crud.export')</button>
                        </div>

                        <div class="form-group col-sm-12">
                            @error('export_rows')
                                <h1 class="text-danger">
                                    @lang('lang.select_to_export', ['model' => __('models/individualTrainings.plural')])
                                </h1>
                            @enderror
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
</div>
<!--end::Search Form-->

<!--begin: Datatable-->
<table class="table table-bordered table-hover" id="kt_datatableasd">
    <thead>
        <tr>
            <th>
                <label class="checkbox">
                    <input type="checkbox" class="check_inputs control-input" value=".inputs-permmission">
                    <span></span>
                </label>
            </th>
            <th>@lang('lang.user')</th>
            <th>@lang('models/individualTrainings.fields.full_name')</th>
            <th>@lang('models/individualTrainings.fields.country_code')</th>
            <th>@lang('models/individualTrainings.fields.phone')</th>
            <th>@lang('models/individualTrainings.fields.email')</th>
            <th>@lang('lang.status')</th>
            <th>@lang('models/individualTrainings.fields.attachment_letter')</th>
            <th>@lang('crud.action')</th>
        </tr>
    </thead>
    <tbody>
        {!! Form::open(['route' => ['adminPanel.data.export', 'individualTrainings'], 'id' => 'export-data']) !!}
        @foreach ($individualTrainings as $individualTraining)
            <tr>
                <td>
                    <label class="checkbox">
                        <input type="checkbox" class="check_inputs inputs-permmission control-input"
                            value="{{ $individualTraining->id }}" name="export_rows[]">
                        <span></span>
                    </label>
                </td>
                <td>
                    @if ($individualTraining->user)
                        <a href="{{ route('adminPanel.users.show', $individualTraining->user->id) }}">
                            {{ $individualTraining->user->full_name }}
                        </a>
                    @else
                        {{ __('lang.guest') }}
                    @endif
                </td>
                <td>{{ $individualTraining->full_name }}</td>
                <td>{{ $individualTraining->country_code }}</td>
                <td>{{ $individualTraining->phone }}</td>
                <td>{{ $individualTraining->email }}</td>
                <td>{{ $individualTraining->status_text }}</td>
                <td>
                    <a href="{{ $individualTraining->attachment_letter }}" target="_blank"
                        class="btn btn-sm btn-primary">@lang('lang.open_file')</a>
                </td>
                <td>
                    {{-- {!! Form::open(['route' => ['adminPanel.individualTrainings.destroy', $individualTraining->id], 'method' => 'delete']) !!} --}}
                    <div class='btn btn-sm-group'>
                        @can('individualTrainings view')
                            <a href="{{ route('adminPanel.individualTrainings.show', [$individualTraining->id]) }}"
                                class='btn btn-sm btn-shadow mx-1 btn-transparent-success'>
                                <i class="fa fa-eye"></i>
                            </a>
                        @endcan
                        {{-- @can('individualTrainings edit')
                            <a href="{{ route('adminPanel.individualTrainings.edit', [$individualTraining->id]) . '?languages=en' }}"
                                class='btn btn-sm btn-shadow mx-1 btn-transparent-primary'>
                                <i class="fa fa-edit"></i>
                            </a>
                        @endcan --}}
                        @can('individualTrainings destroy')
                            {{-- {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-shadow mx-1 btn-transparent-danger', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!} --}}
                            <button type="button" class="btn btn-sm btn-shadow mx-1 btn-transparent-danger"
                                data-toggle="modal" data-target="#country-{{ $individualTraining->id }}-modal">
                                <i class="fa fa-trash"></i>
                            </button>
                        @endcan
                    </div>
                    {{-- {!! Form::close() !!} --}}
                </td>
            </tr>
        @endforeach
        <tr>
            <td class="h2 p-5">@lang('lang.total')</td>
            <td class="h1 text-success text-bold" colspan="3">{{ $individualTrainings->count() }}</td>
        </tr>
        {!! Form::close() !!}
    </tbody>
</table>
<!--end: Datatable-->

@can('individualTrainings destroy')
    @foreach ($individualTrainings as $individualTraining)
        <!-- Modal -->
        <div class="modal fade" id="country-{{ $individualTraining->id }}-modal" tabindex="-1" role="dialog"
            aria-labelledby="country-{{ $individualTraining->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <h2 class="text-danger">
                            @lang('crud.are_you_sure')
                        </h2>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('crud.close')</button>
                        {!! Form::open([
                            'route' => ['adminPanel.individualTrainings.destroy', $individualTraining->id],
                            'method' => 'delete',
                        ]) !!}
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-transparent-danger']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endcan
