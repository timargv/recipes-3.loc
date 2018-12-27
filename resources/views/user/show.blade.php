@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-12 col-lg-9 px-md-3 px-0 mb-3">
                <div class="card border-0 shadow-sm rounded-0">
                    <div class="card-header border-0">Мои Рецепты</div>
                    <div class="card-body p-0">
                        <div class="card my-3 border-0 px-0">
                            <div class="card-header bg-transparent p-0 border-0">
                                <div class="d-flex bd-highlight recipe-header-sh px-3 ml-1">
                                    <div class="align-self-center">
                                        <img class="rounded-circle" src="https://via.placeholder.com/50/DDDDDD/FFFFFF/" alt="Card image">
                                    </div>
                                    <div class="align-self-center flex-grow-1 pl-3">
                                        <a class="d-block card-subtitle m-0 text-decoration-none font-weight-bold" href="{{ route('user.show', $user->id) }}">
                                            Торт «Сметанник»
                                        </a>
                                        <div class="d-flex">
                                            <a href="{{ route('user.show', $user->id) }}" class="small text-muted font-weight-light align-self-center">
                                                @if ($user->first_name && $user->last_name)
                                                    {{ $user->first_name }} {{ $user->last_name }}
                                                @else
                                                    {{ $user->name }}
                                                @endif
                                            </a>
                                            <i class="fa fa-angle-right text-muted align-self-center px-2"></i>
                                            <span class="small text-muted font-weight-light align-self-center">{{ $user->created_at->diffForHumans()}}</span>
                                        </div>
                                    </div>
                                    <div class="align-self-top">
                                        <button type="submit" class="btn btn-sm bg-transparent pr-0 text-muted-50">
                                            <i class="fa fa-close"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="pt-3 px-md-3 ml-md-1 ml-0 px-0">
                                    <div class="card-img">
                                        <img class="w-100 " src="https://via.placeholder.com/400x250/DDDDDD/FFFFFF/" alt="Card image">
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
                                        <a href="{{ route('user.show', $user->id) }}" class="small text-muted font-weight-bold align-self-center">
                                            @if (!$user->first_name && !$user->last_name)
                                                {{ $user->first_name }} {{ $user->last_name }}
                                            @else
                                                {{ $user->name }}
                                            @endif
                                        </a>
                                        <span class="small text-muted pl-1">{{ $user->created_at->diffForHumans()}}</span>
                                    </div>
                                    <div class="recipe-author-sh align-self-top m-0">
                                        <span class="small text-muted-50"><a href="#" class="text-muted-50">Все комментария... 150</a></span>
                                    </div>
                                    <div class="recipe-comment-sh align-self-top ">

                                        <div class="d-flex mt-3">
                                            <div class="align-self-top"><img src="https://via.placeholder.com/30/DDDDDD/FFFFFF/" alt="Card image" class="rounded-circle"></div>
                                            <div class="align-self-top ml-3">
                                                <div class="font-weight-light" style="font-size: 13px; line-height: 18px;">
                                                    Автор! Сами хоть пробовали делать?! Получился толстый блин! Как можно его напополам разрезать?!
                                                </div>
                                                <a href="#" class="text-decoration-none small text-muted-50">Ответить</a>
                                            </div>
                                        </div>

                                        <div class="d-flex mt-3">
                                            <div class="align-self-top"><img src="https://via.placeholder.com/30/DDDDDD/FFFFFF/" alt="Card image" class="rounded-circle"></div>
                                            <div class="align-self-top ml-3">
                                                <div class="font-weight-light" style="font-size: 13px; line-height: 18px;">
                                                    Автор! Сами хоть пробовали делать?! Получился толстый блин! Как можно его напополам разрезать?!
                                                </div>
                                                <a href="#" class="text-decoration-none small text-muted-50">Ответить</a>
                                            </div>
                                        </div>

                                        <div class="d-flex mt-3">
                                            <div class="align-self-top"><img src="https://via.placeholder.com/30/DDDDDD/FFFFFF/" alt="Card image" class="rounded-circle"></div>
                                            <div class="align-self-top ml-3">
                                                <div class="font-weight-light" style="font-size: 13px; line-height: 18px;">
                                                    Автор! Сами хоть пробовали делать?! Получился толстый блин! Как можно его напополам разрезать?!
                                                </div>
                                                <a href="#" class="text-decoration-none small text-muted-50">Ответить</a>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="recipe-comment-sh align-self-top ">
                                        <a href="#" class="d-flex mt-3 text-decoration-none">
                                            <div class="align-self-center"><img src="https://via.placeholder.com/30/DDDDDD/FFFFFF/" alt="Card image" class="rounded-circle"></div>
                                            <div class="align-self-center ml-3 small text-muted-50">Добавить комментарий</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                    </div>
                </div>
            </div>

            <div class="col-md-3 pl-md-0">
                <div class="card border-0 shadow-sm">
                    <div class="card-header border-0"></div>
                    <div class="card-body"></div>
                </div>
            </div>
        </div>
    </div>

@stop