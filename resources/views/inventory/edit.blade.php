@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">編輯版位</div>
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            {{$errors->first()}}
                            <script>
                                setTimeout(function(){ $(".alert").alert('close'); }, 5000);
                            </script>
                        </div>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="/inventory">
                            @csrf

                            <input type="hidden" name="id" id="id" value="{{ $inventory->id }}">

                            <div class="form-group row">
                                <label for="position" class="col-md-4 col-form-label text-md-right">版位位置</label>

                                <div class="col-md-6">
                                    <input id="position" type="text" class="form-control{{ $errors->has('position') ? ' is-invalid' : '' }}" name="position" value="{{ $inventory->position }}" required autofocus>

                                    @if ($errors->has('position'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('position') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">版位名稱</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $inventory->name }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="type" class="col-md-4 col-form-label text-md-right">版位類型</label>

                                <div class="col-md-6">
                                    <input id="type" type="radio" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" value="image"  {{ ($inventory->type=="text") ? '' : 'checked' }} required> 圖片
                                    <input id="type" type="radio" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" value="text" {{ ($inventory->type=="text") ? 'checked' : '' }} required> 文字

                                    @if ($errors->has('type'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="desc" class="col-md-4 col-form-label text-md-right">額外說明</label>

                                <div class="col-md-6">
                                    <input id="desc" type="text" class="form-control{{ $errors->has('desc') ? ' is-invalid' : '' }}" name="desc" value="{{ $inventory->desc }}">

                                    @if ($errors->has('desc'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('desc') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        編輯版位
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
