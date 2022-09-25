@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Block
    </div>

    <div class="card-body">
        <form action="{{ route("admin.floors.update",[$floor]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">Block Name*</label>
                <input type="text"  id="floor_name" name="floor_name" class="form-control" required value="{{ old('title', isset($floor) ? $floor->floor_name : '') }}">
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
                <label for="status">Society*</label>

                <select name="project_id" id="project_id" class="form-control select2">
                    @foreach($projects as $project)
                        <option value="{{$project->id}}" {{ old('project_id', $floor->parent_id) == $project->id ? 'selected' : '' }} >
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

            <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                <label for="picture">Picture*</label>
                <input type="file" rows="2" id="image" name="image[]" class="form-control" value="{{ old('picture', isset($floor) ?$floor->parent_id : '') }}" multiple>
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