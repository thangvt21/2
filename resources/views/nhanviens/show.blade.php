@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ $phongban->name }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-secondary" href="{{ route('phongbans.index') }}"> Quay lại</a>
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
            <th width="100px">STT</th>
            <th>Nhân viên</th>
            <th>Chi tiết</th>
            <th width="300px"></th>
        </tr>

        @foreach ($nhanviens as $nhanvien)
            <tr>
                <form action="{{ route('nhanviens.destroy',$nhanvien->id) }}" method="POST">
                    @csrf
                    <td>{{ ++$i }}</td>
                    <td>{{ $nhanvien->name }}</td>
                    <td>{{ $nhanvien->note }}</td>
                    <td>
                        @can('product-edit')
                            <a class="" href="{{ route('nhanviens.edit',$nhanvien->id) }}"><i style='font-size:24px' class='far'>&#xf044;</i></a>
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

@endsection
