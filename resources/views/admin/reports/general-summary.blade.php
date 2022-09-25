@extends('layouts.admin')
@section('content')
    {{--    @can('event_create')--}}
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">

        </div>
    </div>
    {{--    @endcan--}}
    <div class="card">
        <div class="card-header">
            General Summary
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            Project Name
                        </th>
                        <th>
                            Floors
                        </th>
                        <th>
                            No of Units
                        </th>

                        <th>
                            Total Rent
                        </th>
                        <th>
                            Oblige
                        </th>
                        <th>
                            Net Rent
                        </th>
                        <th>
                            Received Rent
                        </th>
                        <th>
                            Balance
                        </th>
                        <th>
                            Previous Balance
                        </th>
                        <th>
                            Total Dues
                        </th>


                        {{--<th>--}}
                        {{--Corner Plot--}}
                        {{--</th>--}}
                        {{--                        <th>--}}
                        {{--                            Status--}}
                        {{--                        </th>--}}

                        <th></th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($summary as $key => $data)
                        <tr>
                            <td></td>
                            <td>
                                {{ $data->project_name ??'' }}
                            </td>
                            <td>
                                {{  ??'' }}
                            </td>
                            <td>
                                {{--{{ $data->area_sq ??'' }}--}}
                            </td>
                            <td>
                                {{--{{ $data->price_per_sq ??'' }}--}}
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>

                            </td>
                            {{--<td>--}}
                            {{--{{ $data->corner_plot ??'' }}--}}
                            {{--</td>--}}
                            {{--                            <td>--}}
                            {{--                                {{ $data->status ?? '' }}--}}
                            {{--                            </td>--}}
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
