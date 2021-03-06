@extends('admin.app')


@section('content')
    <div class="card border-0 shadow-sm mb-3">
        <div class="card-header bg-transparent">
            {{ __('Title.AddCategories') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.categories.store') }}">
                @csrf
                @method('PUT')

                <div class="form-group @if($errors->has('title'))has-error @endif">
                    <label for="title" class="col-form-label">@if($errors->has('title'))<i class="fa fa-times-circle-o"></i>@endif {{ __('Title.Name') }}</label>
                    <input id="title" class="form-control" name="title" value="{{ old('title') }}" >
                    @if ($errors->has('title'))
                        <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
                    @endif
                </div>

                <div class="form-group @if($errors->has('description'))has-error @endif">
                    <label for="description" class="col-form-label">{{ __('Title.Description') }}</label>
                    <textarea id="description" class="form-control" name="description" >{{ old('description') }}</textarea>
                    @if ($errors->has('description'))
                        <span class="help-block"><strong>{{ $errors->first('description') }}</strong></span>
                    @endif
                </div>

                <div class="form-group @if($errors->has('status'))has-error @endif">
                    <label for="status" class="col-form-label">{{ __('Title.Status') }}</label>
                    <select id="status" class="form-control" name="status">
                        <option class="" value="active" selected>Включить</option>
                        <option class="" value="deactivate" >Выключить</option>
                    </select>
                    @if ($errors->has('status'))
                        <span class="help-block"><strong>{{ $errors->first('status') }}</strong></span>
                    @endif
                </div>

                <div class="form-group @if($errors->has('icon'))has-error @endif">
                    <label for="icon" class="col-form-label">{{ __('Title.Icon') }}</label>
                    <input id="icon" class="form-control" name="icon" value="{{ old('icon') }}" >
                    @if ($errors->has('icon'))
                        <span class="help-block"><strong>{{ $errors->first('icon') }}</strong></span>
                    @endif
                </div>

                <div class="form-group @if($errors->has('image'))has-error @endif">
                    <label for="image" class="col-form-label">{{ __('Title.Image') }}</label>
                    <input id="image" class="form-control" name="image" value="{{ old('image') }}" >
                    @if ($errors->has('image'))
                        <span class="help-block"><strong>{{ $errors->first('image') }}</strong></span>
                    @endif
                </div>

                <div class="form-group @if($errors->has('parent'))has-error @endif">
                    <label for="parent" class="col-form-label">{{ __('Title.Parent') }}</label>
                    <select id="parent" class="form-control select2" name="parent">
                        <option value="" class="">-</option>
                        @foreach ($parents as $parent)
                            <option value="{{ $parent->id }}"{{ $parent->id == old('parent') ? ' selected' : '' }}>
                                @for ($i = 0; $i < $parent->depth; $i++) &mdash; @endfor
                                {{ $parent->title }}
                            </option>
                        @endforeach;
                    </select>
                    @if ($errors->has('parent'))
                        <span class="help-block"><strong>{{ $errors->first('parent') }}</strong></span>
                    @endif
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">{{ __('btn.Add') }}</button>
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-danger pull-right">Отменить</a>
                </div>
            </form>
        </div>
    </div>

@stop
