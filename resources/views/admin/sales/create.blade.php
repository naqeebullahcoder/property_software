@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Create Sale
    </div>

    <div class="card-body">
        <form action="{{ route("admin.sales.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                <label for="status">Plot</label>

                <select name="unit_id" id="unit_id" required class="form-control select2">
                    @foreach($units as $unit)
                        <option> </option>
                        <option value="{{$unit->id}}">
                             {{$unit->unit_name}}</option>
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

            <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                <label for="status">Customer</label>

                <select name="tenant_id" id="tenant_id" required class="form-control select2">
                    @foreach($tenants as $tenant)
                        <option> </option>
                        <option value="{{$tenant->id}}">
                            {{$tenant->name}} | {{$tenant->mobile_no}}</option>
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
            <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                <label for="status">Agent</label>

                <select name="agent_id" id="agent_id" class="form-control select2">
                    @foreach($agents as $agent)
                        <option> </option>
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
                <label for="title">Sale Price</label>
                <input type="text"  id="sale_price" required name="sale_price" class="form-control"  value="{{ old('title', isset($product) ? $product->name : '') }}">
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
                <label for="title">Down Payment</label>
                <input type="text"  id="down_payment"  name="down_payment" class="form-control" required value="{{ old('title', isset($product) ? $product->name : '') }}">
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
                <label for="title"># of Installments</label>
                <input type="text"  id="no_of_installments" name="no_of_installments" class="form-control"  value="{{ old('title', isset($product) ? $product->name : '') }}">
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
                <label for="description">Date</label>
                <input type="date" rows="1" id="date" name="date" class="form-control" required ></input>
                @if($errors->has('description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                <label for="status">Guarantor 1</label>

                <select name="guarantor_1" id="guarantor_1" class="form-control select2">
                    @foreach($tenants as $tenant)
                        <option> </option>
                        <option value="{{$tenant->id}}">
                            {{$tenant->name}} | {{$tenant->mobile_no}}</option>
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

            <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                <label for="status">Guarantor 2</label>

                <select name="guarantor_2" id="guarantor_2" class="form-control select2">
                    @foreach($tenants as $tenant)
                        <option> </option>
                        <option value="{{$tenant->id}}">
                            {{$tenant->name}} | {{$tenant->mobile_no}}</option>
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
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection