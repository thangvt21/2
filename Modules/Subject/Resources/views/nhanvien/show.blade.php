@extends('layouts.app')
@csrf
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ $obj->phongbanget->name }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-secondary" href="{{ Utilities::getGoBackUrl( route('nhanvien.index')) }}"> Quay lại</a>
            </div>
        </div>
    </div>
    <br>

{{--    @if ($message = Session::get('success'))--}}
{{--        <div class="alert alert-success">--}}
{{--            <p>{{ $message }}</p>--}}
{{--        </div>--}}
{{--    @endif--}}
    <div class="card">
        <div class="card-header">
            <h1 class="h4 m-0">{{ $title }}</h1>
        </div>
        <div class="card-body">
            <dl class="card-row">
                <dt class="col-md-2">Ten</dt>
                <dd class="col-md-5">{{ $obj->name }}</dd>
            </dl>
        </div>
        <div class="card-footer">
            <a href="{{ \Modules\Core\Helpers\Utilities::getUrlWithGoBack(route('nhanvien.create', Request::get('lastUrl'))) }}" class="btn-primary btn-sm">
                <i class="fas fa-file-alt"></i>Them
            </a>
            <a href="{{ \Modules\Core\Helpers\Utilities::getUrlWithGoBack(route('nhanvien.edit',['id' => $obj->id]),Request::get('lastUrl')) }}" class="btn btn-info">
                <i class="fas fa-pencil-alt"></i>Sua
            </a>
        </div>
    </div>

@endsection
