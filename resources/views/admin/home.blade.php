@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-header bg-transparent ">
                        Админ
                    </div>
                    <div class="card-body">
                        @include('admin._nav')
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-header bg-transparent">
                        Админка
                    </div>

                    <div class="card-body p-0">
                        <table class="table table-hover ">
                            <thead>
                                <th>Название</th>
                                <th>Автор</th>
                                <th>Добавлено</th>
                                <th width="30px"><i class="fa fa-edit"></i></th>
                                <th width="30px"><i class="fa fa-trash-o"></i></th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Название</td>
                                    <td>Автор</td>
                                    <td>Добавлено</td>
                                    <td><button type="button"  class="fa fa-edit p-0 btn btn-sm bg-transparent"></button></td>
                                    <td>
                                        <button type="button" class="fa fa-trash-o p-0 btn btn-sm bg-transparent"></button>
                                    </td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
