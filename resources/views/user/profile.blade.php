@extends('layout.index')

@section('title')
 Thông Tin Cá Nhân {{$userAdmin->name}}
@endsection

@section('content-header')
  <section class="content-header">
    <h1>
      Thông Tin Cá Nhân
      <small>{{$userAdmin->name}}</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Profile</li>
    </ol>
  </section>
@endsection

@section('content')
  <section class="content">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Thông Tin Cá Nhân</h3>
      </div><!-- /.box-header -->
      <!-- form start -->
      @if(session('thongbao'))
        <div class="alert alert-success">
            {{session('thongbao')}}
        </div>
      @endif
      <form role="form" action="" method="post">
        <div class="box-body">
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" disabled class="form-control" id="email" value="{{$userAdmin->email}}">
          </div>
          <div class="form-group">
            <label for="name">Tên Cá Nhân</label>
            <input type="name" class="form-control" name="name" id="name" value="{{$userAdmin->name}}" placeholder="Nhập Tên Của Bạn">
          </div>
          <div class="form-group">
            <label for="pass">Mật Khẩu</label>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="password" class="form-control" name="password" id="pass" placeholder="Nhâp Mật Khẩu">
          </div>
        </div><!-- /.box-body -->

        <div class="box-footer">
          <button type="submit" class="btn btn-primary btn-flat">Cập Nhật</button>
        </div>
      </form>
    </div>
  </section>
@endsection


@section('control-sidebar')

@endsection