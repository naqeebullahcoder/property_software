@extends('layouts.admin')
@section('content')
    {{--@can('event_create')--}}
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                {{--<a class="btn btn-success" href="{{ route("admin.installments.create") }}">--}}
                    {{--Pay Installment--}}
                {{--</a>--}}
            </div>
        </div>
    {{--@endcan--}}
    <div class="card">
        <div class="card-header">
            Installments
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                           Sale ID
                        </th>
                        <th>
                            Plot
                        </th>
                        <th th >
                            Customer
                        </th>
                        <th>
                            Monthly Installment
                        </th>
                        <th>
                            Sale Amount
                        </th>
                        <th>
                            Received Amount
                        </th>
                        <th>
                            Pending Amount
                        </th>
                        <th>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sales as $key => $sale)
                        <tr data-entry-id="{{ $sale->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $sale->id ?? '' }}
                            </td>
                            <td>
                                {{ $sale->Units->unit_name ?? '' }}
                            </td>
                            <td>
                                {{ $sale->Tenants->name ?? '' }}
                            </td>
                            <td>
                                <?php
                                echo number_format(($sale->sale_price-$sale->down_payment)/$sale->no_of_installments?? '')
                                ?>
                            </td>
                            <td>
                                <?php
                                echo number_format($sale->sale_price ?? '')
                                ?>
                            </td>
                            <td>
                                <?php
                                echo number_format($sale->down_payment + $sale->Installments->sum('receive_amount') ?? '')
                                ?>
                            </td>
                            <td>
                                <?php
                                echo number_format($sale->sale_price-($sale->down_payment + $sale->Installments->sum('receive_amount')))
                                ?>
                            </td >
                            {{--<td>--}}
                                {{--{{App\Status::find($events_data->status)->name}}--}}
                            {{--</td>--}}

                            <td>

                                {{--@can('event_show')--}}
                                {{--<a class="btn btn-xs btn-primary" href="{{ route('admin.installments.show', $sale) }}">--}}
                                    {{--{{ trans('view') }}--}}
                                {{--</a>--}}
                                {{--@endcan--}}
                                {{--@can('event_edit')--}}
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.installments.edit', $sale->id) }}">
                                        {{ trans('pay') }}
                                    </a>
                                {{--@endcan--}}
                                {{--@can('event_delete')--}}
                                    {{--<form action="{{ route('admin.installments.destroy', $sale) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">--}}
                                        {{--<input type="hidden" name="_method" value="DELETE">--}}
                                        {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                                        {{--<input type="submit" class="btn btn-xs btn-danger" value="{{ trans('cancel') }}">--}}
                                    {{--</form>--}}
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
