@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <a class="btn btn-primary" href="/inventory/create" role="button">建立版位</a>
            </div>
            <div class="col-sm">

            </div>
            <div class="col-sm">

            </div>
        </div>

        <br>

        <table class="table">
            <thead>
            <tr>
                {{--<th scope="col">#</th>--}}
                <th scope="col">版位名稱</th>
                <th scope="col">類型</th>
                <th scope="col">說明</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($inventories as $inventory)
                <tr>
                    <td>{{ $inventory->name }}</td>

                    <td>{{ $inventory->type }}</td>
                    <td>{{ $inventory->desc }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
