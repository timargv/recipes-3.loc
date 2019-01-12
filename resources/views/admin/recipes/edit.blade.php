@extends('admin.app')


@section('content')
    <div class="card border-0 shadow-sm mb-3">
        <div class="card-header bg-transparent">
            {{ __('Title.EditRecipes') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.recipes.update', $recipe) }}">
                @csrf
                @method('PUT')

                <div class="form-group @if($errors->has('title'))has-error @endif">
                    <label for="title" class="col-form-label">@if($errors->has('title'))<i class="fa fa-times-circle-o"></i>@endif {{ __('Title.Name') }}</label>
                    <input id="title" class="form-control" name="title" value="{{ old('title', $recipe->title) }}" >
                    @if ($errors->has('title'))
                        <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="author" class="col-form-label">{{ __('Title.Authors') }}</label>
                    <input id="author" class="form-control" value="{{ $recipe->author->name }}" name="author">
                </div>

                <div class="form-group">
                    <label for="text" class="col-form-label">{{ __('Title.Description') }}</label>
                    <textarea id="text" class="form-control" name="text">{{ $recipe->text }}</textarea>
                </div>

                <div class="form-group">
                    <label for="portion" class="col-form-label">{{ __('Порция') }}</label>
                    <input id="portion" class="form-control" value="{{ $recipe->portion }}" name="portion">
                </div>

                <div class="form-group">
                    <label for="hour" class="col-form-label">{{ __('Час') }}</label>
                    <input id="hour" class="form-control" value="{{ $recipe->hour }}" name="hour">
                </div>

                <div class="form-group">
                    <label for="minutes" class="col-form-label">{{ __('Минуты') }}</label>
                    <input id="minutes" class="form-control" value="{{ $recipe->minutes }}" name="minutes">
                </div>

                <div class="form-group">
                    <label for="calorie" class="col-form-label">{{ __('calorie') }}</label>
                    <input id="calorie" class="form-control" value="{{ $recipe->calorie }}" name="calorie">
                </div>

                <div class="form-group">
                    <label for="squirrels" class="col-form-label">{{ __('squirrels') }}</label>
                    <input id="squirrels" class="form-control" value="{{ $recipe->squirrels }}" name="squirrels">
                </div>

                <div class="form-group">
                    <label for="fats" class="col-form-label">{{ __('fats') }}</label>
                    <input id="fats" class="form-control" value="{{ $recipe->fats }}" name="fats">
                </div>

                <div class="form-group">
                    <label for="carbohydrates" class="col-form-label">{{ __('carbohydrates') }}</label>
                    <input id="carbohydrates" class="form-control" value="{{ $recipe->carbohydrates }}" name="carbohydrates">
                </div>

                <div class="form-group @if($errors->has('status'))has-error @endif">
                    <label for="status" class="col-form-label">{{ __('Title.Status') }} <span class="label label-{{ $recipe->status == 'active' ? 'success' : 'danger' }}">{{ $recipe->status == 'active' ? 'Active' : 'Выключено' }}</span></label>
                    <select id="status" class="form-control" name="status">
                        <option class="" value="active" {{ $recipe->status == 'active' ? ' selected' : '' }}>Включить</option>
                        <option class="" value="deactivate" {{ $recipe->status == 'deactivate' ? ' selected' : '' }}>Выключить</option>
                    </select>
                    @if ($errors->has('status'))
                        <span class="help-block"><strong>{{ $errors->first('status') }}</strong></span>
                    @endif
                </div>

                <div class="form-group @if($errors->has('confirmed_recipe'))has-error @endif">
                    <label for="confirmed_recipe" class="col-form-label">{{ __('Title.confirmed_recipe') }} <span class="label label-{{ $recipe->confirmed_recipe == 'yeas' ? 'success' : 'danger' }}">{{ $recipe->confirmed_recipe == 'yeas' ? 'Active' : 'Выключено' }}</span></label>
                    <select id="confirmed_recipe" class="form-control" name="confirmed_recipe">
                        <option class="" value="yeas" {{ $recipe->confirmed_recipe == 'yeas' ? ' selected' : '' }}>Включить</option>
                        <option class="" value="no" {{ $recipe->confirmed_recipe == 'no' ? ' selected' : '' }}>Выключить</option>
                    </select>
                    @if ($errors->has('status'))
                        <span class="help-block"><strong>{{ $errors->first('status') }}</strong></span>
                    @endif
                </div>

                <div id="list">
                    @foreach($recipe->amounts as $key => $amount)
                        <div id="list_field" class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group @if($errors->has('parent'))has-error @endif">
                                        <label for="parent" class="col-form-label">{{ __('Title.Ingredients') }}</label>
                                        <select id="ingredient" class="form-control select2" name="ingredient_id[{{ $key }}]">
                                            <option value="" class="ingredient">-</option>
                                            @foreach ($ingredients as $parent)
                                                <option value="{{ $parent->id }}"{{ $parent->id == old('parent', $amount->ingredient_id) ? ' selected' : '' }}>
                                                    {{--                                                @for ($i = 0; $i < $parent->depth; $i++) &mdash; @endfor--}}
                                                    {{ $parent->title }}
                                                </option>
                                            @endforeach;
                                        </select>
                                        @if ($errors->has('parent'))
                                            <span class="help-block"><strong>{{ $errors->first('parent') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="carbohydrates" class="col-form-label">{{ __('Title.Count') }}</label>
                                        <input id="amount" class="form-control" value="{{ $amount->amount }}" name="amount[{{ $key }}]">
                                        <input id="amount_id" value="{{ $amount->id }}" name="amount_id[{{ $key }}]" hidden>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group @if($errors->has('parent'))has-error @endif">
                                        <label for="parent" class="col-form-label">{{ __('Title.Measures') }}</label>
                                        <select id="measure" class="form-control select2" name="measure_id[{{ $key }}]">
                                            <option value="" class="measure">-</option>
                                            @foreach ($measures as $parent)
                                                <option value="{{ $parent->id }}"{{ $parent->id == old('parent', $amount->measure_id) ? ' selected' : '' }}>
                                                    {{--                                                @for ($i = 0; $i < $parent->depth; $i++) &mdash; @endfor--}}
                                                    {{ $parent->title }}
                                                </option>
                                            @endforeach;
                                        </select>
                                        @if ($errors->has('parent'))
                                            <span class="help-block"><strong>{{ $errors->first('parent') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div align="center">
                    <button type="button" name="add" class="btn btn-success btn-sm add">
                        <i class="fa fa-plus"></i>
                    </button>

                </div>

                <div class="form-group @if($errors->has('parent'))has-error @endif">
                    <label for="parent" class="col-form-label">{{ __('Title.Categories') }}</label>
                    <select id="parent" class="form-control select2" name="parent">
                        <option value="" class="">-</option>
                        @foreach ($categories as $parent)
                            <option value="{{ $parent->id }}"{{ $parent->id == old('parent', $recipe->category_id) ? ' selected' : '' }}>
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
                    <button type="submit" class="btn btn-primary">{{ __('btn.Save') }}</button>
                    <a href="{{ route('admin.recipes.index') }}" class="btn btn-danger pull-right">Отменить</a>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $(document).on('click', '.add', function() {
                $("#list_field").clone().appendTo("#list");
            });
        });
    </script>
@stop
