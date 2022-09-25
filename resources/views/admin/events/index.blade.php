@extends('layouts.admin')
@section('content')
    @can('event_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.events.create") }}">
                    Add Event
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            News
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            Event Title
                        </th>
                        <th th >
                            Description
                        </th>
                        <th>
                            Date
                        </th>
                        <th>
                            Status
                        </th>
                        <th>

                        </th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($events as $key => $events_data)
                        <tr data-entry-id="{{ $events_data->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $events_data->title ?? '' }}
                            </td>
                            <td>
                                {{ $events_data->description ?? '' }}
                            </td>
                            <td>
                                {{ date('d-m-Y', strtotime($events_data->date)) ?? '' }}
                            </td>
                            <td>
                                {{App\Status::find($events_data->status)->name}}
                            </td>

                            <td>

                                @can('event_show')
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.events.show', $events_data) }}">
                                    {{ trans('global.view') }}
                                </a>
                                @endcan
                                @can('event_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.events.edit', $events_data->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('event_delete')
                                    <form action="{{ route('admin.events.destroy', $events_data) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan
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
