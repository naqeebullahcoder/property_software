@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            General Reports Form
        </div>

        <div class="card-body">
            <form action="{{ route("admin.reports.general-report") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                    <label for="status">Project</label>

                    <select name="project_id" id="project_id" class="form-control select2">
                        @foreach($projects as $project)
                            <option value="{{$project->id}}" >
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
                    <label for="description">Month*</label>
                    <input type="month" rows="1" id="month" name="month" class="form-control" required value="{{ old('price_per_sq', isset($unit) ? $unit->price_per_sq : '') }}"></input>
                    @if($errors->has('description'))
                        <em class="invalid-feedback">
                            {{ $errors->first('description') }}
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


    <div class="card">
        <div class="card-header">
            Create Rent of a Unit
        </div>

        <div class="card-body">
            <form action="{{ route("admin.monthlyrents.store") }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                    <label for="description">Month*</label>
                    <input type="month" rows="1" id="month" name="month" class="form-control" required value="{{ old('price_per_sq', isset($unit) ? $unit->price_per_sq : '') }}"></input>
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
                    <label for="status">Unit</label>

                    <select name="unit_id" id="unit_id" class="form-control select2">
                        @foreach($units as $unit)
                            <option value="{{$unit->id}}" >
                                {{$unit->unit_name}} ({{$unit->Project->project_name}})</option>
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