<!--begin::Search Form-->
<div class="mb-7">
    <div class="row align-items-center">
        <div class="col-lg-12 col-xl-12">
            <div class="row align-items-center">
                <div class="col-md-12 my-md-0">
                    {!! Form::open(['route' => 'adminPanel.partners.index', 'method' => 'GET']) !!}
                    <div class="row">

                        <!-- link Field -->
                        <div class="form-group col-sm-4">
                            {!! Form::label('link', __('models/partners.fields.link') . ':') !!}
                            {!! Form::text('link', request('link') ?? null, [
                                'class' => 'form-control',
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
                            <a href="{{ route('adminPanel.partners.index') }}"
                                class="btn btn-light-danger font-weight-bold">@lang('crud.reset')</a>
                            {{-- <button type="button" class="btn btn-light-primary font-weight-bold"
                                id="exportButton">@lang('crud.export')</button> --}}
                        </div>

                        <div class="form-group col-sm-12">
                            @error('export_rows')
                                <h1 class="text-danger">
                                    @lang('lang.select_to_export', ['model' => __('models/partners.plural')])
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
            <th>@lang('models/partners.fields.logo')</th>
            <th>@lang('models/partners.fields.link')</th>
            <th>@lang('crud.action')</th>
        </tr>
    </thead>
    <tbody>
        {!! Form::open(['route' => ['adminPanel.data.export', 'partners'], 'id' => 'export-data']) !!}
        @foreach ($partners as $partner)
            <tr>
                <td>
                    <label class="checkbox">
                        <input type="checkbox" class="check_inputs inputs-permmission control-input"
                            value="{{ $partner->id }}" name="export_rows[]">
                        <span></span>
                    </label>
                </td>
                <td> <img src="{{ $partner->logo }}" alt="{{ $partner->link }}" width="100"></td>
                <td>{{ $partner->link }}</td>
                <td>
                    {{-- {!! Form::open(['route' => ['adminPanel.partners.destroy', $partner->id], 'method' => 'delete']) !!} --}}
                    <div class='btn btn-sm-group'>
                        {{-- @can('partners view')
                            <a href="{{ route('adminPanel.partners.show', [$partner->id]) }}"
                                class='btn btn-sm btn-shadow mx-1 btn-transparent-success'>
                                <i class="fa fa-eye"></i>
                            </a>
                        @endcan --}}
                        @can('partners edit')
                            <a href="{{ route('adminPanel.partners.edit', [$partner->id]) . '?languages=en' }}"
                                class='btn btn-sm btn-shadow mx-1 btn-transparent-primary'>
                                <i class="fa fa-edit"></i>
                            </a>
                        @endcan
                        @can('partners destroy')
                            {{-- {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-shadow mx-1 btn-transparent-danger', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!} --}}
                            <button type="button" class="btn btn-sm btn-shadow mx-1 btn-transparent-danger"
                                data-toggle="modal" data-target="#country-{{ $partner->id }}-modal">
                                <i class="fa fa-trash"></i>
                            </button>
                        @endcan
                    </div>
                    {{-- {!! Form::close() !!} --}}
                </td>
            </tr>
        @endforeach
        {!! Form::close() !!}
    </tbody>
</table>
<!--end: Datatable-->

@can('partners destroy')
    @foreach ($partners as $partner)
        <!-- Modal -->
        <div class="modal fade" id="country-{{ $partner->id }}-modal" tabindex="-1" role="dialog"
            aria-labelledby="country-{{ $partner->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <h2 class="text-danger">
                            @lang('crud.are_you_sure')
                        </h2>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('crud.close')</button>
                        {!! Form::open(['route' => ['adminPanel.partners.destroy', $partner->id], 'method' => 'delete']) !!}
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-transparent-danger']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endcan
