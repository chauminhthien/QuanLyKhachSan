@extends('layout.index')

@section('title')
 Cấu hình quyền
@endsection

@section('content-header')
  <section class="content-header">
    <h1>
      Cấu hình Quyền
    </h1>
    <ol class="breadcrumb">
      <li><a href="../"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Cài Đặt</li>
      <li class="active">Cấu hình quyền</li>
    </ol>
  </section>
@endsection

@section('content')
  <section class="content">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Điền Đầy Đủ Thông Tin</h3>
      </div><!-- /.box-header -->
      <!-- form start -->
      @if(session('thongbao'))
        <div class="alert alert-success">
            {{session('thongbao')}}
        </div>
      @endif
      @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $loi)
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              {{$loi}} <br/>
            @endforeach
        </div>
      @endif
      <form role="form" action="" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="name">Tên Quyền</label>
              <input type="text" name="name" required class="form-control" id="name" placeholder="Nhập Tên Quyền">
            </div>
            <div class="form-group">
              <label for="url">Đường Dẫn</label>
              <input type="text" name="url" class="form-control" id="url" placeholder="Nhập Url">
            </div>
          </div><!-- /.box-body -->

          <div class="box-footer">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-primary btn-flat">Thêm Mới</button>
          </div>
        </form>
    </div>
  </section>
@endsection


@section('control-sidebar')

@endsection

@section('script')

@endsection

@section('css')
@endsection