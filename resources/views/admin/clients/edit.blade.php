@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.client.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.clients.update", [$client->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                <label for="first_name">{{ trans('cruds.client.fields.first_name') }}*</label>
                <input type="text" id="first_name" name="first_name" class="form-control" value="{{ old('first_name', isset($client) ? $client->first_name : '') }}" required>
                @if($errors->has('first_name'))
                    <p class="help-block">
                        {{ $errors->first('first_name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.client.fields.first_name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                <label for="last_name">{{ trans('cruds.client.fields.last_name') }}</label>
                <input type="text" id="last_name" name="last_name" class="form-control" value="{{ old('last_name', isset($client) ? $client->last_name : '') }}">
                @if($errors->has('last_name'))
                    <p class="help-block">
                        {{ $errors->first('last_name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.client.fields.last_name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('company') ? 'has-error' : '' }}">
                <label for="company">{{ trans('cruds.client.fields.company') }}</label>
                <input type="text" id="company" name="company" class="form-control" value="{{ old('company', isset($client) ? $client->company : '') }}">
                @if($errors->has('company'))
                    <p class="help-block">
                        {{ $errors->first('company') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.client.fields.company_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('cruds.client.fields.email') }}</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($client) ? $client->email : '') }}">
                @if($errors->has('email'))
                    <p class="help-block">
                        {{ $errors->first('email') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.client.fields.email_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                <label for="phone">{{ trans('cruds.client.fields.phone') }}</label>
                <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', isset($client) ? $client->phone : '') }}">
                @if($errors->has('phone'))
                    <p class="help-block">
                        {{ $errors->first('phone') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.client.fields.phone_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('website') ? 'has-error' : '' }}">
                <label for="website">{{ trans('cruds.client.fields.website') }}</label>
                <input type="text" id="website" name="website" class="form-control" value="{{ old('website', isset($client) ? $client->website : '') }}">
                @if($errors->has('website'))
                    <p class="help-block">
                        {{ $errors->first('website') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.client.fields.website_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('skype') ? 'has-error' : '' }}">
                <label for="skype">{{ trans('cruds.client.fields.skype') }}</label>
                <input type="text" id="skype" name="skype" class="form-control" value="{{ old('skype', isset($client) ? $client->skype : '') }}">
                @if($errors->has('skype'))
                    <p class="help-block">
                        {{ $errors->first('skype') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.client.fields.skype_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('country') ? 'has-error' : '' }}">
                <label for="country">{{ trans('cruds.client.fields.country') }}</label>
                <input type="text" id="country" name="country" class="form-control" value="{{ old('country', isset($client) ? $client->country : '') }}">
                @if($errors->has('country'))
                    <p class="help-block">
                        {{ $errors->first('country') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.client.fields.country_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('status_id') ? 'has-error' : '' }}">
                <label for="status">{{ trans('cruds.client.fields.status') }}</label>
                <select name="status_id" id="status" class="form-control select2">
                    @foreach($statuses as $id => $status)
                        <option value="{{ $id }}" {{ (isset($client) && $client->status ? $client->status->id : old('status_id')) == $id ? 'selected' : '' }}>{{ $status }}</option>
                    @endforeach
                </select>
                @if($errors->has('status_id'))
                    <p class="help-block">
                        {{ $errors->first('status_id') }}
                    </p>
                @endif
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection