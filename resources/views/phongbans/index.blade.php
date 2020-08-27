@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Phòng ban</h2>
            </div>
            <div class="pull-right">
                @can('product-create')
                    <a class="btn btn-success" href="{{ route('phongbans.create') }}" data-toggle="tooltip" title="Thêm phòng ban mới""> + </a>
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
            <th>Phòng ban</th>
            <th style="text-align: center">Số lượng nhân viên</th>
            <th width="300px"></th>
        </tr>

        @foreach ($phongbans as $phongban)
            <tr>
                <form action="{{ route('phongbans.destroy',$phongban->id) }}" method="POST">
                <td>{{ ++$i }}</td>
                    <td><a style="color:black;text-decoration: none;" href="{{ route('nhanviens.show',$phongban->id) }}" data-toggle="tooltip" data-placement="top" title="Xem danh sách nhân viên">{{ $phongban->name }}</a></td>
                <td width="180px"> {{ \App\Phongban::count($phongban->id) }} </td>
                <td>
                        @can('product-edit')
                        <a class="" href="{{ route('phongbans.edit',$phongban->id) }}" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa" ><i style='font-size:24px' class='far'>&#xf044;</i></a>
                        @endcan

                        @csrf
                        @method('DELETE')
                        @can('product-delete')
                        <button type="submit" style="text-decoration: none;border: none;background-color: white;color: red;" data-toggle="tooltip" title="Xóa" data-placement="top"> <i style='font-size:24px' class='far'>&#xf2ed;</i> </button>
                        @endcan
                    </form>
                </td>
            </tr>
        @endforeach
    </table>


    {!! $phongbans->links() !!}


@endsection
