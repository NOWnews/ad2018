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
                                <th scope="col">版位</th>
                                <th scope="col">名稱</th>
                                <th scope="col">類型</th>
                                <th scope="col">狀態</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($creativeSet as $creative)
                                <tr>
                                    <td>{{ $creative->inventory->name }}</td>

                                    <td><a href="/creative/{{ $creative->id }}"> {{ $creative->name }} </a></td>

                                    <td>{{ $creative->type }}</td>
                                    @if ($creative->status === 1)
                                        <td><a href="/creative/{{ $creative->id }}/status/0"> 開啓中 </a></td>
                                    @else
                                        <td><a href="/creative/{{ $creative->id }}/status/1"> 關閉中 </a></td>
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
