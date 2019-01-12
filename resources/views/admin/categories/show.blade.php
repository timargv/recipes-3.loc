@extends('admin.app')


@section('content')
    <div class="card border-0 shadow-sm mb-3">
        <div class="card-header bg-transparent">
            {{ $category->title }}
        </div>

        <div class="card-body">
            <div class="d-flex">
                <div class="justify-content-top">
                    <div class="card-image">
                        <img src="https://via.placeholder.com/400x250/DDDDDD/FFFFFF/" class="w-100" alt="">
                    </div>
                </div>
                <div class="justify-content-top flex-grow-1">
                    <div class="card-text pl-3">
                        Normans--" How are you getting on now, my dear?' it continued, turning to the confused clamour of the way to explain it as a boon, Was kindly.
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body p-0">
            <table class="table">
                <thead>
                    <tr>
                        <th class="border-bottom-0">Name</th>
                        <th class="border-bottom-0">Image</th>
                        <th class="border-bottom-0">Tags</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Adas asdaga</td>
                        <td>image</td>
                        <td>#tag, #tag</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@stop
