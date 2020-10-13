@extends('layouts.app')


@section('content')
    <div class="row" xmlns="http://www.w3.org/1999/html">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Thêm CCDC</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-secondary" href="{{ route('stuffs.index') }}"> Quay lại</a>
            </div>
        </div>
    </div>

    <br>
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


    <form action="{{ route('stuffs.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Mã CCDC:</strong>
                    <input type="text" name="ma_ccdc" class="form-control" placeholder="Mã CCDC">
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Model/Series:</strong>
                    <input class="form-control" name="model" placeholder="Model">
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Loại CCDC:</strong>
                    <input class="form-control" name="loai" placeholder="Loại CCDC">
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Số lượng:</strong>
                    <input class="form-control" name="soluong">
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Nhà cung cấp:</strong>
                    <input class="form-control" name="nhacungcap">
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Bảo hành:</strong>
                    <input class="form-control" name="baohanh">
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Phòng ban:</strong>
                    {!! Form::select('phongid',$phongban,array('class' => 'form-control','multiple')) !!}
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Trạng thái:</strong>
                    {!! Form::select('status',array('Đang sử dụng' => 'Đang sử dụng','Lưu kho' => 'Lưu kho','Chờ thanh lý' => 'Chờ thanh lý')) !!}
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Chi tiết:</strong>
                    <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>
                </div>
            </div>

{{--            <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                <div class="form-group">--}}
{{--                    <strong>Nhân viên:</strong>--}}
{{--                    {!! Form::select('nhanvien',$nhanvien,array('class' => 'form-control','multiple')) !!}--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
        </div>


    </form>

@endsection
