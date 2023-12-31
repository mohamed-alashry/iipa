<!--begin::Search Form-->
<div class="mb-7">
    <div class="row align-items-center">
        <div class="col-lg-9 col-xl-8">
            <div class="row align-items-center">
                <div class="col-md-4 my-2 my-md-0">
                    <div class="input-icon">
                        <input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query" />
                        <span><i class="flaticon2-search-1 text-muted"></i></span>
                    </div>
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
            {{-- <th>@lang('models/paragraphs.fields.id')</th> --}}
            <th>@lang('models/paragraphs.fields.text')</th>
            <th>@lang('models/paragraphs.fields.page_id')</th>
            <th>@lang('crud.action')</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($paragraphs as $paragraph)
            <tr>
                {{-- {{dd($paragraph)}} --}}
                {{-- <td>{{ $paragraph->id }}</td> --}}
                <td>{!! $paragraph->text !!}</td>
                <td>{{ $paragraph->page->name }}</td>
                <td nowrap>

                    {!! Form::open(['route' => ['adminPanel.paragraphs.destroy', $paragraph->id], 'method' => 'delete']) !!}
                    <div class='btn btn-sm-group'>
                        {{-- @can('paragraphs view')
                    <a href="{{ route('adminPanel.paragraphs.show', [$paragraph->id]) }}" class='btn btn-sm btn-shadow mx-1 btn-transparent-success'><i class="fa fa-eye"></i></a>
                    @endcan --}}
                        @can('paragraphs edit')
                            <a href="{{ route('adminPanel.paragraphs.edit', [$paragraph->id]) }}"
                                class='btn btn-sm btn-shadow mx-1 btn-transparent-primary'><i class="fa fa-edit"></i></a>
                        @endcan
                        @can('paragraphs destroy')
                            {!! Form::button('<i class="fa fa-trash"></i>', [
                                'type' => 'submit',
                                'class' => 'btn btn-sm btn-shadow mx-1 btn-transparent-danger',
                                'onclick' => 'return confirm("' . __('crud.are_you_sure') . '")',
                            ]) !!}
                        @endcan
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<!--end: Datatable-->
