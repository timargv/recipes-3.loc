@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col">
                <div class="card border-0 shadow-sm">
                    <div class="card-header">
                        {{ __('recipe.Create') }}
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('recipe.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="title" class="col-form-label">{{ __('Title') }}</label>
                                <input id="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required>
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback"><strong>{{ $errors->first('title') }}</strong></span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="portion" class="col-form-label">{{ __('portion') }}</label>
                                <input id="portion" class="form-control{{ $errors->has('portion') ? ' is-invalid' : '' }}" name="portion" value="{{ old('portion') }}" required>
                                @if ($errors->has('portion'))
                                    <span class="invalid-feedback"><strong>{{ $errors->first('portion') }}</strong></span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="hour" class="col-form-label">{{ __('hour') }}</label>
                                <input id="hour" class="form-control{{ $errors->has('hour') ? ' is-invalid' : '' }}" name="hour" value="{{ old('hour') }}" required>
                                @if ($errors->has('hour'))
                                    <span class="invalid-feedback"><strong>{{ $errors->first('hour') }}</strong></span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="minutes" class="col-form-label">{{ __('minutes') }}</label>
                                <input id="minutes" class="form-control{{ $errors->has('minutes') ? ' is-invalid' : '' }}" name="minutes" value="{{ old('minutes') }}" required>
                                @if ($errors->has('minutes'))
                                    <span class="invalid-feedback"><strong>{{ $errors->first('minutes') }}</strong></span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="calorie" class="col-form-label">{{ __('calorie') }}</label>
                                <input id="calorie" class="form-control{{ $errors->has('calorie') ? ' is-invalid' : '' }}" name="calorie" value="{{ old('calorie') }}" required>
                                @if ($errors->has('calorie'))
                                    <span class="invalid-feedback"><strong>{{ $errors->first('calorie') }}</strong></span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="squirrels" class="col-form-label">{{ __('squirrels') }}</label>
                                <input id="squirrels" class="form-control{{ $errors->has('squirrels') ? ' is-invalid' : '' }}" name="squirrels" value="{{ old('squirrels') }}" required>
                                @if ($errors->has('squirrels'))
                                    <span class="invalid-feedback"><strong>{{ $errors->first('squirrels') }}</strong></span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="fats" class="col-form-label">{{ __('fats') }}</label>
                                <input id="fats" class="form-control{{ $errors->has('fats') ? ' is-invalid' : '' }}" name="fats" value="{{ old('fats') }}" required>
                                @if ($errors->has('fats'))
                                    <span class="invalid-feedback"><strong>{{ $errors->first('fats') }}</strong></span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="carbohydrates" class="col-form-label">{{ __('carbohydrates') }}</label>
                                <input id="carbohydrates" class="form-control{{ $errors->has('carbohydrates') ? ' is-invalid' : '' }}" name="carbohydrates" value="{{ old('carbohydrates') }}" required>
                                @if ($errors->has('carbohydrates'))
                                    <span class="invalid-feedback"><strong>{{ $errors->first('carbohydrates') }}</strong></span>
                                @endif
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">{{ __('Send') }}</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

@stop
