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
                        {{ __('Title.Measures') }}
                        <a href="{{ route('admin.measures.create') }}" class="btn btn-primary btn-sm float-right">
                            <i class="fa fa-plus pr-2 font-weight-light" style="font-size: 12px;"></i>{{ __('btn.Add') }}
                        </a>
                    </div>

                    <div class="card-body p-0">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th class="border-0 pl-3">Название</th>
                                    <th class="border-0" width="30px">Edit</th>
                                    <th class="border-0 pr-3" width="30px">Delete</th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach($measures as $measure)
                                <tr>
                                    <td class=" pl-3">{{ $measure->title }}</td>
                                    <td><a href="{{ route('admin.measures.edit', $measure->id) }}"  class="fa fa-edit p-0 btn btn-sm bg-transparent"></a></td>
                                    <td class="pr-3">
                                        <form method="POST" action="{{ route('admin.measures.destroy', $measure) }}" class="form-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Удалить Меру?')" class="btn btn-box-tool btn-xs text-red" style="padding: 0px !important;"><i class="fa fa-trash-o"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
