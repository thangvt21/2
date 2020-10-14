<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
{{--        <title>Laravel Datatables Server Side Data Processing Example - ItSolutionStuff.com</title>--}}
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
        <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</head>

<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/home') }}">
                HOME
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto"></ul>


                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @else
                        <li><a class="nav-link" href="{{ route('phongbans.index') }}">Quản lí phòng ban</a></li>
                        <li><a class="nav-link" href="{{ route('nhanviens.index') }}">Quản lí nhân viên</a></li>
                        <li><a class="nav-link" href="{{ route('stuffs.index') }}">Quản lí công cụ dụng cụ</a></li>
                        <li><a class="nav-link" href="{{ route('users.index') }}">Manage Users</a></li>
                        <li><a class="nav-link" href="{{ route('roles.index') }}">Manage Role</a></li>

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>


                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

<main class="py-4">
    <div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Công cụ dụng cụ</h2>
            </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
       <div class="row">
           <div class="form-group col-md-3">
               <div class="controls">
                   <label for="phongban"><h5>Phòng ban</h5></label>
                   <select name="phongban" id="phongban" class="form-control">
                       <option value="Phòng IT">Phòng IT</option>
                       <option value="Phòng Phục vụ khách hàng">Phòng phục vụ khách hàng</option>
                       <option value="Phòng Kế toán">Phòng kế toán</option>
                       <option value="Kho vận">Kho vận</option>
                       <option value="Phòng Marketing">Phòng Marketing</option>
                       <option value="Phòng Hành chính nhân sự">Phòng Hành chính nhân sự</option>
                   </select>
               </div>
           </div>

           <div class="form-group col-md-3">
               <div class="controls">
                   <label for="loai"><h5>Loại CCDC</h5></label>
                   <select name="loai" id="loai" class="form-control">
                       <option value="Máy tính bàn">Máy tính bàn</option>
                   </select>
               </div>
           </div>
           <div class="form-group col-md-3">
               <div class="controls">
                   <label for="status"><h5>Trạng thái</h5></label>
                   <select name="status" id="status" class="form-control">
                       <option value="Đang sử dụng">Đang sử dụng</option>
                       <option value="Lưu kho">Lưu kho</option>
                       <option value="Chờ thanh lý">Chờ thanh lý</option>
                   </select>
               </div>
           </div>

           <div class="form-group col-md-2" style="margin-top: 40px;">
               <div class="controls">
                   <button type="text" id="btn-search" class="btn btn-info form-control">Tìm kiếm</button>
               </div>
           </div>
       </div>
       </div>

       <div class="container" style="margin-bottom: 10px;">
                @can('product-create')
                    <a class="btn btn-success" href="{{ route('stuffs.create') }}" data-toggle="tooltip" title="Thêm công cụ mới"> + </a>
                @endcan
                <a href ="{{ route('export','$stuffs') }}" class="btn btn-secondary export" id="export-button"> EXCEL </a>
       </div>

    <div class="container-fluid">
      <table id="myTables" class="table table-bordered data-table">
        <thead>
        <tr>
            <th width="20px">No</th>
            <th width="80px">Mã CCDC</th>
            <th width="100px">Loại CCDC</th>
            <th width="200px">Trạng thái</th>
            <th width="300px">Phòng ban</th>
            @can('product-edit')
            <th width="150px"></th>
            @endcan
{{--            <th></th>--}}
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    </div>
    </div>
    </div>
</main>
</div>
</body>
<script type="text/javascript">
        $(document).ready( function () {
            $('#myTables').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('stuffs.index') }}",
                    type: 'GET',
                    data: function (d) {
                        d.phongban = $('#phongban').val();
                        d.loai = $('#loai').val();
                        d.status = $('#status').val();
                    }
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'ma_ccdc', name: 'ma_ccdc'},
                    {data: 'loai', name: 'loai'},
                    {data: 'status', name: 'status'},
                    {data: 'phongban', name: 'phongban'},
                    {data: 'action', name: 'action', orderable : false, searchable : false},
                ]
            });
    });
    $('#btn-search').click(function () {
        $('#myTables').DataTable().draw(true);
    });
</script>
</html>
