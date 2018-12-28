@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-8 pl-md-3 px-0 mb-3 pr-md-0">
                <div class="card border-0 shadow-sm rounded-0 mb-3">
                    {{--<div class="card-header border-0">Мои Рецепты</div>--}}
                    <div class="card-body p-0">
                        <div class="card my-3 pb-3 border-0 px-0">
                            <div class="card-header bg-transparent p-0 border-0">
                                <div class="d-flex bd-highlight recipe-header-sh px-3 ml-1">
                                    <div class="align-self-top">
                                        <img class="rounded-circle" src="{{ $recipe->author->getAvatar() }}" alt="Card image" width="50px" height="50px">
                                    </div>
                                    <div class="align-self-center flex-grow-1 pl-3">
                                        <a class="card-subtitle m-0 text-decoration-none h5" href="{{ route('recipe.show', $recipe->id) }}">
                                            {{ $recipe->title }}
                                        </a>
                                        <div class="d-flex">
                                            <a href="{{ route('user.show', $recipe->author->id) }}" class="small text-muted font-weight-light align-self-center">
                                                @if ($recipe->author->first_name && $recipe->author->last_name) {{ $recipe->author->first_name }} {{ $recipe->author->last_name }} @else{{ $recipe->author->name }}@endif
                                            </a>
                                            <i class="fa fa-angle-right text-muted align-self-center px-2"></i>
                                            <span class="small text-muted font-weight-light align-self-center">{{ $recipe->created_at->diffForHumans()}}</span>
                                        </div>
                                    </div>
                                    @if($recipe->author == Auth::user())
                                        <div class="align-self-top">
                                            <button type="submit" class="btn btn-sm bg-transparent pr-0 text-muted-50">
                                                <i class="fa fa-close"></i>
                                            </button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="pt-3 px-md-3 ml-md-1 ml-0 px-0">
                                    <div class="card-img">
                                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                            <ol class="carousel-indicators">
                                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                            </ol>
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img class="d-block w-100" src="https://via.placeholder.com/400x250/DDDDDD/FFFFFF/" alt="Card image">
                                                </div>
                                                <div class="carousel-item">
                                                    <img class="d-block w-100" src="https://via.placeholder.com/400x250/DDDDDD/FFFFFF/" alt="Card image">
                                                </div>
                                                <div class="carousel-item">
                                                    <img class="d-block w-100" src="https://via.placeholder.com/400x250/DDDDDD/FFFFFF/" alt="Card image">
                                                </div>
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-text">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent p-0 border-0 py-2">
                                <div class="d-flex  recipe-header-sh px-3 ml-1 recipe-footer-tool-icon">
                                    <div class="align-self-center flex-grow-1">
                                        <nav class="nav list-unstyled">
                                            <li class="nav-item mr-3">
                                                <button class="p-0 btn btn-sm bg-transparent "><i class="fa fa-heart-o text-muted"></i></button>
                                                <span class="text-muted-50">152</span>
                                            </li>

                                            <li class="nav-item mr-3">
                                                <button class=" p-0 btn btn-sm bg-transparent "><i class="fa fa-comment-o text-muted"></i></button>
                                                {{--<span class="text-muted-50">152</span>--}}
                                            </li>
                                        </nav>
                                    </div>

                                    <div class="align-self-center">
                                        <button type="submit" class="btn btn-sm bg-transparent pr-0 text-muted-50">
                                            <i class="fa fa-bookmark-o"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="d-flex  recipe-header-sh px-3 ml-1 flex-column">
                                    <div class="recipe-author-sh align-self-top mb-1">
                                        {{--<span class="small">Автор:</span>--}}
                                        <a href="{{ route('user.show', $recipe->author->id) }}" class="small text-dark font-weight-bold align-self-center">{{ $recipe->author->name }}</a>
                                        <span class="small text-muted pl-1">{{ $recipe->created_at->diffForHumans()}}</span>
                                    </div>
                                    <div class="recipe-author-sh align-self-top m-0">
                                        <span class="small text-muted-50"><a href="#" class="text-muted-50">Все комментария... {{ $recipe->getCommentCountAttribute() }}</a></span>
                                    </div>
                                    <div class="recipe-comment-sh align-self-top ">

                                        @include('layouts.recipe.show_sh_recipe_comment', $comments)


                                    </div>
                                    @include('comment.create')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 px-md-3 px-0">
                <div class="card mb-3 border-0 shadow-sm">
                    <div class="card-header border-0">
                        {{ __('Информация') }}
                    </div>
                    <div class="card-body">
                        <nav class="list-unstyled " style="font-size: 18px">
                            <li class="d-flex flex-row mb-3">
                                <i class="fa fa-cutlery mr-3 align-self-center text-muted-50"></i>
                                <span class="align-self-center pr-1">
                                    <span class="font-weight-bold text-monospace">
                                        <span class="font-weight-bold text-monospace">{{ $recipe->portion }}</span>
                                        <span class="text-uppercase small mr-2 text-monospace"> {{ __('reciper.Portion') }}</span>
                                    </span>
                                </span></li>

                            <li class="d-flex flex-row mb-3">
                                <i class="fa fa-clock-o mr-3 align-self-center text-muted-50"></i>
                                <span class="align-self-center pr-1">
                                    @if ($recipe->hour)
                                        <span class="font-weight-bold text-monospace">{{ $recipe->hour }}</span>
                                        <span class="text-uppercase small mr-2 text-monospace">{{ __('reciper.Hour') }}</span>
                                    @endif
                                    @if ($recipe->minutes)
                                        <span class="font-weight-bold text-monospace">{{ $recipe->minutes }}</span>
                                        <span class="text-uppercase small text-monospace">{{ __('reciper.Minutes') }}</span>
                                    @endif
                                </span></li>

                        </nav>
                    </div>
                </div>
                <div class="card mb-3 border-0 shadow-sm">
                    <div class="card-header border-0 ">
                        {{ __('Энергетическая ценность на порцию') }}
                    </div>
                    <div class="card-body">
                        <nav class="nav-pills list-unstyled">
                            <li class="mb-3 nav-item">
                                <div class="row">
                                    <div class="col-12 small pb-1">{{ __('reciper.Calorie') }}</div>
                                </div>
                                <div class="d-flex flex-row">
                                    <div class="align-self-center">
                                        {{ $recipe->calorie }}
                                    </div>
                                    <div class="align-self-center pl-2 flex-grow-1">
                                        {{ __('reciper.Cal') }}
                                    </div>
                                </div>
                            </li>
                            <li class="mb-3 nav-item">
                                <div class="row">
                                    <div class="col-12 small pb-1">{{ __('reciper.Squirrels') }}</div>
                                </div>
                                <div class="d-flex flex-row">
                                    <div class="align-self-center">
                                        {{ $recipe->squirrels }}
                                    </div>
                                    <div class="align-self-center pl-2 flex-grow-1">
                                        {{ __('reciper.Gramm') }}
                                    </div>
                                </div>
                            </li>
                            <li class="mb-3 nav-item">
                                <div class="row">
                                    <div class="col-12 small pb-1">{{ __('reciper.Fats') }}</div>
                                </div>
                                <div class="d-flex flex-row">
                                    <div class="align-self-center">
                                        {{ $recipe->fats }}
                                    </div>
                                    <div class="align-self-center pl-2 flex-grow-1">
                                        {{ __('reciper.Gramm') }}
                                    </div>
                                </div>
                            </li>
                            <li class="mb-3 nav-item">
                                <div class="row">
                                    <div class="col-12 small pb-1">{{ __('reciper.Carbohydrates') }}</div>
                                </div>
                                <div class="d-flex flex-row">
                                    <div class="align-self-center">
                                        {{ $recipe->carbohydrates }}
                                    </div>
                                    <div class="align-self-center pl-2 flex-grow-1">
                                        {{ __('reciper.Gramm') }}
                                    </div>
                                </div>
                            </li>
                        </nav>
                    </div>
                </div>
                <div class="card mb-3 border-0 shadow-sm">
                    <div class="card-header border-0">
                        {{ __('Ингредиенты') }}
                    </div>
                    <div class="card-body">
                        <nav class="nav list-unstyled">
                            <li class="d-flex flex-row mb-3">
                                <div class="align-self-center">
                                    <img class="rounded-circle" src="https://via.placeholder.com/30/DDDDDD/FFFFFF/" alt="Card image">
                                </div>
                                <div class="align-self-center flex-grow-1">

                                </div>
                            </li>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
