@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Công cụ dụng cụ</h2>
            </div>

            <div class="export">
                <a href ="{{ route('export') }}" class="btn btn-info export" id="export-button"> Export file </a>
            </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table id="myTables" class="table table-bordered">
        <thead>
        <tr>
            <th>No</th>
            <th>Mã CCDC</th>
            <th>Loại CCDC</th>
            <th>Số lượng</th>
            <th>Trạng thái</th>
            <th>Phòng ban</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
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
            </tbody>
    </table>
            <script type="text/javascript">
                $(document).ready( function () {
                    $('#myTables').DataTable( {
                        paginate: false
                    } )
                } );
            </script>
        </div>
    </div>



    {!! $stuffs->links() !!}

@endsection
