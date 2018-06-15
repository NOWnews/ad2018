@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">版位 <b>{{ $inventory->name }}</b> 細節</div>
                    <div class="card-body">

                        類型：{{ $inventory->type }}<br>
                        說明：{{ $inventory->desc }}<br>
                    </div>
                </div>
                <br>

                <br>

                <div class="card">
                    <div class="card-header">已排程素材</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                {{--<th scope="col">#</th>--}}
                                <th scope="col">名稱</th>
                                <th scope="col">委刊單</th>
                                <th scope="col">狀態</th>
                                <th scope="col">開始</th>
                                <th scope="col">結束</th>
                                <th scope="col">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($queues as $queue)
                                <tr>
                                    <td>{{ $queue->creative->name }}</td>
                                    <td>{{ $queue->creative->order->name }}</td>
                                    <td>{{ $queue->creative->status ? "開啓中" : "關閉中" }}</td>
                                    <td>{{ $queue->start_time }}</td>
                                    <td>{{ $queue->end_time }}</td>
                                    <td>
                                        <a href="/creative/{{ $queue->creative->id }}"> 查看細節 </a>
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
@endsection
