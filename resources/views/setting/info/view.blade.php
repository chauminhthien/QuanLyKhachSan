@extends('layout.index')

@section('title')
 Cấu hình thông tin khách sạn
@endsection

@section('content-header')
  <section class="content-header">
    <h1>
      Thông Tin Khách Sạn
    </h1>
    <ol class="breadcrumb">
      <li><a href="../"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Cài Đặt</li>
      <li class="active">Cài Đặt Khách Sạn</li>
      <li class="active">Thông tin Khách Sạn</li>
    </ol>
  </section>
@endsection

@section('content')
  <section class="content">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Thông tin Khách Sạn</h3>
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
            <label for="name">Tên Khách Sạn</label>
            <input required type="text" class="form-control" name="name" id="name" value="{{$info->name}}">
          </div>
          <div class="form-group">
            <label for="email">Địa chỉ Email</label>
            <input required type="email" name="email" class="form-control" id="email" value="{{$info->email}}">
          </div>
          <div class="form-group">
            <label>Số Điện thoại</label>
            <input required type="text" class="form-control" name="phone" value="{{$info->phone}}" data-inputmask='"mask": "(9999) 999-9999"' data-mask />
          </div>
          <div class="form-group">
            <label for="name">Số Fax</label>
            <input type="text" class="form-control" name="fax" {{$info->fax}} />
          </div>
          <div class="form-group">
            <label for="name">Địa chỉ khách sạn</label>
            <input required type="text" class="form-control" name="address" value="{{$info->address}}"   />
          </div>
        </div><!-- /.box-body -->

        <div class="box-footer">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button type="submit" class="btn btn-primary">Cập Nhật</button>
        </div>
      </form>
    </div>
  </section>
@endsection


@section('control-sidebar')

@endsection

@section('script')
  <script src="plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
  <script src="plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
  <script src="plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
  <script type="text/javascript">

    $(function(){
      $("[data-mask]").inputmask();
    })
  </script>
@endsection