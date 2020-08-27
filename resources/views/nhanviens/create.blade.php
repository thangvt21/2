@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Thêm nhân viên</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-secondary" href="{{ route('phongbans.index') }}"> Quay lại</a>
            </div>
        </div>
    </div>

    <br>
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

    <form action="{{ route('nhanviens.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nhân viên</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Chi tiết</strong>
                    <textarea class="form-control" style="height:150px" name="note" placeholder="Chi tiết"></textarea>
                </div>
            </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>NV id</strong>
                        <textarea class="form-control" name="nv_id"> {{ $p }}</textarea>
                    </div>
                </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
        </div>
    </form>

@endsection
