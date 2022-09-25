@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Rent a Unit
    </div>

    <div class="card-body">
        <form action="{{ route("admin.rentalunits.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                <label for="status">Project*</label>

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
            <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                <label for="status">Landlord</label>

                <select name="landlord_id" id="landlord_id" class="form-control select2">
                    @foreach($tenants as $tenant)
                        <option value="{{$tenant->id}}">
                            {{$tenant->name}} </option>
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
                <label for="status">Tenant</label>

                <select name="tenant_id" id="tenant_id" class="form-control select2">
                    @foreach($tenants as $tenant)
                        <option value="{{$tenant->id}}">
                            {{$tenant->name}} </option>
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
                <label for="description">Monthly Rent*</label>
                <input type="number" rows="1" id="monthly_rent" name="monthly_rent" class="form-control" required ></input>
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
                <label for="description">Monthly Maintenace</label>
                <input type="text" rows="1" id="maintenace" name="maintenace" class="form-control" required></input>
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
                <label for="description">Business Type</label>
                <input type="text" rows="1" id="business_type" name="business_type" class="form-control" required></input>
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
                <label for="description">Remarks*</label>
                <input type="text" rows="1" id="remarks" name="remarks" class="form-control" required ></input>
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
                <label for="description">Security*</label>
                <input type="number" rows="1" id="security" name="security" class="form-control" required></input>
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
                <label for="description">Receipt Number*</label>
                <input type="text" rows="1" id="receipt_number" name="receipt_number" class="form-control" required></input>
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
                <label for="description">Allotment Date*</label>
                <input type="date" rows="1" id="allotment_date" name="allotment_date" class="form-control" required ></input>
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

@endsection