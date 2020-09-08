@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Cập nhật thông tin</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-secondary" href="{{ route('nhanviens.index') }}"> Quay lại</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong></strong> Bạn chưa nhập<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <br>

    <form action="{{ route('nhanviens.update',$nhanvien->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nhân viên:</strong>
                    <input type="text" name="name" value="{{ $nhanvien->name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Chi tiết:</strong>
                    <textarea class="form-control" style="height:150px" name="note" placeholder="Detail">{{ $nhanvien->note }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
        </div>
    </form>

@endsection
