@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">素材</div>
                    <div class="card-body">
                        <div>
                            <label for="name" class="col-md-4 col-form-label text-md-right">名稱</label> {{ $creative->name }}
                        </div>

                        <div>
                            <label for="title" class="col-md-4 col-form-label text-md-right">標題</label> {{ $creative->title }}
                        </div>

                        <div>
                            <label for="link" class="col-md-4 col-form-label text-md-right">連結</label> {{ $creative->link }}
                        </div>

                        @if($creative->image != "/storage/")
                        <div>
                            <label for="image" class="col-md-4 col-form-label text-md-right">圖片</label> <img style="max-width: 300px;" class="img-thumbnail img-fluid" src="{{ $creative->image }}">
                        </div>
                        @endif
                    </div>
                </div>

                <br>

                <form method="POST" action="{{ route('inventory.create.post') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="startTime" class="col-md-4 col-form-label text-md-right">開始時間</label>

                        <div class="col-md-6">
                            <input id="startTime" type="date" class="form-control{{ $errors->has('startTime') ? ' is-invalid' : '' }}" name="startTime" value="{{ old('startTime') }}" required autofocus>

                            @if ($errors->has('startTime'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('startTime') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="endTime" class="col-md-4 col-form-label text-md-right">結束時間</label>

                        <div class="col-md-6">
                            <input id="startTime" type="date" class="form-control{{ $errors->has('endTime') ? ' is-invalid' : '' }}" name="endTime" value="{{ old('endTime') }}" required>

                            @if ($errors->has('endTime'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('endTime') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                建立走期
                            </button>
                        </div>
                    </div>
                </form>

                <br>

                <div class="card">
                    <div class="card-header">走期列表</div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
