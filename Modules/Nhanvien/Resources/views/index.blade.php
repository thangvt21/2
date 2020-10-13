@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Danh sách nhân viên</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-secondary" href="{{ route('phongbans.index') }}"> Quay lại</a>
                @can('product-create')
                    <a class="btn btn-success" href="{{ route('nhanviens.create') }}" data-toggle="tooltip" title="Thêm nhân viên mới"> + </a>
                @endcan
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
        <tr>
            <th>No</th>
            <th>Nhân viên</th>
            <th>Chi tiết</th>
            <th>Phòng ban</th>
            <th width="300px"></th>
        </tr>
        @foreach ($nhanviens as $nhanvien)
        <tr>
            <form action="{{ route('nhanviens.destroy',$nhanvien->id) }}" method="POST">
                @csrf
                <td>{{ ++$i }}</td>
                <td><a style="color:black;text-decoration: none;" href="{{ route('nhanviens.index'),$nhanvien->id }}">{{ $nhanvien->name }}</a></td>
                <td>{{ $nhanvien->note }}</td>
                <td>{{ $nhanvien->phongbanget->name }}</td>
                <td>
                    @can('product-edit')
                        <a class="" href="{{ route('nhanviens.edit',$nhanvien->id) }}"><i style='font-size:24px;color: black' class='far'>&#xf044;</i></a>
                    @endcan
                @method('DELETE')
                    @can('product-delete')
                        <button type="submit" style="text-decoration: none;border: none;background-color: white;color: red;"> <i style='font-size:24px' class='far'>&#xf2ed;</i> </button>
                    @endcan
                </td>
            </form>
        </tr>
        @endforeach
    </table>

    {!! $nhanviens->links() !!}

@endsection
