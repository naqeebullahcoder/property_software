@extends('layouts.admin')
@section('content')
    {{--@can('event_create')--}}
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.tenants.create") }}">
                    Add Customer
                </a>
            </div>
        </div>
    {{--@endcan--}}
    <div class="card">
        <div class="card-header">
            Customers
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            Customer Name
                        </th>
                        <th th >
                            Father Name
                        </th>
                        <th>
                            CNIC
                        </th>
                        <th>
                            Mobile No
                        </th>
                        <th>
                            Address
                        </th>
                        <th>
                            Is Agent
                        </th>
                        <th>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tenants as $key => $tenant)
                        <tr data-entry-id="{{ $tenant->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $tenant->name ?? '' }}
                            </td>
                            <td>
                                {{ $tenant->father_name ?? '' }}
                            </td>
                            <td>
                                {{ $tenant->cnic_no?? '' }}
                            </td>
                            <td>
                                {{ $tenant->mobile_no ?? '' }}
                            </td>
                            <td>
                                {{ $tenant->address ?? '' }}
                            </td>
                            <td>
                                {{--{{ $tenant->is_agent ?? '' }}--}}
                                @if($tenant->is_agent==0)Customer
                                    @elseif($tenant->is_agent==1)Agent
                                    @endif
                            </td>
                            {{--<td>--}}
                                {{--{{App\Status::find($events_data->status)->name}}--}}
                            {{--</td>--}}

                            <td>

                                {{--@can('event_show')--}}
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.tenants.show', $tenant) }}">
                                    {{ trans('global.view') }}
                                </a>
                                {{--@endcan--}}
                                {{--@can('event_edit')--}}
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.tenants.edit', $tenant->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                {{--@endcan--}}
                                {{--@can('event_delete')--}}
                                    <form action="{{ route('admin.tenants.destroy', $tenant) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                {{--@endcan--}}
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
