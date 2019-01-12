@extends('admin.app')


@section('content')

    <div class="card border-0 shadow-sm mb-3">
        <div class="card-header bg-transparent">
            {{ __('Title.AddMeasures') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.measures.store') }}">
                @csrf
                @method('PUT')

                <div class="form-group @if($errors->has('title'))has-error @endif">
                    <label for="title" class="col-form-label">@if($errors->has('title'))<i class="fa fa-times-circle-o"></i>@endif {{ __('Title.Name') }}</label>
                    <input id="title" class="form-control" name="title" value="{{ old('title') }}" >
                    @if ($errors->has('title'))
                        <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
                    @endif
                </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-primary">{{ __('btn.Add') }}</button>
                    <a href="{{ route('admin.measures.index') }}" class="btn btn-danger pull-right">Отменить</a>
                </div>
            </form>
        </div>
    </div>

@stop
