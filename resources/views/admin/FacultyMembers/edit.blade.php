@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Edit Faculty Member
        </div>

        <div class="card-body">
            <form action="{{ route("admin.faculty-members.update",[$faculty_resource]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @if(Illuminate\Support\Facades\Session::get('role')!=1)
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">Name*</label>
                    <input type="text" disabled id="name" name="name" class="form-control" value="{{ old('name', isset($faculty_resource) ? $faculty_resource->user->name : '') }}">
                    @if($errors->has('name'))
                        <em class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email">Email*</label>
                    <input type="text" disabled id="email" name="email" class="form-control" value="{{ old('email', isset($faculty_resource) ? $faculty_resource->user->email : '') }}">
                    @if($errors->has('email'))
                        <em class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>
                @endif
                <input type="text" hidden id="user_id" name="user_id" class="form-control" value="{{ old('user_id', isset($faculty_resource) ? $faculty_resource->user_id : '') }}">
                @if(Illuminate\Support\Facades\Session::get('role')==1)
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="user_id">User*</label>
                    <select name="user_id" id="user_id" class="form-control select2">
                        @foreach(App\User::all() as $id => $user)
                            <option value="{{$user->id}}" {{ old('user_id', $faculty_resource->user_id) == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}- ({{$user->email}})
                            </option>
                        @endforeach
                    </select>
                </div>
                @endif
                <div class="form-group {{ $errors->has('qualification') ? 'has-error' : '' }}">

                    @if(Illuminate\Support\Facades\Session::get('role')==1)
                        <input type="text" hidden id="qualification" name="qualification" class="form-control" value="{{ old('qualification', isset($faculty_resource) ? $faculty_resource->qualification : '') }}">
                    @else
                        <label for="qualification">Qualification*</label>
                        <input type="text" id="qualification" name="qualification" class="form-control" value="{{ old('qualification', isset($faculty_resource) ? $faculty_resource->qualification : '') }}">
                    @endif

                    @if($errors->has('qualification'))
                        <em class="invalid-feedback">
                            {{ $errors->first('qualification') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>

                <div class="form-group {{ $errors->has('joining_date') ? 'has-error' : '' }}">

                    <label for="picture">Date of Birth</label>
                    <input type="date" id="dob" name="dob" class="form-control" value="{{ old('dob', isset($faculty_resource) ? $faculty_resource->dob : '') }}">

                    @if($errors->has('picture'))
                        <em class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('joining_date') ? 'has-error' : '' }}">

                        <label for="picture">Joining Date</label>
                        <input type="date" id="joining_date" name="joining_date" class="form-control" value="{{ old('joining_date', isset($faculty_resource) ? $faculty_resource->joining_date : '') }}">

                    @if($errors->has('picture'))
                        <em class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>

                <div class="form-group {{ $errors->has('picture') ? 'has-error' : '' }}">

                    @if(Illuminate\Support\Facades\Session::get('role')==1)
                        <input type="file" hidden id="picture" name="picture" class="form-control" value="{{ old('picture', isset($faculty_resource) ? $faculty_resource->picture : '') }}">
                    @else
                        <label for="picture">picture</label>
                        <input type="file" id="picture" name="picture" class="form-control" value="{{ old('picture', isset($faculty_resource) ? $faculty_resource->picture : '') }}">
                    @endif
                    @if($errors->has('picture'))
                        <em class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>

                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">

                    @if(Illuminate\Support\Facades\Session::get('role')==1)
                        <textarea id="biography" hidden name="biography" class="form-control ">{{ old('biography', isset($faculty_resource) ? $faculty_resource->biography : '') }}</textarea>
                    @else
                        <label for="description">Biography</label>
                        <textarea id="biography" name="biography" class="form-control ">{{ old('biography', isset($faculty_resource) ? $faculty_resource->biography : '') }}</textarea>
                    @endif

                    @if($errors->has('description'))
                        <em class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </em>
                    @endif
                    <p class="helper-block">

                    </p>
                </div>
                <div class="form-group {{ $errors->has('department_id') ? 'has-error' : '' }}">

                    @if(Illuminate\Support\Facades\Session::get('role')==1)
                        <label for="department_id">Departments*</label>
                        <select name="department_id" id="department_id" class="form-control select2">
                            @foreach($departments as $id => $department)
                                <option value="{{$department->id}}" {{ old('department_id', $faculty_resource->department_id) == $department->id ? 'selected' : '' }}>
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        </select>

                    @else

                        <input type="text" hidden id="department_id" name="department_id" class="form-control" value="{{ old('department_id', isset($faculty_resource) ? $faculty_resource->department_id : '') }}">

                    @endif


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

                    @if(Illuminate\Support\Facades\Session::get('role')==1)
                        <label for="permissions">Designation*</label>
                        <select name="designation_id" id="designation_id" class="form-control select2">

                            @foreach($designations as $id => $designation)
                                <option value="{{$designation->id}}" {{ old('designation_id', $faculty_resource->designation_id) == $designation->id ? 'selected' : '' }}>
                                    {{ $designation->name }}
                                </option>
                            @endforeach
                        </select>

                    @else

                     <input type="text" hidden id="designation_id" name="designation_id" class="form-control" value="{{ old('designation_id', isset($faculty_resource) ? $faculty_resource->designation_id : '') }}">

                     @endif

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

                    @if(Illuminate\Support\Facades\Session::get('role')==1)
                        <label for="permissions">Type*</label>
                        <select name="faculty_member_type_id" id="faculty_member_type_id" class="form-control select2">
                            @foreach($faculty_member_types as $id => $faculty_member_type)
                                <option value="{{$faculty_member_type->id}}" {{ old('faculty_member_type_id', $faculty_resource->faculty_member_type_id) == $faculty_member_type->id ? 'selected' : '' }}>
                                    {{ $faculty_member_type->name }}
                                </option>
                            @endforeach
                        </select>

                    @else

                    <input type="text" hidden id="faculty_member_type_id" name="faculty_member_type_id" class="form-control" value="{{ old('faculty_member_type_id', isset($faculty_resource) ? $faculty_resource->faculty_member_type_id : '') }}">

                    @endif

                </div>


                <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
            </form>
        </div>
    </div>
    @if(Illuminate\Support\Facades\Session::get('role')!=1)
    <div class="card">
        <div class="card-header">
            Edit Honours and Awards
        </div>

        <div class="card-body">
            @if(isset($honours_and_award))
                <form action="{{ route("admin.awards.update",[$honours_and_award->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
            @else
                 <form action="{{ route("admin.awards.store") }}" method="POST" enctype="multipart/form-data">
                 @csrf

            @endif


                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="year">Year*</label>
                    <input type="text" required id="year" name="year" class="form-control" value="{{ old('year', isset($honours_and_award) ? $honours_and_award->year : '') }}">
                    @if($errors->has('year'))
                        <em class="invalid-feedback">
                            {{ $errors->first('year') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>

                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                    <label for="description">Description*</label>
                    <input type="text" required id="description" name="description" class="form-control" value="{{ old('description', isset($honours_and_award) ? $honours_and_award->description : '') }}">
                    @if($errors->has('description'))
                        <em class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>
                <input type="hidden" id="faculty_members_id" name="faculty_members_id" value="{{ old('year', isset($faculty_resource) ? $faculty_resource->id : '') }}">

                <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
            </form>
                <br/>
                <div >
                   <h4>HONOURS AND AWARDS</h4>
                </div>

                    <table class="table table-bordered table-responsive">
                        <tbody>

                        @foreach($faculty_resource->honours_and_awards as $key=> $honours_and_award)
                            <tr>
                                <td>
                                    {{$key+1}}
                                </td>
                                <td>
                                    {{$honours_and_award->year}}
                                </td>
                                <td>
                                    {{$honours_and_award->description}}
                                </td>
                                <td>
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.awards.edit', $honours_and_award->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                    <form action=" {{ route('admin.awards.destroy', $honours_and_award->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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


        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Edit Publications
        </div>

        <div class="card-body">

            @if(isset($publications_and_conference))
                <form action="{{ route("admin.publications.update",[$publications_and_conference->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
            @else
               <form action="{{ route("admin.publications.store") }}" method="POST" enctype="multipart/form-data">
               @csrf
            @endif

                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="year">Publication Type*</label>
                <select name="publication_type" required id="publication_type" class="form-control select2">

                    @if(isset($publications_and_conference))
                    <option value="1" {{ old('publication_type', $publications_and_conference->publication_type) == "1" ? 'selected' : '' }} >Book</option>
                    <option value="2"  {{ old('publication_type',$publications_and_conference->publication_type) =="2" ? 'selected' : '' }} >Book Chapter</option>
                    <option value="3" {{ old('publication_type', $publications_and_conference->publication_type) == "3" ? 'selected' : '' }}>Journal Papers</option>
                    <option value="4" {{ old('publication_type', $publications_and_conference->publication_type) == "4" ? 'selected' : '' }}>Journal Papers - Peer Reviewed</option>
                    <option value="5" {{ old('publication_type', $publications_and_conference->publication_type) == "5" ? 'selected' : '' }}>Conference and proceedings</option>
                    @else
                        <option value="1"  >Book</option>
                        <option value="2"  >Book Chapter</option>
                        <option value="3" >Journal Papers</option>
                        <option value="4" >Journal Papers - Peer Reviewed</option>
                        <option value="5" >Conference and proceedings</option>
                    @endif

                </select>
                </div>
                   <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                       <label for="year">Year*</label>
                       <input type="text" required id="year" name="year" class="form-control" value="{{ old('year', isset($publications_and_conference) ? $publications_and_conference->year : '') }}">
                       @if($errors->has('year'))
                           <em class="invalid-feedback">
                               {{ $errors->first('year') }}
                           </em>
                       @endif
                       <p class="helper-block">
                           {{ trans('global.product.fields.name_helper') }}
                       </p>
                   </div>
                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                    <label for="description">Description*</label>
                    <input type="text" required id="description" name="description" class="form-control" value="{{ old('description', isset($publications_and_conference) ? $publications_and_conference->description : '') }}">
                    @if($errors->has('description'))
                        <em class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="year">Extenal Link</label>
                    <input type="url" id="web_link" name="web_link" class="form-control" value="{{ old('web_link', isset($publications_and_conference) ? $publications_and_conference->web_link : '') }}">
                    @if($errors->has('year'))
                        <em class="invalid-feedback">
                            {{ $errors->first('year') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>
                <input type="hidden" id="faculty_members_id" name="faculty_members_id" value="{{ old('year', isset($faculty_resource) ? $faculty_resource->id : '') }}">

                <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
            </form>
                <br/>
                <div >
                    <h4>PUBLICATIONS :</h4>
                </div>
                <br/>
                @if(count($faculty_resource->publications_and_conferences->where('publication_type',1))>0)
                <div >
                    <h4>BOOKS </h4>
                </div>
                <!--<table class="table table-bordered table-striped">-->
                <table class="table table-bordered table-responsive">
                    <tbody>

                    @foreach($faculty_resource->publications_and_conferences->where('publication_type',1) as $key=> $publications_and_conference)
                        <tr>
                            <td nowrap="nowrap" width="40">
                                {{$key+1}}
                            </td>
                            <td nowrap="nowrap" width="72">
                                {{$publications_and_conference->year}}
                            </td>
                            <td nowrap="nowrap" width="296">
                                {{$publications_and_conference->description}}
                            </td>

                            <td nowrap="nowrap" width="298">
                                {{$publications_and_conference->web_link}}
                            </td>
                            <td>
                                <a class="btn btn-xs btn-info" href="{{ route('admin.publications.edit', $publications_and_conference->id) }}">
                                    {{ trans('global.edit') }}
                                </a>
                                <form action=" {{ route('admin.publications.destroy', $publications_and_conference->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
                @endif
                @if(count($faculty_resource->publications_and_conferences->where('publication_type',2))>0)
                <div >
                    <h4>BOOK CHAPTERS </h4>
                </div>
                <table class="table table-bordered table-responsive">
                    <tbody>

                    @foreach($faculty_resource->publications_and_conferences->where('publication_type',2) as $key=> $publications_and_conference)
                        <tr>
                            <td>
                                {{$key+1}}
                            </td>
                            <td>
                                {{$publications_and_conference->year}}
                            </td>
                            <td>
                                {{$publications_and_conference->description}}
                            </td>
                            <td>
                                {{$publications_and_conference->web_link}}
                            </td>
                            <td>
                                <a class="btn btn-xs btn-info" href="{{ route('admin.publications.edit', $publications_and_conference->id) }}">
                                    {{ trans('global.edit') }}
                                </a>
                                <form action=" {{ route('admin.publications.destroy', $publications_and_conference->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
                @endif
                @if(count($faculty_resource->publications_and_conferences->where('publication_type',3))>0)
                <div >
                    <h4>JOURNAL PAPERS </h4>
                </div>
                <table class="table table-bordered table-responsive">
                    <tbody>

                    @foreach($faculty_resource->publications_and_conferences->where('publication_type',3) as $key=> $publications_and_conference)
                        <tr>
                            <td>
                                {{$key+1}}
                            </td>
                            <td>
                                {{$publications_and_conference->year}}
                            </td>
                            <td>
                                {{$publications_and_conference->description}}
                            </td>
                            <td>
                                {{$publications_and_conference->web_link}}
                            </td>
                            <td>
                                <a class="btn btn-xs btn-info" href="{{ route('admin.publications.edit', $publications_and_conference->id) }}">
                                    {{ trans('global.edit') }}
                                </a>
                                <form action=" {{ route('admin.publications.destroy', $publications_and_conference->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
                @endif
                @if(count($faculty_resource->publications_and_conferences->where('publication_type',4) )>0)
                <div >
                    <h4>JOUNAL PAPERS - PEER REVIEWED </h4>
                </div>
                <table class="table table-bordered table-responsive">
                    <tbody>

                    @foreach($faculty_resource->publications_and_conferences->where('publication_type',4) as $key=> $publications_and_conference)
                        <tr>
                            <td>
                                {{$key+1}}
                            </td>
                            <td>
                                {{$publications_and_conference->year}}
                            </td>
                            <td>
                                {{$publications_and_conference->description}}
                            </td>
                            <td>
                                {{$publications_and_conference->web_link}}
                            </td>
                            <td>
                                <a class="btn btn-xs btn-info" href="{{ route('admin.publications.edit', $publications_and_conference->id) }}">
                                    {{ trans('global.edit') }}
                                </a>
                                <form action=" {{ route('admin.publications.destroy', $publications_and_conference->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
                @endif
                @if(count($faculty_resource->publications_and_conferences->where('publication_type',5))>0)
                <div >
                    <h4>CONFERENCES AND PROCEEDINGS </h4>
                </div>
                <table class="table table-bordered table-responsive">
                    <tbody>

                    @foreach($faculty_resource->publications_and_conferences->where('publication_type',5) as $key=> $publications_and_conference)
                        <tr>
                            <td>
                                {{$key+1}}
                            </td>
                            <td>
                                {{$publications_and_conference->year}}
                            </td>
                            <td>
                                {{$publications_and_conference->description}}
                            </td>
                            <td>
                                {{$publications_and_conference->web_link}}
                            </td>
                            <td>
                                <a class="btn btn-xs btn-info" href="{{ route('admin.publications.edit', $publications_and_conference->id) }}">
                                    {{ trans('global.edit') }}
                                </a>
                                <form action=" {{ route('admin.publications.destroy', $publications_and_conference->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
                    @endif

        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Edit Workshops and Seminars
        </div>

        <div class="card-body">
            @if(isset($workshops_and_seminars))
                <form action="{{ route("admin.workshops.update",[$workshops_and_seminars->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @else
                        <form action="{{ route("admin.workshops.store") }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            @endif


                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                <label for="year">Year*</label>
                                <input type="text" required id="year" name="year" class="form-control" value="{{ old('year', isset($workshops_and_seminars) ? $workshops_and_seminars->year : '') }}">
                                @if($errors->has('year'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('year') }}
                                    </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('global.product.fields.name_helper') }}
                                </p>
                            </div>

                            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                <label for="description">Description*</label>
                                <input type="text" required id="description" name="description" class="form-control" value="{{ old('description', isset($workshops_and_seminars) ? $workshops_and_seminars->description : '') }}">
                                @if($errors->has('description'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('description') }}
                                    </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('global.product.fields.name_helper') }}
                                </p>
                            </div>
                            <input type="hidden" id="faculty_members_id" name="faculty_members_id" value="{{ old('year', isset($faculty_resource) ? $faculty_resource->id : '') }}">

                            <div>
                                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                            </div>
                        </form>
                        <br/>
                        <div >
                            <h4>WORKSHOPS AND SEMINARS</h4>
                        </div>

                        <table class="table table-bordered table-responsive">
                            <tbody>

                            @foreach($faculty_resource->workshops_and_seminars as $key=> $workshops_and_seminar)
                                <tr>
                                    <td>
                                        {{$key+1}}
                                    </td>
                                    <td>
                                        {{$workshops_and_seminar->year}}
                                    </td>
                                    <td>
                                        {{$workshops_and_seminar->description}}
                                    </td>
                                    <td>
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.workshops.edit', $workshops_and_seminar->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                        <form action=" {{ route('admin.workshops.destroy', $workshops_and_seminar->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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


        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Edit Memberships
        </div>

        <div class="card-body">
            @if(isset($memberships))
                <form action="{{ route("admin.memberships.update",[$memberships->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @else
                        <form action="{{ route("admin.memberships.store") }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            @endif


                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                <label for="year">Year*</label>
                                <input type="text" required id="year" name="year" class="form-control" value="{{ old('year', isset($memberships) ? $memberships->year : '') }}">
                                @if($errors->has('year'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('year') }}
                                    </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('global.product.fields.name_helper') }}
                                </p>
                            </div>

                            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                <label for="description">Description*</label>
                                <input type="text" required id="description" name="description" class="form-control" value="{{ old('description', isset($memberships) ? $memberships->description : '') }}">
                                @if($errors->has('description'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('description') }}
                                    </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('global.product.fields.name_helper') }}
                                </p>
                            </div>
                            <input type="hidden" id="faculty_members_id" name="faculty_members_id" value="{{ old('year', isset($faculty_resource) ? $faculty_resource->id : '') }}">

                            <div>
                                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                            </div>
                        </form>
                        <br/>
                        <div >
                            <h4>Memberships</h4>
                        </div>

                        <table class="table table-bordered table-responsive">
                            <tbody>

                            @foreach($faculty_resource->memberships as $key=> $membership)
                                <tr>
                                    <td>
                                        {{$key+1}}
                                    </td>
                                    <td>
                                        {{$membership->year}}
                                    </td>
                                    <td>
                                        {{$membership->description}}
                                    </td>
                                    <td>
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.memberships.edit', $membership->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                        <form action=" {{ route('admin.memberships.destroy', $membership->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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


        </div>
    </div>
    @endif
@endsection
