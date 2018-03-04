@extends('layout.index')

@section('title')
  Danh Sách Khách Hàng
@endsection

@section('content-header')
  <section class="content-header">
    <h1>
      Danh Sách Khách Hàng
    </h1>
    <ol class="breadcrumb">
      <li><a href="../"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Danh Mục</li>
      <li class="active">Quản lý khách hàng</li>
    </ol>
  </section>
@endsection

@section('content')
  <section class="content">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Danh Sách Khách Hàng</h3>
        <a href="../cate/customer/add/khach-hang.html" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Thêm Mới</a>
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
              @foreach($customer as $c)
                <tr>
                  <td>{{$c->id}}</td>
                  <td>{{$c->name}}</td>
                  <td>{{$c->email}}</td>
                  <td>
                    @php
                      echo '<a href="../cate/customer/edit/'.$c->id.'/'.$c->nameKhongDau.'.html" class="btn btn-primary btn-flat"><i class="fa fa-edit"></i></a>
                            <a href="#" id="'.$c->id.'" class="viewEml btn btn-info btn-flat"><i class="fa fa-eye"></i></a>
                            <a href="../cate/customer/del/'.$c->id.'/'.$c->nameKhongDau.'.html" class="btn btn-danger btn-flat"><i class="fa fa-close"></i></a>';
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
          '../ajax/getCustomer/'+id,
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