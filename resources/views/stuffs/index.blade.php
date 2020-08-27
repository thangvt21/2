@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Công cụ dụng cụ</h2>
            </div>
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
            <th width="150px">Model/Series</th>
            <th width="150px">Loại CCDC</th>
            <th width="300px">Chi tiết</th>
            <th></th>
            {{--            <th width="50px"></th>--}}
        </tr>
        @foreach ($stuffs as $stuff)
            <tr>
                <form action="{{ route('stuffs.destroy',$stuff->id) }}" method="POST">
                    <td>{{ ++$i }}</td>
                    <td><a style="color:black;text-decoration: none;" href="{{ route('stuffs.show',$stuff->id) }}">{{ $stuff->ma_ccdc }}</a></td>
                    <td>{{ $stuff->model }}</td>
                    <td>{{ $stuff->loai }}</td>
                    <td>{{ $stuff->detail }}</td>
                    <td>

                        {{--                        <a class="btn btn-info" href="{{ route('phongbans.show',$phongban->id) }}">Show</a>--}}
                        @can('product-edit')
                            <a class="" href="{{ route('stuffs.edit',$stuff->id) }}"><i style='font-size:24px' class='far'>&#xf044;</i></a>
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


    {!! $stuffs->links() !!}

@endsection
