@extends('Subject.Resources.views.layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Thong tin phong ban</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('phongbans.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $phongban->nhanvien->name }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details:</strong>
                {{ $phongban->nhanvien->detail }}
            </div>
        </div>
    </div>
@endsection
