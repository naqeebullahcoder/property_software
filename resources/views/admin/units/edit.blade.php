@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Plot
    </div>

    <div class="card-body">
        <form action="{{ route("admin.units.update",[$unit]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">Plot*</label>
                <input type="text"  id="unit_name" name="unit_name" class="form-control" required value="{{ old('title', isset($unit) ? $unit->unit_name : '') }}">
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
                <label for="status">Block*</label>

                <select name="floor_id" id="floor_id" class="form-control select2">
                    @foreach($floors as $floor)
                        <option value="{{$floor->id}}" {{ old('floor_id', $unit->floor_id) == $floor->id ? 'selected' : '' }}  >
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
                <label for="status">Society*</label>

                <select name="project_id" id="project_id" class="form-control select2">
                    @foreach($projects as $project)
                        <option value="{{$project->id}}"  {{ old('project_id', $unit->parent_id) == $unit->id ? 'selected' : '' }} >
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
                <label for="description">Meter No*</label>
                <input type="text" rows="1" id="meter_no" name="meter_no" class="form-control" required value="{{ old('meter_no', isset($unit) ? $unit->meter_no : '') }}"></input>
                @if($errors->has('description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.name_helper') }}
                </p>
            </div>

            {{--<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">--}}
                {{--<label for="description">Area (SQFT)*</label>--}}
                {{--<input type="text" rows="1" id="area_sq" name="area_sq" class="form-control" required value="{{ old('area_sq', isset($unit) ? $unit->area_sq : '') }}"></input>--}}
                {{--@if($errors->has('description'))--}}
                    {{--<em class="invalid-feedback">--}}
                        {{--{{ $errors->first('description') }}--}}
                    {{--</em>--}}
                {{--@endif--}}
                {{--<p class="helper-block">--}}
                    {{--{{ trans('global.product.fields.name_helper') }}--}}
                {{--</p>--}}
            {{--</div>--}}


            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">Dimension in Marla*</label>
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
                <label for="description">Price Per Marla*</label>
                <input type="text" rows="1" id="price_per_sq" name="price_per_sq" class="form-control" required value="{{ old('price_per_sq', isset($unit) ? $unit->price_per_sq : '') }}"></input>
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
                <label for="description">Maintenance Per Marla*</label>
                <input type="text" rows="1" id="maintenace_per_sq" name="maintenace_per_sq" class="form-control" required value="{{ old('maintenace_per_sq', isset($unit) ? $unit->maintenace_per_sq : '') }}"></input>
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
                <label for="status">Corner Plot*</label>

                <select name="corner_plot" id="corner_plot" class="form-control select2">

                    <option value="0" {{ old('corner_plot', '0') == $unit->id ? 'selected' : '' }} >No</option>
                    <option value="1" {{ old('corner_plot', '1') == $unit->id ? 'selected' : '' }} >yes</option>

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
