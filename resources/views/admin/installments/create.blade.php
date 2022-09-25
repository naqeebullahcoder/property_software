@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Create Installment Voucher
    </div>

    <div class="card-body">
        <form action="{{ route("admin.installments.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{--<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">--}}
                {{--<label for="status">Sale ID</label>--}}

                {{--<select name="unit_id" id="unit_id" class="form-control select2">--}}
                    {{--@foreach($sales as $sale)--}}
                        {{--<option value="{{$sale->id}}">--}}
                            {{--Plot ID: {{$sale->id}} | {{$unit->$sale}}</option>--}}
                    {{--@endforeach--}}
                {{--</select>--}}
                {{--@if($errors->has('course_category_id'))--}}
                    {{--<em class="invalid-feedback">--}}
                        {{--{{ $errors->first('status') }}--}}
                    {{--</em>--}}
                {{--@endif--}}
                {{--<p class="helper-block">--}}
                    {{--{{ trans('global.role.fields.permissions_helper') }}--}}
                {{--</p>--}}
            {{--</div>--}}



            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">Sale ID</label>
                <input type="text"  id="sale_id" name="sale_id" class="form-control" required value="{{ old('id', isset($sales->id) ? $sales->id : '') }}">
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                <label for="status">Sale ID</label>

                <select name="id" id="id" class="form-control select2">
                    @foreach($sales as $sale)
                        <option value="{{$sale->id}}">
                            Sale ID: {{$sale->id}}</option>
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
                <label for="title">Plot ID</label>
                <input type="text"  id="plot_id" name="plot_id" class="form-control" required value="{{ old('id', isset($units->id) ? $units->id : '') }}">

                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                <label for="status">Plot ID</label>

                <select name="id" id="id" class="form-control select2">
                    @foreach($units as $unit)
                        <option value="{{$unit->id}}">
                            Plot ID: {{$unit->id}}</option>
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
                <label for="title">Pending Amount</label>
                <input type="text"  id="pending_amount" name="pending_amount" class="form-control"  value="{{ old('pending_amount', isset($sale) ? $sale->sale_price-$sale->down_payment : '') }}">
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.name_helper') }}
                </p>
            </div>


            {{--<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">--}}
                {{--<label for="status">Customer Name</label>--}}

                {{--<select name="tenant_id" id="tenant_id" class="form-control select2">--}}
                    {{--@foreach($tenants as $tenant)--}}
                        {{--<option value="{{$tenant->id}}">--}}
                            {{--Customer ID: {{$tenant->id}} | {{$tenant->name}}</option>--}}
                    {{--@endforeach--}}
                {{--</select>--}}
                {{--@if($errors->has('course_category_id'))--}}
                    {{--<em class="invalid-feedback">--}}
                        {{--{{ $errors->first('status') }}--}}
                    {{--</em>--}}
                {{--@endif--}}
                {{--<p class="helper-block">--}}
                    {{--{{ trans('global.role.fields.permissions_helper') }}--}}
                {{--</p>--}}
            {{--</div>--}}

            {{--<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">--}}
                {{--<label for="status">Guarantor 1 Name</label>--}}

                {{--<select name="guarantor_1" id="guarantor_1" class="form-control select2">--}}
                    {{--@foreach($tenants as $tenant)--}}
                        {{--<option value="{{$tenant->id}}">--}}
                            {{--Guarantor 1 ID: {{$tenant->id}} | {{$tenant->name}}</option>--}}
                    {{--@endforeach--}}
                {{--</select>--}}
                {{--@if($errors->has('course_category_id'))--}}
                    {{--<em class="invalid-feedback">--}}
                        {{--{{ $errors->first('status') }}--}}
                    {{--</em>--}}
                {{--@endif--}}
                {{--<p class="helper-block">--}}
                    {{--{{ trans('global.role.fields.permissions_helper') }}--}}
                {{--</p>--}}
            {{--</div>--}}

            {{--<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">--}}
                {{--<label for="status">Guarantor 2 Name</label>--}}

                {{--<select name="guarantor_2" id="guarantor_2" class="form-control select2">--}}
                    {{--@foreach($tenants as $tenant)--}}
                        {{--<option value="{{$tenant->id}}">--}}
                            {{--Guarantor 2 ID: {{$tenant->id}} | {{$tenant->name}}</option>--}}
                    {{--@endforeach--}}
                {{--</select>--}}
                {{--@if($errors->has('course_category_id'))--}}
                    {{--<em class="invalid-feedback">--}}
                        {{--{{ $errors->first('status') }}--}}
                    {{--</em>--}}
                {{--@endif--}}
                {{--<p class="helper-block">--}}
                    {{--{{ trans('global.role.fields.permissions_helper') }}--}}
                {{--</p>--}}
            {{--</div>--}}


            {{--<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">--}}
                {{--<label for="title">Plot Name</label>--}}
                {{--<input type="text"  id="name" name="name" class="form-control" required value="{{ old('title', isset($product) ? $product->name : '') }}">--}}
                {{--@if($errors->has('title'))--}}
                    {{--<em class="invalid-feedback">--}}
                        {{--{{ $errors->first('title') }}--}}
                    {{--</em>--}}
                {{--@endif--}}
                {{--<p class="helper-block">--}}
                    {{--{{ trans('global.product.fields.name_helper') }}--}}
                {{--</p>--}}
            {{--</div>--}}
            {{--<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">--}}
                {{--<label for="title">Customer Name</label>--}}
                {{--<input type="text"  id="father_name" name="father_name" class="form-control"  value="{{ old('title', isset($product) ? $product->name : '') }}">--}}
                {{--@if($errors->has('title'))--}}
                    {{--<em class="invalid-feedback">--}}
                        {{--{{ $errors->first('title') }}--}}
                    {{--</em>--}}
                {{--@endif--}}
                {{--<p class="helper-block">--}}
                    {{--{{ trans('global.product.fields.name_helper') }}--}}
                {{--</p>--}}
            {{--</div>--}}


            {{--<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">--}}
                {{--<label for="status">Agent</label>--}}

                {{--<select name="agent_id" id="agent_id" class="form-control select2">--}}
                    {{--@foreach($agents as $agent)--}}
                        {{--<option value="{{$agent->id}}">--}}
                            {{--Agent ID: {{$agent->id}} | {{$agent->name}}</option>--}}
                    {{--@endforeach--}}
                {{--</select>--}}
                {{--@if($errors->has('course_category_id'))--}}
                    {{--<em class="invalid-feedback">--}}
                        {{--{{ $errors->first('status') }}--}}
                    {{--</em>--}}
                {{--@endif--}}
                {{--<p class="helper-block">--}}
                    {{--{{ trans('global.role.fields.permissions_helper') }}--}}
                {{--</p>--}}
            {{--</div>--}}

            {{--<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">--}}
                {{--<label for="title">Down Payment</label>--}}
                {{--<input type="text"  id="down_payment" name="down_payment" class="form-control" required value="{{ old('title', isset($product) ? $product->name : '') }}">--}}
                {{--@if($errors->has('title'))--}}
                    {{--<em class="invalid-feedback">--}}
                        {{--{{ $errors->first('title') }}--}}
                    {{--</em>--}}
                {{--@endif--}}
                {{--<p class="helper-block">--}}
                    {{--{{ trans('global.product.fields.name_helper') }}--}}
                {{--</p>--}}
            {{--</div>--}}
            {{--<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">--}}
                {{--<label for="title">Sale Price</label>--}}
                {{--<input type="text"  id="sale_price" name="sale_price" class="form-control"  value="{{ old('title', isset($product) ? $product->name : '') }}">--}}
                {{--@if($errors->has('title'))--}}
                    {{--<em class="invalid-feedback">--}}
                        {{--{{ $errors->first('title') }}--}}
                    {{--</em>--}}
                {{--@endif--}}
                {{--<p class="helper-block">--}}
                    {{--{{ trans('global.product.fields.name_helper') }}--}}
                {{--</p>--}}
            {{--</div>--}}
            {{--<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">--}}
                {{--<label for="title">No of Installments</label>--}}
                {{--<input type="text"  id="no_of_installments" name="no_of_installments" class="form-control"  value="{{ old('title', isset($product) ? $product->name : '') }}">--}}
                {{--@if($errors->has('title'))--}}
                    {{--<em class="invalid-feedback">--}}
                        {{--{{ $errors->first('title') }}--}}
                    {{--</em>--}}
                {{--@endif--}}
                {{--<p class="helper-block">--}}
                    {{--{{ trans('global.product.fields.name_helper') }}--}}
                {{--</p>--}}
            {{--</div>--}}
            {{--<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">--}}
                {{--<label for="description">Date</label>--}}
                {{--<input type="date" rows="1" id="date" name="date" class="form-control" required ></input>--}}
                {{--@if($errors->has('description'))--}}
                    {{--<em class="invalid-feedback">--}}
                        {{--{{ $errors->first('description') }}--}}
                    {{--</em>--}}
                {{--@endif--}}
                {{--<p class="helper-block">--}}
                    {{--{{ trans('global.product.fields.name_helper') }}--}}
                {{--</p>--}}
            {{--</div>--}}

            {{--<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">--}}
                {{--<label for="title">Status</label>--}}
                {{--<input type="text"  id="status" name="status" class="form-control"  value="{{ old('title', isset($product) ? $product->name : '') }}">--}}
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
                {{--<label for="picture">Pictures</label>--}}
                {{--<input type="file" rows="2" id="image" name="image[]" class="form-control" value="{{ old('picture', isset($product) ? $product->name : '') }}" multiple>--}}
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