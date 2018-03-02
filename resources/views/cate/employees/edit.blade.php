@extends('layout.index')

@section('title')
  Thông Tin {{$user->name}}
@endsection

@section('content-header')
  <section class="content-header">
    <h1>
        Thông Tin {{$user->name}}
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
        <h3 class="box-title">Điền Đầy Đủ Thông Tin Nhân Viên</h3>
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
              <label for="name">Tên Nhân Viên</label>
              <input type="text" name="name" value="{{$user->name}}" required class="form-control" id="name" placeholder="Nhập Tên Nhân Viên">
            </div>
            <div class="form-group">
              <label for="email">Địa Chỉ Email</label>
              <input type="email" disabled name="email" value="{{$user->email}}" required class="form-control" id="email" placeholder="Nhập Địa Chỉ Email">
            </div>
            <div class="form-group">
              <label for="password">Mật Khẩu</label>
              <input type="password" name="password" class="form-control" id="password" placeholder="Nhập Mật Khẩu">
            </div>
          </div><!-- /.box-body -->

          <div class="box-footer">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-primary btn-flat">Cập Nhật</button>
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