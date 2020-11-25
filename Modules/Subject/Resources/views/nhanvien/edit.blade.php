@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ $title }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-secondary" href="{{ \Modules\Core\Helpers\Utilities::getGoBackUrl(route('nhanvien.show',['id'=>$obj->id])) }}"> Quay lại</a>
            </div>
        </div>
    </div>

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
    <br>
        {{ Form::open(['route' => ['nhanvien.update',['id'=>$obj->id, 'lastUrl' => Request::get('lastUrl')]] ]) }}
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Nhân viên:</strong>
                    {{ Form::text('name', old('name',$obj->name),['class'=>'form-control']) }}
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Chi tiết:</strong>
                    {{ Form::text('note',old('note',$obj->note),['class'=>'form-control']) }}
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Chi tiết:</strong>
                    {{ Form::select('phongban',$ListPhongban,null,['class'=>'form-control']) }}
                </div>
            </div>
            <br>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>

        </div>
    </form>

@endsection
