@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Create Event
    </div>

    <div class="card-body">
        <form action="{{ route("admin.events.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">Event Title*</label>
                <input type="text" id="title" name="title" class="form-control" required value="{{ old('title', isset($product) ? $product->name : '') }}">
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
                <label for="description">Event Details*</label>
                <textarea type="text" rows="1" id="description" name="description" class="form-control" required value="{{ old('description', isset($product) ? $product->name : '') }}"></textarea>
                @if($errors->has('description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('picture') ? 'has-error' : '' }}">
                <label for="picture">Pictures</label>
                <input type="file" rows="2" id="picture" name="picture[]" class="form-control" value="{{ old('picture', isset($product) ? $product->name : '') }}" multiple>
                @if($errors->has('description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('picture') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('news_link') ? 'has-error' : '' }}">
                <label for="video_link"> Youtube link</label>
                <input type="url" rows="2" id="video_link" name="video_link" class="form-control"  value="{{ old('video_link', isset($product) ? $product->name : '') }}">
                @if($errors->has('news_link'))
                    <em class="invalid-feedback">
                        {{ $errors->first('news_link') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                <label for="title">Event Date*</label>
                <input type="date" id="date" name="date" class="form-control" required value="{{ old('date', isset($product) ? $product->name : '') }}">
                @if($errors->has('date'))
                    <em class="invalid-feedback">
                        {{ $errors->first('date') }}
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
                        <option value="{{$active_status->id}}" >
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

@endsection