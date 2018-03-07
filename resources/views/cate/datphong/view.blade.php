@extends('layout.index')

@section('title')
  Danh Sách Đặt Phòng
@endsection

@section('content-header')
  <section class="content-header">
    <h1>
      Danh Sách Đặt Phòng
    </h1>
    <ol class="breadcrumb">
      <li><a href="../"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Danh Mục</li>
      <li class="active">Danh Sách Đặt Phòng</li>
    </ol>
  </section>
@endsection

@section('content')
  <section class="content">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Danh Sách Đặt Phòng</h3>
        <a href="../cate/dat-phong/dat-phong-moi.html" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Đặt Phòng</a>
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
                <th>Tên Khách</th>
                <th>Tên Phòng</th>
                <th>Số Điện Thoại</th>
                <th>Thời Gian Đến</th>
                <th>Hành Động</th>
              </tr>
            </thead>
            <tbody>
              @foreach($datphong as $dp)
                <tr>
                  <td>{{$dp->id}}</td>
                  <td>{{$dp->name}}</td>
                  <td>{{$dp->getPhong->name}}</td>
                  <td>{{$dp->phone}}</td>
                  <td>{{ date('d-m-Y',$dp->tgianden) }}</td>
                  <td>
                    <a href="../cate/dat-phong/chi-tiet/{{$dp->id}}/dat-phong.html" class="btn btn-info btn-flat"><i class="fa fa-eye"></i></a>
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