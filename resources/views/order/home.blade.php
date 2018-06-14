@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-sm">
                <a class="btn btn-primary" href="/order/create" role="button">建立委刊單</a>
            </div>
        </div>

        <br>


        <form class="example" action="order/search/name">
            <div class="input-group">
                <input id="keyword" name="keyword" type="text" class="form-control" aria-label="委刊單名稱">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-outline-secondary" v-bind:value="keyword">搜尋</button>
                </div>
            </div>
        </form>

        <table class="table">
            <thead>
            <tr>
                {{--<th scope="col">#</th>--}}
                <th scope="col">委刊單號</th>
                <th scope="col">名稱</th>
                <th scope="col">業務</th>
                <th scope="col">建立日期</th>
                <th scope="col">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($orders as $order)
                <tr>
{{--                    <th scope="row">{{ $order->id }}</th>--}}
                    <td>{{ $order->no }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->salesperson }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>
                        <a href="/order/{{ $order->id }}"> 查看細節 </a> /
                        <a href="/order/{{ $order->id }}/edit"> 編輯 </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
