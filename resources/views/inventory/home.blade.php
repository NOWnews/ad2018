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
                <th scope="col">#</th>
                <th scope="col">位置</th>
                <th scope="col">名稱</th>
                <th scope="col">類型</th>
                <th scope="col">說明</th>
                <th scope="col">素材</th>
                <th scope="col">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($inventories as $inventory)
                <tr>
                    <td>{{ $inventory->id }}</td>
                    <td>{{ $inventory->position }}</td>
                    <td>{{ $inventory->name }}</td>
                    <td>{{ ($inventory->type=="text") ? '純文字' : '圖像' }}</td>
                    <td>{{ $inventory->desc }}</td>
                    <td>
                        @foreach($inventory->queues as $queue)
                            @if($queue->end_time >= now())
                                <a href="/creative/{{ $queue->creative->id }}"> {{ $queue->creative->name }} ({{ $queue->creative->status ? '開啓中' : '關閉中' }}) </a>
                                 <br>
                            @endif
                        @endforeach
                    </td>
                    <td>
                        <a href="/inventory/{{ $inventory->id }}"> 查看細節 </a> /
                        <a href="/inventory/{{ $inventory->id }}/edit"> 編輯 </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
