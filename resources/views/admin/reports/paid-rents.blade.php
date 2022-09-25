@extends('layouts.admin')
@section('content')
{{--    @can('event_create')--}}
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <form action="{{ route("show-paid-rents") }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                        <label for="description">Month*</label>
                        <input type="month" rows="1" id="month" name="month" class="form-control" required value="{{ old('month', isset($selected_month) ? $selected_month : '') }}"></input>
                        @if($errors->has('description'))
                            <em class="invalid-feedback">
                                {{ $errors->first('description') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('global.product.fields.name_helper') }}
                        </p>
                    </div>


                    <div>
                        <input class="btn btn-danger" type="submit" value="View">
                    </div>
                </form>
            </div>
        </div>
{{--    @endcan--}}
    <div class="card">
        <div class="card-header">
            Paid Rents
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            Project
                        </th>
                        <th>
                             Unit
                        </th>
                        <th>
                            Monthly Rent
                        </th>
                        <th th >
                            Paid Months
                        </th>
                        <th>
                           Paid Amount
                        </th>
                        {{--<th>--}}
                           {{--Payment Date--}}
                        {{--</th>--}}

                        <th></th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($paid_rent_data as $key => $data)
                        <tr>
                            <td></td>
                            <td>
                                {{--{{ \App\Project::where('id',$data->unit_id)->first()->project_name ??'' }}--}}
                                {{ $data->Unit->Project->project_name ??'' }}
                            </td>
                            <td>
                                {{ $data->unit_name ??'' }}
                            </td>
                            <td>
                                {{ $data->monthly_rent ??'' }}
                            </td>
                            <td>
                                {{ $data->paid_months?? '' }}
                            </td>
                            <td>
                                {{ $data->paid_rent ?? '' }}
                            </td>
                            {{--<td>--}}
                                {{--{{ $data->payment_date ?? '' }}--}}
                            {{--</td>--}}
{{--                            <td>--}}
{{--                                {{ $rentalunit->status?? '' }}--}}
{{--                            </td>--}}
{{--                            <td>--}}
{{--                                {{ $rentalunit->business_type ?? '' }}--}}
{{--                            </td>--}}
{{--                            <td>--}}
{{--                                {{ $rentalunit->remarks ?? '' }}--}}
{{--                            </td>--}}
{{--                            <td>--}}
{{--                                {{ $rentalunit->security ?? '' }}--}}
{{--                            </td>--}}
{{--                            <td>--}}
{{--                                {{ $rentalunit->receipt_number ?? '' }}--}}
{{--                            </td>--}}
{{--                            <td>--}}
{{--                                {{ $rentalunit->allotment_date ?? '' }}--}}
{{--                            </td>--}}


                            <td>
{{--                                @can('event_show')--}}
{{--                                <a class="btn btn-xs btn-primary" href="{{ route('admin.rentalunits.show', $rentalunit) }}">--}}
{{--                                    {{ trans('global.view') }}--}}
{{--                                </a>--}}
{{--                                @endcan--}}
{{--                                @can('event_edit')--}}
{{--                                    <a class="btn btn-xs btn-info" href="{{ route('admin.rentalunits.edit', $rentalunit->id) }}">--}}
{{--                                        {{ trans('global.edit') }}--}}
{{--                                    </a>--}}
{{--                                @endcan--}}
{{--                                @can('event_delete')--}}
{{--                                    <form action="{{ route('admin.repos.destroy', $rentalunit) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">--}}
{{--                                        <input type="hidden" name="_method" value="DELETE">--}}
{{--                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
{{--                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">--}}
{{--                                    </form>--}}
{{--                                @endcan--}}
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@section('scripts')
    @parent
    <script>
        $(function () {
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.products.massDestroy') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
                        return $(entry).data('entry-id')
                    });

                    if (ids.length === 0) {
                        alert('{{ trans('global.datatables.zero_selected') }}')

                        return
                    }

                    if (confirm('{{ trans('global.areYouSure') }}')) {
                        $.ajax({
                            headers: {'x-csrf-token': _token},
                            method: 'POST',
                            url: config.url,
                            data: { ids: ids, _method: 'DELETE' }})
                            .done(function () { location.reload() })
                    }
                }
            }
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('product_delete')
            dtButtons.push(deleteButton)
            @endcan

            $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
        })

    </script>
@endsection
@endsection
