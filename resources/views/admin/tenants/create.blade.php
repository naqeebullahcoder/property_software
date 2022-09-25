@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Create Customer
    </div>

    <div class="card-body">
        <form action="{{ route("admin.tenants.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">Customer Name</label>
                <input type="text"  id="name" name="name" class="form-control" required value="{{ old('title', isset($product) ? $product->name : '') }}">
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
                <label for="title">Father Name</label>
                <input type="text"  id="father_name" name="father_name" class="form-control"  value="{{ old('title', isset($product) ? $product->name : '') }}">
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
                <label for="title">CNIC</label>
                <input type="text"  id="cnic_no" name="cnic_no" class="form-control"  value="{{ old('title', isset($product) ? $product->name : '') }}">
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
                <label for="title">Mobile No*</label>
                <input type="text"  id="mobile_no" name="mobile_no" class="form-control" required value="{{ old('title', isset($product) ? $product->name : '') }}">
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
                <label for="title">Telephone No</label>
                <input type="text"  id="telephone_no" name="telephone_no" class="form-control"  value="{{ old('title', isset($product) ? $product->name : '') }}">
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
                <label for="title">Address</label>
                <input type="text"  id="address" name="address" class="form-control"  value="{{ old('title', isset($product) ? $product->name : '') }}">
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
                <label for="status">Is Agent</label>

                <select name="is_agent" id="is_agent" class="form-control select2">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
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

            <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                <label for="picture">Pictures</label>
                <input type="file" rows="2" id="image" name="image[]" class="form-control" value="{{ old('picture', isset($product) ? $product->name : '') }}" multiple>
                @if($errors->has('description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('picture') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.name_helper') }}
                </p>
            </div>

            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection