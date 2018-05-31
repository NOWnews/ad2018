@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">委刊單 <b>{{ $order->order_name }}</b> 細節</div>
                    <div class="card-body">
                        業務人員：{{ $order->id }}<br>
                        委刊名稱：{{ $order->salesperson }}
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">委刊單素材</div>
                    <div class="card-body">
                        00
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
