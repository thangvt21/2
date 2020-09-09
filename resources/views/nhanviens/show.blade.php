@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ $phongban->name }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-secondary" href="{{ route('phongbans.index') }}"> Quay lại</a>
{{--                @can('product-create')--}}
{{--                    <a class="btn btn-success" href="{{ route('nhanviens.create',$phongban->id) }}" data-toggle="tooltip" title="Thêm nhân viên mới"> + </a>--}}
{{--                @endcan--}}
            </div>
        </div>
    </div>
    <br>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
    {{--------------Các cột của bảng danh sách---------------}}
        <tr>
            <th width="100px">STT</th>
            <th>Nhân viên</th>
            <th>Chi tiết</th>
{{--            <th>Phòng ban</th>--}}
            <th width="300px"></th>
        </tr>
    {{---------------------  Danh sách   ----------------------}}
        @foreach ($nhanviens as $nhanvien)
            <tr>
                <form action="{{ route('nhanviens.destroy',$nhanvien->id) }}" method="POST">
                    <td>{{ ++$i }}</td>
                    <td>{{ $nhanvien->name }}</td>
                    <td>{{ $nhanvien->note }}</td>
{{--                    <td>{{ $phongban->name }}</td>--}}
    {{------------------ Các nút chức năng ---------------------}}
                    <td>
                        @can('product-edit')
                            <a class="" href="{{ route('nhanviens.edit',$nhanvien->id) }}"><i style='font-size:24px' class='far'>&#xf044;</i></a>
                        @endcan
                        @csrf
                        @method('DELETE')
                        @can('product-delete')
                            <button type="submit" style="text-decoration: none;border: none;background-color: white;color: red;"> <i style='font-size:24px' class='far'>&#xf2ed;</i> </button>
                        @endcan
                </form>
                </td>
            </tr>
        @endforeach
    </table>

@endsection
