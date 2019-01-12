@extends('admin.app')


@section('content')
    <div class="card border-0 shadow-sm mb-3">
        <div class="card-header bg-transparent">
            {{ __('Title.Categories') }}
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary btn-sm float-right">
                <i class="fa fa-plus pr-2 font-weight-light" style="font-size: 12px;"></i>{{ __('btn.Add') }}
            </a>
        </div>

        <div class="card-body p-0">
            @if(count($categories) != null)
                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th class="px-2 border-0">ID</th>
                        <th style="min-width: 150px;" class="border-0">Name</th>
                        <th width="200px" class="border-0">Position</th>
                        <th class="border-0">Status</th>
                        <th class="text-right px-2 border-0" width="30px">Edit</th>
                        <th class="text-right px-2 border-0" width="30px">Delete</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td class="px-2">{{ $category->id }}</td>
                            <td>
                                @if($category->title)
                                @for ($i = 0; $i < $category->depth; $i++) &mdash; @endfor
                                <a href="{{ route('admin.categories.show', $category) }}">{{ $category->title }}</a>
                                @endif
                            </td>

                            <td>
                                <div class="d-flex">
                                    <form method="POST" action="{{ route('admin.categories.first', $category) }}" class="justify-content-center">
                                        @csrf
                                        <button class="btn btn-xs btn-box-tool btn-sm"><i class="fa fa-angle-double-up"></i></button>
                                    </form>
                                    <form method="POST" action="{{ route('admin.categories.up', $category) }}" class="justify-content-center">
                                        @csrf
                                        <button class="btn btn-xs btn-box-tool btn-sm"><i class="fa fa-angle-up"></i></button>
                                    </form>
                                    <form method="POST" action="{{ route('admin.categories.down', $category) }}" class="justify-content-center">
                                        @csrf
                                        <button class="btn btn-xs btn-box-tool btn-sm"><i class="fa fa-angle-down"></i></button>
                                    </form>
                                    <form method="POST" action="{{ route('admin.categories.last', $category) }}" class="justify-content-center">
                                        @csrf
                                        <button class="btn btn-xs btn-box-tool btn-sm"><i class="fa fa-angle-double-down"></i></button>
                                    </form>
                                </div>
                            </td>
                            <td>{{ $category->status == 'active' ? 'Влючен' : 'Откллючен' }}</td>
                            <td><a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-box-tool  btn-xs pull-right" style="padding: 0px !important;"><i class="fa  fa-edit"></i></a></td>
                            <td class="px-2">
                                <form method="POST" action="{{ route('admin.categories.destroy', $category) }}" class="form-inline pull-right">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Удалить Категорию?')" class="btn btn-box-tool btn-xs text-red" style="padding: 0px !important;"><i class="fa fa-trash-o"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach



                    </tbody>
                </table>

            @else
                <div class="text-center">
                    <h1 class="text-muted" style="padding-bottom: 40px">
                        Пусто
                    </h1>
                </div>
            @endif
        </div>
    </div>
@stop
