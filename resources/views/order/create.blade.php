@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">新增委刊單</div>
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            {{$errors->first()}}
                            <script>
                                setTimeout(function(){ $(".alert").alert('close'); }, 5000);
                            </script>
                        </div>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="{{ route('order.create.post') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="no" class="col-md-4 col-form-label text-md-right">委刊單號</label>

                                <div class="col-md-6">
                                    <input id="no" type="text" class="form-control{{ $errors->has('no') ? ' is-invalid' : '' }}" name="no" value="{{ old('no') }}" required autofocus>

                                    @if ($errors->has('no'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('no') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="order_name" class="col-md-4 col-form-label text-md-right">客戶與產品</label>

                                <div class="col-md-6">
                                    <input id="order_name" type="text" class="form-control{{ $errors->has('order_name') ? ' is-invalid' : '' }}" name="order_name" value="{{ old('order_name') }}" required>

                                    @if ($errors->has('order_name'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('order_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="salesperson" class="col-md-4 col-form-label text-md-right">業務人員</label>

                                <div class="col-md-6">
                                    <input id="salesperson" type="text" class="form-control{{ $errors->has('salesperson') ? ' is-invalid' : '' }}" name="salesperson" value="{{ old('salesperson') }}" required>

                                    @if ($errors->has('salesperson'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('salesperson') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        建立委刊單
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
