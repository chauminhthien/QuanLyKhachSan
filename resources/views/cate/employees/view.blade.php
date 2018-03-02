@extends('layout.index')

@section('title')
  Danh Sách Nhân Viên
@endsection

@section('content-header')
  <section class="content-header">
    <h1>
      Danh Sách Nhân Viên
    </h1>
    <ol class="breadcrumb">
      <li><a href="../"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Danh Mục</li>
      <li class="active">Quản lý nhân viên</li>
    </ol>
  </section>
@endsection

@section('content')
  <section class="content">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Danh Sách Nhân Viên</h3>
        <a href="../cate/employees/add/nhan-vien.html" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Thêm Mới</a>
      </div><!-- /.box-header -->
      <!-- form start -->
      @if(session('thongbao'))
        <div class="alert alert-success">
            {{session('thongbao')}}
        </div>
      @endif
      @if(session('loi'))
        <div class="alert alert-danger">
            {{session('loi')}}
        </div>
      @endif
      <div class="box-body">
          <table id="data" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Hành Động</th>
              </tr>
            </thead>
            <tbody>
              @foreach($user as $u)
                <tr>
                  <td>{{$u->id}}</td>
                  <td>{{$u->name}}</td>
                  <td>{{$u->email}}</td>
                  <td>
                    @php
                      echo '<a href="../cate/employees/edit/'.$u->id.'/'.$u->nameKhongDau.'.html" class="btn btn-primary btn-flat"><i class="fa fa-edit"></i></a>
                            <a href="#" id="'.$u->id.'" class="viewEml btn btn-info btn-flat"><i class="fa fa-eye"></i></a>';
                      if($u->id != $userAdmin->id){
                        echo'
                        <a href="../cate/employees/del/'.$u->id.'/'.$u->nameKhongDau.'.html" class="btn btn-danger btn-flat"><i class="fa fa-close"></i></a>';
                      };
                    @endphp
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

      $(document).on('click', '.viewEml', function(){
        var id = $(this).attr('id');
        $.get(
          '../ajax/getInfo/'+id,
          function(data){
            $('body').append(data);
          }
        )
        return false;
      });

      $(document).on('click', '.closeModal', function(){
        $('.LockBody').remove();
        return false;
      });
    })
  </script>
@endsection

@section('css')
  <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
@endsection