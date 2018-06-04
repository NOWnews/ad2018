@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm">

            </div>
            <div class="col-sm">

            </div>
            <div class="col-sm">
                {{--<a class="btn btn-primary" href="/inventory/create" role="button">建立版位</a>--}}
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                {{--<th scope="col">#</th>--}}
                <th scope="col">標題</th>
                <th scope="col">類型</th>
                <th scope="col">圖片</th>
                <th scope="col">連結</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($creativeSet as $creative)
                <tr>
                    <td>{{ $inventory->title }}</td>
                    <td>{{ $inventory->type }}</td>
                    <td>{{ $inventory->image }}</td>
                    <td>{{ $inventory->link }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
