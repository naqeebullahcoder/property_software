@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
       Pay Monthly Rent
    </div>

    <div class="card-body">
        <form action="{{ route("admin.monthlyrents.update",[$monthly_rent->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">Month of Rent</label>
                <input type="text" rows="1" id="month" name="month" class="form-control" disabled required value="{{ old('month', isset($monthly_rent) ? $monthly_rent->month : '') }}"></input>
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
                <label for="description">Monthly Rent</label>
                <input type="text" rows="1" id="monthly_rent" name="monthly_rent" class="form-control" disabled required value="{{ old('monthly_rent', isset($monthly_rent) ? $monthly_rent->monthly_rent : '') }}"></input>
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
                <label for="description">Received Amount*</label>
                <input type="number" rows="1" id="received_payment" name="received_payment" class="form-control" required value="{{ old('received_payment', isset($monthly_rent) ? $monthly_rent->received_payment : '') }}"></input>
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
                <input type="text" rows="1" id="receipt_number" name="receipt_number" class="form-control" required value="{{ old('receipt_number', isset($monthly_rent) ? $monthly_rent->receipt_number : '') }}"></input>
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
                <label for="description">Payment date*</label>
                <input type="date" rows="1" id="payment_date" name="payment_date" class="form-control" required value="{{ old('payment_date', isset($monthly_rent) ? $monthly_rent->payment_date : '') }}"></input>
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