@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">新增素材</div>
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            {{$errors->first()}}
                            <script>
                                setTimeout(function(){ $(".alert").alert('close'); }, 5000);
                            </script>
                        </div>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="{{ route('creative.create.post') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="orderId" class="col-md-4 col-form-label text-md-right">委刊單</label>
                                ({{ $order->no }}) - {{ $order->name }}

                                <div class="d-none col-md-6">
                                    <input id="orderId" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="orderId" value="{{ $order->id }}" required autofocus>

                                    @if ($errors->has('orderId'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('orderId') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">名稱</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inventoryId" class="col-md-4 col-form-label text-md-right">版位</label>

                                <div class="col-md-6">
                                    <select id="inventoryId" name="inventoryId" class="custom-select">
                                        @foreach ($inventories as $inventory)
                                            <option value="{{ $inventory->id }}">{{ $inventory->name }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('inventoryId'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('inventoryId') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="type" class="col-md-4 col-form-label text-md-right">素材類型</label>

                                <div class="col-md-6">
                                    <input id="type" type="radio" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" value="image" required> 圖片
                                    <input id="type" type="radio" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" value="text" required> 文字

                                    @if ($errors->has('type'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">標題</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="link" class="col-md-4 col-form-label text-md-right">連結</label>

                                <div class="col-md-6">
                                    <input id="link" type="text" class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}" name="link" value="{{ old('link') }}" required autofocus>

                                    @if ($errors->has('link'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('link') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">額外說明</label>

                                <div class="col-md-6">
                                    <input id="image" type="file" name="image" accept="image/*">
                                    {{--<input id="image" type="text" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" value="{{ old('image') }}">--}}

                                    @if ($errors->has('image'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        建立版位
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
