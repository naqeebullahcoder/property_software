@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Edit Rental Unit
        </div>

        <div class="card-body">
            <form action="{{ route("admin.rentalunits.update",[$rental_unit]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                    <label for="status">Project*</label>

                    <select name="project_id" id="project_id" class="form-control select2">
                        @foreach($projects as $project)
                            <option value="{{$project->id}}" {{ old('project_id', $rental_unit->project_id) == $project->id ? 'selected' : '' }} >
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
                            <option value="{{$unit->id}}" {{ old('unit_id', $rental_unit->unit_id) == $unit->id ? 'selected' : '' }} >
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
                            <option value="{{$tenant->id}}" {{ old('landlord_id', $rental_unit->landlord_id) == $tenant->id ? 'selected' : '' }} >
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
                            <option value="{{$tenant->id}}" {{ old('tenant_id', $rental_unit->tenant_id) == $tenant->id ? 'selected' : '' }} >
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
                    <input type="number" rows="1" id="monthly_rent" name="monthly_rent" class="form-control" required value="{{ old('monthly_rent', isset($rental_unit) ? $rental_unit->monthly_rent : '') }}" ></input>
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
                    <label for="description">Monthly Maintenance*</label>
                    <input type="number" rows="1" id="maintenace" name="maintenace" class="form-control" required value="{{ old('maintenace', isset($rental_unit) ? $rental_unit->maintenace : '') }}"></input>
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
                    <label for="description">Business Type*</label>
                    <input type="text" rows="1" id="business_type" name="business_type" class="form-control" required value="{{ old('business_type', isset($rental_unit) ? $rental_unit->business_type : '') }}"></input>
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
                    <input type="text" rows="1" id="remarks" name="remarks" class="form-control" required value="{{ old('remarks', isset($rental_unit) ? $rental_unit->remarks : '') }}"></input>
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
                    <input type="number" rows="1" id="security" name="security" class="form-control" required value="{{ old('security', isset($rental_unit) ? $rental_unit->security : '') }}"></input>
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
                    <input type="text" rows="1" id="receipt_number" name="receipt_number" class="form-control" required value="{{ old('receipt_number', isset($rental_unit) ? $rental_unit->receipt_number : '') }}"></input>
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
                    <input type="date" rows="1" id="allotment_date" name="allotment_date" class="form-control" required value="{{ old('allotment_date', isset($rental_unit) ? $rental_unit->allotment_date : '') }}"></input>
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
                    <label for="status">Active Status*</label>

                    <select name="status" id="status" class="form-control select2">
                        @foreach($status as $active_status)
                            <option value="{{$active_status->id}}" {{ old('status', $rental_unit->status) == $active_status->id ? 'selected' : '' }}>
                                {{$active_status->name}}</option>
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

    <div class="card">
        <div class="card-header">
            Upload Documents
        </div>

        <div class="card-body">
            @if(isset($document))
                <form action="{{ route("admin.documents.update",[$document->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @else
                        <form action="{{ route("admin.documents.store") }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            @endif


                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                <label for="year">Title*</label>
                                <input type="text" required id="title" name="title" class="form-control" value="{{ old('title', isset($document) ? $document->title : '') }}">
                                @if($errors->has('year'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('year') }}
                                    </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('global.product.fields.name_helper') }}
                                </p>
                            </div>

                            <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                                <label for="picture">Documents</label>
                                <input type="file" rows="2" id="image" name="image[]" class="form-control" value="{{ old('image', isset($document) ? $document->image : '') }}" multiple>
                                @if($errors->has('description'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('picture') }}
                                    </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('global.product.fields.name_helper') }}
                                </p>
                            </div>

                            <input type="hidden" id="rental_unit_id" name="rental_unit_id" value="{{ old('rental_unit_id', isset($rental_unit) ? $rental_unit->id : '') }}">

                            <div>
                                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                            </div>
                        </form>
                        <br/>
                        <div >
                            <h4>Documents</h4>
                        </div>

                        <table class="table table-bordered table-responsive">
                            <tbody>

                            @foreach($rental_unit->Documents as $key=> $document)
                                <tr>
                                    <td>
                                        {{$key+1}}
                                    </td>
                                    <td>
                                        {{$document->title}}
                                    </td>
                                    <td>
                                        {{--{{$document->description}}--}}
                                        @foreach($document->Media as $key=> $media)
                                            <a href="{{asset('public/uploads/documents/'.$media->picture)}}">{{$media->picture}}</a>
                                        @endforeach
                                    </td>
                                    <td>
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.documents.edit', $document->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                        <form action=" {{ route('admin.documents.destroy', $document->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                </form>
        </div>

    </div>

@endsection
