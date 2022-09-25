@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Add Faculty Member
        </div>

        <div class="card-body">
            <form action="{{ route("admin.faculty-members.store") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="user_id">User*</label>
                    <select name="user_id" id="user_id" class="form-control select2">
                        @foreach(App\User::all() as $id => $user)
                            <option value="{{ $user->id }}" {{ old('email', isset($faculty_member_type) ? $faculty_member_type->user_id : '') }}>
                                {{ $user->name }}- ({{$user->email}})
                            </option>
                        @endforeach
                    </select>
                </div>
                {{--<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">--}}
                    {{--<label for="name">Name*</label>--}}
                    {{--<input type="text" required id="name" name="name" class="form-control" value="{{ old('name', isset($faculty_resource) ? $faculty_resource->name : '') }}">--}}
                    {{--@if($errors->has('name'))--}}
                        {{--<em class="invalid-feedback">--}}
                            {{--{{ $errors->first('name') }}--}}
                        {{--</em>--}}
                    {{--@endif--}}
                    {{--<p class="helper-block">--}}
                        {{--{{ trans('global.product.fields.name_helper') }}--}}
                    {{--</p>--}}
                {{--</div>--}}
                {{--<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">--}}
                    {{--<label for="email">Email*</label>--}}
                    {{--<input type="text" required id="email" name="email" class="form-control" value="{{ old('email', isset($faculty_resource) ? $faculty_resource->email : '') }}">--}}
                    {{--@if($errors->has('email'))--}}
                        {{--<em class="invalid-feedback">--}}
                            {{--{{ $errors->first('email') }}--}}
                        {{--</em>--}}
                    {{--@endif--}}
                    {{--<p class="helper-block">--}}
                        {{--{{ trans('global.product.fields.name_helper') }}--}}
                    {{--</p>--}}
                {{--</div>--}}

                <div class="form-group {{ $errors->has('department_id') ? 'has-error' : '' }}">
                    <label for="department_id">Departments*</label>

                    <select name="department_id" id="department_id" class="form-control select2">
                        @foreach($departments as $id => $department)
                            <option value="{{ $department->id }}" {{ old('department_id', isset($department) ? $department->name : '') }}>
                                {{ $department->name }}
                            </option>
                        @endforeach
                    </select>
                    @if($errors->has('department_id'))
                        <em class="invalid-feedback">
                            {{ $errors->first('department_id') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.role.fields.permissions_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('Designation') ? 'has-error' : '' }}">
                    <label for="permissions">Designation*</label>

                    <select name="designation_id" id="designation_id" class="form-control select2">
                        @foreach($designations as $id => $designation)
                            <option value="{{ $designation->id }}" {{ old('designation_id', isset($designation) ? $designation->name : '') }}>
                                {{ $designation->name }}
                            </option>
                        @endforeach
                    </select>
                    @if($errors->has('designation_id'))
                        <em class="invalid-feedback">
                            {{ $errors->first('designation_id') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.role.fields.permissions_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('Designation') ? 'has-error' : '' }}">
                    <label for="permissions">Type*</label>
                <select name="faculty_member_type_id" id="faculty_member_type_id" class="form-control select2">
                    @foreach($faculty_member_types as $id => $faculty_member_type)
                        <option value="{{ $faculty_member_type->id }}" {{ old('faculty_member_type_id', isset($faculty_member_type) ? $faculty_member_type->name : '') }}>
                            {{ $faculty_member_type->name }}
                        </option>
                    @endforeach
                </select>
                </div>
                <input type="hidden" id="faculty_member_type_id" name="faculty_member_type_id" value="1">


                <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
            </form>
        </div>
    </div>



@endsection
