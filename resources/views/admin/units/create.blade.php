@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
       Create Plot
    </div>

    <div class="card-body">
        <form action="{{ route("admin.units.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">Plot</label>
                <input type="text"  id="unit_name" name="unit_name" class="form-control" required value="{{ old('title', isset($product) ? $product->name : '') }}">
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
                <label for="status">Block</label>

                <select name="floor" id="floor" class="form-control select2">
                    @foreach($floors as $floor)
                        <option value="{{$floor->id}}"  >
                            {{$floor->project->project_name}} - {{$floor->floor_name}}</option>
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
                <label for="status">Society</label>

                <select name="project_id" id="project_id" class="form-control select2">
                    @foreach($projects as $project)
                        <option value="{{$project->id}}"  >
                            {{$project->project_name}}</option>
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






            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">Meter No</label>
                <input type="text" rows="1" id="meter_no" name="meter_no" class="form-control" required value="{{ old('description', isset($product) ? $product->name : '') }}"></input>
                @if($errors->has('description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.name_helper') }}
                </p>
            </div>



            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">Dimension in Marla</label>
                <input type="text" rows="1" id="dimension" name="dimension" class="form-control" required value="{{ old('dimension', isset($unit) ? $unit->dimension : '') }}"></input>
                @if($errors->has('description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.name_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">Price Per Marla</label>
                <input type="text" rows="1" id="price_per_sq" name="price_per_sq" class="form-control"  value="{{ old('description', isset($product) ? $product->name : '') }}"></input>
                @if($errors->has('description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">Maintenance Per Marla</label>
                <input type="text" rows="1" id="maintenace_per_sq" name="maintenace_per_sq" class="form-control"  value="{{ old('description', isset($product) ? $product->name : '') }}"></input>
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
                <label for="status">Corner Plot</label>

                <select name="floor_id" id="floor_id" class="form-control select2">

                    <option value="0"  >No</option>
                    <option value="1"  >yes</option>

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
