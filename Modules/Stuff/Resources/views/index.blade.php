@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Công cụ dụng cụ</h2>
            </div>

            {!! Form::open(['route' => ['stuffs.index']]) !!}
            <div class="row">
                <div class='col-md-3'>
                    <input type="text" class='form-control form-control-lg' name="phongban" id="phongban" placeholder="Phòng ban" data-action="{{ route('stuffs.index') }}"/>
                    <div id='phongban' style='text-align:left'></div>
                </div>
                <div class='col-md-3'>
                    <input type="text" class='form-control form-control-lg' name="loai_ccdc" id="loai" placeholder="Loại công cụ dụng cụ" data-action="{{ route('stuffs.index') }}"/>
                    <div id='searchresultcity' style='text-align:left'></div>
                </div>
                <div class='col-md-3'>
                    <input type="text" class='form-control form-control-lg' name="status" id="status" placeholder="Trạng thái" data-action="{{ route('stuffs.index') }}"/>
                    <div id='searchresultcity' style='text-align:left'></div>
                </div>
                {{ Form::submit('Tìm kiếm', array('class'=>'btn btn-success btn-lg btn-block col-md-2'))}}
            </div>

            {!! Form::close() !!}

            <div class="pull-right">
                @can('product-create')
                    <a class="btn btn-success" href="{{ route('stuffs.create') }}"> + </a>
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
            <th width="50px">No</th>
            <th width="150px">Mã CCDC</th>
            <th width="150px">Loại CCDC</th>
            <th>Số lượng</th>
            <th width="150px">Trạng thái</th>
            <th>Phòng ban</th>
{{--            <th>Nhân viên</th>--}}
            <th></th>

        </tr>
        @foreach ($stuffs as $stuff)
            <tr>
                <form action="{{ route('stuffs.destroy',$stuff->id) }}" method="POST">
                    @csrf

                    <td>{{ ++$i }}</td>
                    <td><a style="color:black;text-decoration: none;" href="{{ route('stuffs.show',$stuff->id) }}">{{ $stuff->ma_ccdc }}</a></td>
                    <td>{{ $stuff->loai }}</td>
                    <td>{{ $stuff->soluong }}</td>
                    <td>{{ $stuff->status }}</td>
                    <td>{{ $stuff->phongbangot->name }}</td>
{{--                    <td>{{  }}</td>--}}
                    <td>
                        @can('product-edit')
                            <a class="" href="{{ route('stuffs.edit',$stuff->id) }}"><i style='font-size:24px;color: black' class='far'>&#xf044;</i></a>
                        @endcan

                        @method('DELETE')
                        @can('product-delete')
                            <button type="submit" style="text-decoration: none;border: none;background-color: white;color: red;"> <i style='font-size:24px' class='far'>&#xf2ed;</i> </button>
                    @endcan
                </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $stuffs->links() !!}

@endsection
