@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('global.role.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.roles.update", [$role]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">{{ trans('global.role.fields.title') }}*</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($role) ? $role->title : '') }}">
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.role.fields.title_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('menu_options') ? 'has-error' : '' }}">
                <label for="menu_options">Menu Options*
                    <span class="btn btn-info btn-xs select-all">Select all</span>
                    <span class="btn btn-info btn-xs deselect-all">Deselect all</span></label>
                <select name="menu_options[]" id="menu_options" class="form-control select2" multiple="multiple">
                    @foreach($menu_options as $id => $menu_option)
                        {{--<option value="{{$id}}" {{ old('menu_options', $role->auth->contains($id)) == $menu_option->id ? 'selected' : '' }}>--}}menuoptions
                        {{--<option value="{{ $id }}" {{ (in_array($id, old('menu_options', [])) ||  App\Rights::where('role_id',$role->id)->pluck('menu_option_id')) ? 'selected' : '' }}>--}}
                        <option value="{{ $id }}" {{ (in_array($id, old('menu_options', [])) || isset($role) && $role->menuoptions->contains($id)) ? 'selected' : '' }}>
                        {{ $menu_option }}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('menu_options'))
                    <em class="invalid-feedback">
                        {{ $errors->first('menu_options') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.role.fields.permissions_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('permissions') ? 'has-error' : '' }}">
                <label for="permissions">{{ trans('global.role.fields.permissions') }}*
                    <span class="btn btn-info btn-xs select-all">Select all</span>
                    <span class="btn btn-info btn-xs deselect-all">Deselect all</span></label>
                <select name="permissions[]" id="permissions" class="form-control select2" multiple="multiple">
                    @foreach($permissions as $id => $permissions)
                        <option value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || isset($role) && $role->permissions->contains($id)) ? 'selected' : '' }}>
                            {{ $permissions }}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('permissions'))
                    <em class="invalid-feedback">
                        {{ $errors->first('permissions') }}
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