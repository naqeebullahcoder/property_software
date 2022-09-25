@extends('layouts.admin')
@section('content')
    {{--@can('event_create')--}}
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.units.create") }}">
                    Add Plot
                </a>
            </div>
        </div>
    {{--@endcan--}}
    <div class="card">
        <div class="card-header">
            Plots
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            Plot
                        </th>
                        <th>
                            Society
                        </th>
                        <th>
                             Block
                        </th>
                        <th>
                            Dimensions in Marla
                        </th>
                        <th>
                            Status
                        </th>
                        {{--<th>--}}
                            {{--Price per SQFT--}}
                        {{--</th>--}}
                        <th>

                        </th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($units as $key => $unit)
                        <tr data-entry-id="{{ $unit->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $unit->unit_name ?? '' }}
                            </td>
                            <td>
                                {{ $unit->project->project_name ?? '' }}
                            </td>

                            <td>
                                {{ $unit->floor->floor_name ?? '' }}
                            </td>

                            {{--<td>--}}
                                {{--{{ $unit->area_sq ?? '' }}--}}
                            {{--</td>--}}
                            <td>
                                {{ $unit->dimension ?? '' }}
                            </td>

                            <td>
                                {{ $unit->UnitStatus->name   }}
                            </td>
                            {{--<td>--}}
                                {{--{{ $unit->price_per_sq ?? '' }}--}}
                            {{--</td>--}}
                            <td>

                                {{--@can('event_show')--}}
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.units.show', $unit) }}">
                                    {{ trans('global.view') }}
                                </a>
                                {{--@endcan--}}
                                {{--@can('event_edit')--}}
                                @if($unit->status!=1)
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.units.edit', $unit->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endif
                                {{--@endcan--}}
                                {{--@can('event_delete')--}}
                                @if($unit->status!=1)
                                    <form action="{{ route('admin.units.destroy', $unit) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endif
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
