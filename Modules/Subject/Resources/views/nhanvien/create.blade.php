@extends('layouts.app')
@csrf

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Thêm nhân viên</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-secondary" href="{{ route('nhanvien.index') }}"> Quay lại</a>
            </div>
        </div>
    </div>

    <br>
{{--    @if ($errors->any())--}}
{{--        <div class="alert alert-danger">--}}
{{--            <strong></strong> Bạn chưa nhập<br><br>--}}
{{--            <ul>--}}
{{--                @foreach ($errors->all() as $error)--}}
{{--                    <li>{{ $error }}</li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    @endif--}}

    {{ Form::open(['route'=>['nhanvien.store',['lastUrl'=>Request::get('lastUrl')]] ]) }}
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Nhân viên</strong>
                    {{ Form::text('name', null, ['placeholder' => 'Name','class' => 'form-control','autocomplete'=>'off']) }}
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Chi tiết</strong>
                    {{ Form::text('note', null, ['placeholder' => 'Chi tiết','class' => 'form-control','autocomplete'=>'off']) }}
                </div>
            </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Phòng ban</strong>
                        {{ Form::select('phongban', $ListPhongban,null, ['class' => 'form-control']) }}
                    </div>
                </div>
            <br>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
        </div>

    {{ Form::close() }}


@endsection
