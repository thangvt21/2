@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Thêm nhân viên</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-secondary" href="{{ route('nhanviens.index') }}"> Quay lại</a>
            </div>
        </div>
    </div>

    <br>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong></strong> Bạn chưa nhập<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::open(array('route' => 'nhanviens.store','method'=>'POST')) !!}
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nhân viên</strong>
                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Chi tiết</strong>
                    {!! Form::text('note', null, array('placeholder' => 'Chi tiết','class' => 'form-control')) !!}
                </div>
            </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Phòng ban</strong>
                        {!! Form::select('phongban', $phongban, array('class' => 'form-control','multiple')) !!}
                    </div>
                </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
        </div>
    {!! Form::close() !!}


@endsection
