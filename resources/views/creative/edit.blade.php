@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">編輯素材</div>
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            {{$errors->first()}}
                            <script>
                                setTimeout(function(){ $(".alert").alert('close'); }, 5000);
                            </script>
                        </div>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="/creative/{{ $creative->id }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" id="id" value="{{ $creative->id }}">

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
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $creative->name }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="status" class="col-md-4 col-form-label text-md-right">狀態</label>

                                <div class="col-sm-1">
                                    <input id="status" type="radio" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" name="status" value=1 {{ $creative->status ? 'checked' : '' }} required> 開啓
                                </div>

                                <div class="col-sm-1">
                                    <input id="status" type="radio" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" name="status" value=0 {{ $creative->status ? '' : 'checked' }} required> 暫停
                                </div>

                                @if ($errors->has('status'))
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('status') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group row">
                                <label for="inventoryId" class="col-md-4 col-form-label text-md-right">版位</label>

                                <div class="col-md-6">
                                    <select id="inventoryId" name="inventoryId" class="custom-select">
                                        @foreach ($inventories as $inventory)
                                            <option  value="{{ $inventory->id }}" {{ $creative->inventory->id==$inventory->id ? 'selected' : '' }}>{{ $inventory->name }}</option>
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

                                <div class="col-sm-1">
                                    <input id="type" type="radio" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" {{ $creative->type=="text" ? '' : 'checked' }} value="image" required> 圖片
                                </div>

                                <div class="col-sm-1">
                                    <input id="type" type="radio" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" {{ $creative->type=="text" ? 'checked' : '' }} value="text" required> 文字
                                </div>

                                @if ($errors->has('type'))
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('type') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">標題</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ $creative->title }}" required autofocus>

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
                                    <input id="link" type="text" class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}" name="link" value="{{ $creative->link }}" required autofocus>

                                    @if ($errors->has('link'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('link') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">圖片</label>

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
                                        編輯素材
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
