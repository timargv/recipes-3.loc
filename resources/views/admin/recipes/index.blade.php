@extends('admin.app')


@section('content')

    <div class="card border-0 shadow-sm mb-3">
        <div class="card-header bg-transparent">
            {{ __('Title.Recipes') }} - {{ $recipesCount }}
            <a href="{{ route('admin.recipes.create') }}" class="btn btn-primary btn-sm float-right">
                <i class="fa fa-plus pr-2 font-weight-light" style="font-size: 12px;"></i>{{ __('btn.Add') }}
            </a>
        </div>

        <div class="card-body p-0">
            <table class="table table-sm">
                <thead>
                <tr>
                    <th class="border-0 pl-3">Название</th>
                    <th class="border-0">Категория</th>
                    <th class="border-0">Автор</th>
                    <th class="border-0" width="30px">Edit</th>
                    <th class="border-0 pr-3" width="30px">Delete</th>
                </tr>
                </thead>
                <tbody>

                @foreach($recipes as $measure)
                    <tr>
                        <td class=" pl-3">{{ $measure->title }}</td>
                        <td class="">{{ $measure->category->title }}</td>
                        <td class="pr-3">{{ $measure->author->name }}</td>
                        <td><a href="{{ route('admin.recipes.edit', $measure->id) }}"  class="fa fa-edit p-0 btn btn-sm bg-transparent"></a></td>
                        <td class="pr-3">
                            <form method="POST" action="{{ route('admin.recipes.destroy', $measure) }}" class="form-inline">
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
        <div class="card-footer bg-transparent">
            {{ $recipes->links() }}
        </div>
    </div>

@stop
