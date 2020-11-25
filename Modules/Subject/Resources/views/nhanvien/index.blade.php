@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ $title }}</h2>
            </div>
            <div class="pull-right">
{{--                <a class="btn btn-secondary" href="{{ route('phongban.index') }}"> Quay lại</a>--}}
                @can('product-create')
                    <a class="btn btn-success" href="{{ route('nhanvien.create') }}" data-toggle="tooltip" title="Thêm nhân viên mới"> + </a>
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
    <div class="card col-md-5">
{{--        <div class="card-header">--}}
{{--            <p class="m-0">{{ $title }}</p>--}}
{{--        </div>--}}
        <div class="card-body">
            {{ Form::open(['method' => 'get','class' => 'form-search mb-2']) }}
                <div class="row">
                    <div class="form-group col-md-5">
                        <label for="">Keyword</label>
                        {{ Form::text('keyword', Request::get('keyword'), ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group col-md-5">
                        <label for=""></label>
                        {{ Form::button('<i class="fas fa-search"></i> Search',['type' => 'submit','class'=>'btn btn-success form-control']) }}
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
    <div class="table-responsive-sm border-primary">
        <table>
            <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center" width="150px">phong ban</th>
                <th class="text-center">Ten</th>
            </tr>
            </thead>
            <tbody>
                @for($i = 0; $i < count($list); $i++)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td class="text-center" width="300px">{{ $list[$i]->phongbanget->name }}</td>
                        <td><a href="{{ Utilities::getUrlWithGoBack(route('nhanvien.show',['id'=>$list[$i]->id])) }}">
                            {{ $list[$i]->name }}</a></td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>

{{--    {!! $nhanviens->links() !!}--}}
@endsection
