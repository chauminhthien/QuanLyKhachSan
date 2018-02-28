@extends('layout.index')

@section('title')
 Cấu hình thông tin Tầng/Lầu
@endsection

@section('content-header')
  <section class="content-header">
    <h1>
      Danh Sách Các Tầng/Lầu
    </h1>
    <ol class="breadcrumb">
      <li><a href="../"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Cài Đặt</li>
      <li class="active">Cài Đặt Khách Sạn</li>
      <li class="active">Tầng/Lầu</li>
    </ol>
  </section>
@endsection

@section('content')
  <section class="content">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Danh Sách Các Tầng/Lầu</h3>
        <a href="../setting/add/tang-lau.html" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Thêm Mới</a>
      </div><!-- /.box-header -->
      <!-- form start -->
      @if(session('thongbao'))
        <div class="alert alert-success">
            {{session('thongbao')}}
        </div>
      @endif
      <div class="box-body">
          <table id="data" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Vị Trí</th>
                <th>Mô Tả</th>
                <th>Hành Động</th>
              </tr>
            </thead>
            <tbody>
              @foreach($lau as $l)
                <tr>
                  <td>{{$l->id}}</td>
                  <td>{{$l->name}}</td>
                  <td>{{$l->vitri}}</td>
                  <td>{{$l->mota}}</td>
                  <td>
                    <a href="../setting/edit/{{{$l->id}}}/tang-lau.html" class="btn btn-primary btn-flat"><i class="fa fa-edit"></i></a>
                    <a href="../setting/del/{{{$l->id}}}/tang-lau.html" class="btn btn-danger btn-flat"><i class="fa fa-close"></i></a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div><!-- /.box-body -->
    </div>
  </section>
@endsection


@section('control-sidebar')

@endsection

@section('script')
<script src="plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
  <script type="text/javascript">

    $(function(){
      $("#data").DataTable();
    })
  </script>
@endsection

@section('css')
  <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
@endsection