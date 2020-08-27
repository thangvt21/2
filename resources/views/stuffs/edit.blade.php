@extends('layouts.app')


@section('content')
    <div class="row" xmlns="http://www.w3.org/1999/html">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Cập nhật thông tin</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-secondary" href="{{ route('stuffs.index') }}"> Quay lại</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <br>

    <form action="{{ route('stuffs.update',$stuff->id) }}" method="POST">
        @csrf
        @method('PUT')


        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Mã CCDC:</strong>
                    <input type="text" name="ma_ccdc" value="{{ $stuff->ma_ccdc }}" class="form-control" placeholder="Mã CCDC">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Model/Series:</strong>
                    <textarea class="form-control" name="model" placeholder="Model/Series">{{ $stuff->model }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Loại CCDC:</strong>
                    <textarea class="form-control" name="loai" placeholder="Loại CCDC">{{ $stuff->loai }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Chi tiết:</strong>
                    <textarea class="form-control" style="height:125px" name="detail" placeholder="Detail">{{ $stuff->detail }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
        </div>


    </form>

@endsection
