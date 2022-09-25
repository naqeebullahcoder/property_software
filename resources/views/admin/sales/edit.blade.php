@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Sale
    </div>

    <div class="card-body">
        <form action="{{ route("admin.sales.update",[$sale]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="status">Plot*</label>
                <select name="unit_id" id="unit_id" class="form-control select2" required>
                    {{--<option value="" disabled selected>Plot Name*</option>--}}
                    @foreach($units as $unit)
                        <option value="{{$unit->id}}" {{ old('unit_id', $unit->id) == $unit->id ? 'selected' : '' }}>
                            {{$unit->unit_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="status">Customer*</label>
                <select name="tenants_id" id="tenants_id" class="form-control select2" required>
                    {{--<option value="" disabled selected>Customer Name*</option>--}}
                    @foreach($tenants as $tenant)
                        <option value="{{$tenant->id}}" {{ old('tenants_id', $tenant->id) == $tenant->tenants_id ? 'selected' : '' }}>
                            {{$tenant->name}} | {{$tenant->mobile_no}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                <label for="status">Agent*</label>

                <select name="agent_id" id="agent_id" class="form-control select2">
                    @foreach($agents as $agent)
                        <option value="{{$agent->id}}">
                            {{$agent->name}} | {{$agent->mobile_no}}</option>
                    @endforeach
                </select>
                @if($errors->has('course_category_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.role.fields.permissions_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">Agent Commission</label>
                <input type="text"  id="agent_Commission" name="agent_Commission" class="form-control" required value="{{ old('agent_Commission', isset($sale) ? $sale->agent_Commission : '') }}">
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
                <label for="title">Sale Price*</label>
                <input type="text"  id="sale_price" name="sale_price" class="form-control"  value="{{ old('sale_price', isset($sale) ? $sale->sale_price : '') }}">
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
                <label for="title">Down payment*</label>
                <input type="text"  id="down_payment" name="down_payment" class="form-control" required value="{{ old('down_payment', isset($sale) ? $sale->down_payment : '') }}">
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
                <label for="title"># of Installments*</label>
                <input type="text"  id="no_of_installments" name="no_of_installments" class="form-control"  value="{{ old('no_of_installments', isset($sale) ? $sale->no_of_installments : '') }}">
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">Date*</label>
                <input type="date" rows="1" id="date" name="date" class="form-control" required value="{{ old('date', isset($sale) ? $sale->date : '') }}" ></input>
                @if($errors->has('description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="status">Guarantor 1*</label>
                <select name="guarantor_1" id="guarantor_1" class="form-control select2" required>
                    {{--<option value="" disabled selected>Guarantor 1 Name*</option>--}}
                    @foreach($tenants as $tenant)

                        <option value="{{$tenant->id}}" {{ old('guarantor_1', $tenant->id) == $sale->guarantor_1 ? 'selected' : '' }}>
                            {{$tenant->name}} | {{$tenant->mobile_no}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="status">Guarantor 2*</label>
                <select name="guarantor_2" id="guarantor_2" class="form-control select2" required>
                    {{--<option value="" disabled selected>Guarantor 2 Name*</option>--}}
                    @foreach($tenants as $tenant)

                        <option value="{{$tenant->id}}" {{ old('guarantor_2', $tenant->id) == $sale->guarantor_2 ? 'selected' : '' }}>
                            {{$tenant->name}} | {{$tenant->mobile_no}}</option>
                    @endforeach
                </select>
            </div>

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

@endsection