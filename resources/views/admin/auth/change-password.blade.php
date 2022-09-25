@extends('layouts.admin')
@section('content')

    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif
<div class="card">
        <div class="card-header">
            Change Password
        </div>

        <div class="card-body">
    <form action="{{ route("admin.change-password.store") }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
            <label for="name">Current Password</label>
            <input type="password" id="old" name="old" class="form-control" required >
            @if($errors->has('code'))
                <em class="invalid-feedback">
                    {{ $errors->first('old') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('global.product.fields.name_helper') }}
            </p>
        </div>

        <div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
            <label for="name">New Password</label>
            <input type="password" id="new" name="new" class="form-control" required >
            @if($errors->has('code'))
                <em class="invalid-feedback">
                    {{ $errors->first('old') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('global.product.fields.name_helper') }}
            </p>
        </div>

        <div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
            <label for="name">Confirm Password</label>
            <input type="password" id="confirm" name="confirm" class="form-control" required >
            @if($errors->has('code'))
                <em class="invalid-feedback">
                    {{ $errors->first('old') }}
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