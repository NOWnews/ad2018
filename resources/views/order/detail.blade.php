@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">委刊單 <b>{{ $order->order_name }}</b> 細節</div>
                    <div class="card-body">

                        委刊單號：{{ $order->no }}<br>
                        委刊名稱：{{ $order->name }}<br>
                        業務人員：{{ $order->salesperson }}
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col-sm">
                        <a class="btn btn-primary" href="/creative/create/{{ $order->id }}" role="button">建立素材</a>
                    </div>
                </div>

                <br>

                <div class="card">
                    <div class="card-header">委刊單素材</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                {{--<th scope="col">#</th>--}}
                                <th scope="col">名稱</th>
                                <th scope="col">版位</th>
                                <th scope="col">類型</th>
                                <th scope="col">狀態</th>
                                <th scope="col">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($creativeSet as $creative)
                                <tr>
                                    <td>{{ $creative->name }}</td>
                                    <td>{{ $creative->inventory->name }}</td>
                                    <td>{{ ($creative->type=="text") ? '純文字' : '圖像' }}</td>
                                    @if ($creative->status === 1)
                                        <td>開啓中</td>
                                        <td>
                                            <a href="/creative/{{ $creative->id }}"> 查看細節 </a> /
                                            <a href="/creative/{{ $creative->id }}/edit"> 編輯 </a> /
                                            <a href="/creative/{{ $creative->id }}/status/0"> 關閉 </a>

                                        </td>
                                    @else
                                        <td>關閉中</td>
                                        <td>
                                            <a href="/creative/{{ $creative->id }}"> 查看細節 </a> /
                                            <a href="/creative/{{ $creative->id }}/edit"> 編輯 </a> /
                                            <a href="/creative/{{ $creative->id }}/status/1"> 開啓 </a>
                                        </td>
                                    @endif

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
