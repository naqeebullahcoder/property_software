@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Society
    </div>

    <div class="card-body">
        <form action="{{ route("admin.projects.update",[$project]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">Society Name*</label>
                <input type="text"  id="project_name" name="project_name" class="form-control" required value="{{ old('project_name', isset($project) ? $project->project_name : '') }}">
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
                <label for="description">No of Sectors*</label>
                <input type="number" rows="1" id="no_of_floors" name="no_of_floors" class="form-control" required value="{{ old('no_of_floors', isset($project) ? $project->no_of_floors : '') }}"></input>
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
                <label for="description">No of Plots*</label>
                <input type="number" rows="1" id="no_of_units" name="no_of_units" class="form-control" required value="{{ old('no_of_units', isset($project) ? $project->no_of_units : '') }}"></input>
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
                <label for="description">Location*</label>
                <input type="text" rows="1" id="location" name="location" class="form-control" required value="{{ old('location', isset($project) ? $project->location : '') }}"></input>
                @if($errors->has('description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                <label for="picture">Pictures*</label>
                <input type="file" rows="2" id="image" name="image[]" class="form-control" value="{{ old('image', isset($project) ? $project->image : '') }}" multiple>
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