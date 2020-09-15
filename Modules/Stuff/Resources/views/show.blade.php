@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Thông tin công cụ dụng cụ</h2>
            </div>
            <div class="pull-right">
                    <a class="btn btn-secondary" href="{{ route('stuffs.index') }}"> Quay lại </a>
            </div>
        </div>
    </div>
    <br>

    <table class="table table-bordered">
        <tr>
            <th>Mã CCDC</th>
            <th>Model/Series</th>
            <th>Loại CCDC</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Ngày mua</th>
            <th>Nhà cung cấp</th>
            <th>Bảo hành</th>
            <th>Ngày bàn giao</th>
            <th>Người tiếp nhận</th>
        </tr>

        <tr>
            @foreach ($stuffs as $stuff)
                <td>{{ $stuff->ma_ccdc }}</td>
                <td>{{ $stuff->model }}</td>
                <td>{{ $stuff->loai }}</td>
                <td>{{ $stuff->gia }}</td>
                <td>{{ $stuff->soluong }}</td>
                <td>{{ $stuff->ngaymua }}</td>
                <td>{{ $stuff->nhacungcap }}</td>
                <td>{{ $stuff->baohanh }}</td>
                <td>{{ $stuff->ngaybangiao }}</td>
{{--                    <td>{{ $stuff->nhanvienget->name }}</td>--}}
            @endforeach
            </tr>
    </table>

@endsection
