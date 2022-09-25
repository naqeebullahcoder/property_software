@extends('layouts.admin')
@section('content')
    {{--@can('event_create')--}}
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.floors.create") }}">
                    Add Block
                </a>
            </div>
        </div>
    {{--@endcan--}}
    <div class="card">
        <div class="card-header">
            Blocks
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            Society Name
                        </th>
                        <th th >
                            Block Name
                        </th>
                        {{--<th>--}}
                            {{--No of Floors--}}
                        {{--</th>--}}
                        {{--<th>--}}
                            {{--Location--}}
                        {{--</th>--}}
                        <th>

                        </th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($floors as $key => $floor)
                        <tr data-entry-id="{{ $floor->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $floor->Project->project_name?? '' }}
                            </td>
                            <td>
                                {{ $floor->floor_name ?? '' }}
                            </td>
                            {{--<td>--}}
                                {{--{{ $project->no_of_units ?? '' }}--}}
                            {{--</td>--}}
                            {{--<td>--}}
                                {{--{{ $project->location ?? '' }}--}}
                            {{--</td>--}}
                            {{--<td>--}}
                                {{--{{App\Status::find($events_data->status)->name}}--}}
                            {{--</td>--}}

                            <td>

                                {{--@can('event_show')--}}
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.floors.show', $floor) }}">
                                    {{ trans('global.view') }}
                                </a>
                                {{--@endcan--}}
                                {{--@can('event_edit')--}}
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.floors.edit', $floor->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                {{--@endcan--}}
                                {{--@can('event_delete')--}}
                                    <form action="{{ route('admin.floors.destroy', $floor) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
