@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.appointment.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.appointments.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.appointment.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.appointment.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="passport_number">{{ trans('cruds.appointment.fields.passport_number') }}</label>
                <input class="form-control {{ $errors->has('passport_number') ? 'is-invalid' : '' }}" type="text" name="passport_number" id="passport_number" value="{{ old('passport_number', '') }}">
                @if($errors->has('passport_number'))
                    <span class="text-danger">{{ $errors->first('passport_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.appointment.fields.passport_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.appointment.fields.doctor') }}</label>
                <select class="form-control {{ $errors->has('doctor') ? 'is-invalid' : '' }}" name="doctor" id="doctor" required>
                    <option value disabled {{ old('doctor', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Appointment::DOCTOR_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('doctor', '1') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('doctor'))
                    <span class="text-danger">{{ $errors->first('doctor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.appointment.fields.doctor_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="phone">{{ trans('cruds.appointment.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', '') }}" required>
                @if($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.appointment.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.appointment.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', '') }}" required>
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.appointment.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection