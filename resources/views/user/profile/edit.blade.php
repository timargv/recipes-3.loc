@extends('layouts.app')


@section('content')
    <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-12 col-lg-8 px-md-3 px-0 mb-3">
                <div class="card border-0 shadow-sm rounded-0">
                    <div class="card-header border-0">Мои Рецепты</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name" class="col-form-label">{{ __('auth.UserName') }}</label>
                            <input id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $user->name) }}" placeholder="{{ __('auth.UserName') }}" required>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="first_name" class="col-form-label">{{ __('auth.FirstName') }}</label>
                            <input id="first_name" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name', $user->first_name) }}" placeholder="{{ __('auth.FirstName') }}" required>
                            @if ($errors->has('first_name'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('first_name') }}</strong></span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="last_name" class="col-form-label">{{ __('auth.LastName') }}</label>
                            <input id="last_name" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name', $user->last_name) }}" placeholder="{{ __('auth.LastName') }}" required>
                            @if ($errors->has('last_name'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('last_name') }}</strong></span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-form-label">{{ __('auth.Password') }}</label>
                            <input id="password" placeholder="******" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('password') }}</strong></span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-form-label">{{ __('auth.E_Mail') }}</label>
                            <input id="name" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email', $user->email) }}" required disabled>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('email') }}</strong></span>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{ __('profile.Save') }}</button>
                            <a class="btn btn-danger float-right" href="{{ URL::previous() }}">{{ __('profile.Back') }}</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 pl-md-0">
                <div class="card border-0 shadow-sm">
                    {{--<div class="card-header border-0"></div>--}}
                    <div class="card-img-top px-5 pb-4 pt-5">
                        <div class="px-4">
                            <img src="{{ $user->getAvatar() }}" alt="Card image" class="w-100 rounded-circle" style="height: 160px;">
                        </div>
                    </div>
                    <div class="card-subtitle px-3 py-4 h4 text-center font-weight-bold">
                        @if ($user->first_name && $user->last_name) {{ $user->first_name }} {{ $user->last_name }} @else{{ $user->name }}@endif
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-center mb-5">
                            <div class="align-self-center text-center px-3">
                                <div class="followers h4 font-weight-bold mb-0 text-monospace">1548</div>
                                <span class="text-lowercase small text-monospace">{{ __('profile.Followers') }}</span>
                            </div>
                            <div class="align-self-center text-center px-3">
                                <div class="following h4 font-weight-bold mb-0 text-monospace">1548</div>
                                <span class="text-lowercase small text-monospace">{{ __('profile.Following') }}</span>
                            </div>
                            <div class="align-self-center text-center px-3">
                                <div class="recupe-count h4 font-weight-bold mb-0 text-monospace">{{ $user->getReciperCountAttribute() }}</div>
                                <span class="text-lowercase small text-monospace">{{ __('profile.Recipes') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-file ">
                                <input type="file" name="avatar" class="custom-file-input" id="customFile">
                                <label class="custom-file-label label-avatar " for="customFile" >{{ __('Хотите поменять?') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    <style type="text/css">
        .label-avatar::after {
            content: 'Аватар' !important;
            color: #ffffff !important;
            background-color: #6cb2eb !important;
        }
    </style>

@stop