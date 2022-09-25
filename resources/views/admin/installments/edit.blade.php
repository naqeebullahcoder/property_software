@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Pay Installment
    </div>

    <div class="card-body">
        <form action="{{ route("admin.installments.update",[$sale]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')


            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">Sale ID</label>
                <input type="text"  id="sale" name="sale" class="form-control" required disabled value="{{ old('sale_id', isset($sale) ? $sale->id : '') }}">
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <input type="text"  id="sale_id" name="sale_id" class="form-control" required hidden value="{{ old('sale_id', isset($sale) ? $sale->id : '') }}">
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">Plot</label>
                <input type="text"  id="unit_id" name="unit_id" class="form-control" required disabled value="{{ old('unit_id', isset($sale) ? $sale->Units->unit_name : '') }}">
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.name_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">Montly Installment</label>
                <input type="text"  id="montly_installment" name="montly_installment" class="form-control" disabled value="{{ old('receive_amount', isset($sale) ?   ($sale->sale_price-$sale->down_payment)/$sale->no_of_installments  : '') }}">
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">Installment Amount</label>
                <input type="number"  id="receive_amount" required name="receive_amount" class="form-control"  >
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">Discount</label>
                <input type="number"   id="discount"  name="discount" class="form-control"  >
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">Date</label>
                <input type="date"  id="date" name="date" required class="form-control"  >
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.name_helper') }}
                </p>
            </div>

            {{--<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">--}}
                {{--<label for="title">No of Installments*</label>--}}
                {{--<input type="text"  id="no_of_installments" name="no_of_installments" class="form-control"  value="{{ old('no_of_installments', isset($sale) ? $sale->no_of_installments : '') }}">--}}
                {{--@if($errors->has('title'))--}}
                    {{--<em class="invalid-feedback">--}}
                        {{--{{ $errors->first('title') }}--}}
                    {{--</em>--}}
                {{--@endif--}}
                {{--<p class="helper-block">--}}
                    {{--{{ trans('global.product.fields.name_helper') }}--}}
                {{--</p>--}}
            {{--</div>--}}

            {{--<div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">--}}
                {{--<label for="picture">Pictures*</label>--}}
                {{--<input type="file" rows="2" id="image" name="image[]" class="form-control" value="{{ old('image', isset($tenant) ? $tenant->image : '') }}" multiple>--}}
                {{--@if($errors->has('description'))--}}
                    {{--<em class="invalid-feedback">--}}
                        {{--{{ $errors->first('picture') }}--}}
                    {{--</em>--}}
                {{--@endif--}}
                {{--<p class="helper-block">--}}
                    {{--{{ trans('global.product.fields.name_helper') }}--}}
                {{--</p>--}}
            {{--</div>--}}

            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header">
        Installments History
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                <tr>
                    <th width="10">
                        S#
                    </th>
                    <th>
                        Sale ID
                    </th>
                    <th>
                        Plot Name
                    </th>
                    <th th >
                        Customer Name
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
                        Receive Date
                    </th>
                    <th>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($installments as $key => $installment)
                    <tr data-entry-id="{{ $sale->id }}">
                        <td>
                            {{$key+1}}
                        </td>
                        <td>
                            {{ $installment->sale_id ?? '' }}
                        </td>
                        <td>
                            {{ $installment->Units->unit_name ?? '' }}
                        </td>
                        <td>
                            {{ $installment->Tenants->name ?? '' }}
                        </td>
                        <td>
                            <?php
                            echo number_format(($sale->sale_price-$sale->down_payment)/$sale->no_of_installments?? '' )
                            ?>
                        </td>
                        <td>
                            <?php
                            echo number_format($sale->sale_price ?? '' )
                            ?>
                        </td>
                        <td>
                            <?php
                            echo number_format($installment->receive_amount ?? '' )
                            ?>
                        </td>
                        <td>
                            <?php
                            echo number_format($installment->pending_amount ?? '' )
                            ?>
                        </td >
                        <td>
                            {{ $installment->receiving_date ?? '' }}
                        </td >
                        {{--<td>--}}
                        {{--{{App\Status::find($events_data->status)->name}}--}}
                        {{--</td>--}}

                        <td>

                            {{--@can('event_show')--}}
                            <a class="btn btn-xs btn-primary" href="{{ route('admin.installments.show', $installment->id) }}">
                                {{ trans('view') }}
                            </a>
                            {{--@endcan--}}
                            {{--@can('event_edit')--}}
                            {{--<a class="btn btn-xs btn-info" href="{{ route('admin.installments.edit', $sale->id) }}">--}}
                                {{--{{ trans('pay') }}--}}
                            {{--</a>--}}
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



@endsection