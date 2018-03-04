@extends('layout.index')

@section('title')
 Danh Sách Phòng
@endsection

@section('content-header')
  <section class="content-header">
    <h1>
      Danh Sách Phòng
    </h1>
    <ol class="breadcrumb">
      <li><a href="../"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Danh Mục</li>
      <li class="active">Quản Lý Phòng</li>
    </ol>
  </section>
@endsection

@section('content')
  <section class="content">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Danh Sách Các Phòng</h3>
        <a href="../cate/phong/add/them-phong.html" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Thêm Mới</a>
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
                <th>Giá</th>
                <th>Hành Động</th>
              </tr>
            </thead>
            <tbody>
              @foreach($phong as $p)
                <tr>
                  <td>{{$p->id}}</td>
                  <td>{{$p->name}}</td>
                  <td>{{ number_format($p->gia)}} <sup>đ</sup></td>
                  <td>
                    <a href="../cate/phong/edit/{{$p->id}}/{{$p->nameKhongDau}}.html" class="btn btn-primary btn-flat"><i class="fa fa-edit"></i></a>
                    <a href="../cate/phong/del/{{$p->id}}/{{$p->nameKhongDau}}.html" class="btn btn-danger btn-flat"><i class="fa fa-close"></i></a>
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