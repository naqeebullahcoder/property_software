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
            Rental Units List
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
                            Unit Name
                        </th>
                        <th>
                            Tenant Name
                        </th>
                        <th>
                            Monthly Rent
                        </th>
                        <th>
                            Monthly Maintenance
                        </th>
                        <th>
                            Business Type
                        </th>
                        <th>
                            Security
                        </th>
                        <th>
                            Receipt Number
                        </th>
                        <th>
                            Allotment Date
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($units_data as $key => $data)
                        <tr data-entry-id="{{ $data->id }}">
                            <td></td>
                            <td>
                                {{ $data->Project->project_name ?? '' }}
                            </td>
                            <td>
                                {{ $data->Unit->unit_name ?? '' }}
                            </td>
                            <td>
                                {{ $data->Tenant->name ?? '' }}
                            </td>
                            <td>
                                {{ $data->monthly_rent ?? '' }}
                            </td>
                            <td>
                                {{ $data->maintenace ?? '' }}
                            </td>
                            {{--<td>--}}
                                {{--{{ $data->status?? '' }}--}}
                            {{--</td>--}}
                            <td>
                                {{ $data->business_type ?? '' }}
                            </td>
                            {{--<td>--}}
                                {{--{{ $data->remarks ?? '' }}--}}
                            {{--</td>--}}
                            <td>
                                {{ $data->security ?? '' }}
                            </td>
                            <td>
                                {{ $data->receipt_number ?? '' }}
                            </td>
                            <td>
                                {{ $data->allotment_date ?? '' }}
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