@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">功能清單</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        歡迎來到 AD 2018<br>
                        {{--<a href="#" class="btn btn-primary btn-lg disabled" role="button" aria-disabled="true">委刊單管理</a><br>--}}
                        {{--<a href="#" class="btn btn-primary btn-lg disabled" role="button" aria-disabled="true">素材管理</a><br>--}}
                        {{--<a href="#" class="btn btn-primary btn-lg disabled" role="button" aria-disabled="true">版位管理</a>--}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
