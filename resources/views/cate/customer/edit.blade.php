@extends('layout.index')

@section('title')
  Sửa Thông Tin Khách Hàng
@endsection

@section('content-header')
  <section class="content-header">
    <h1>
        Sửa Thông Tin Khách Hàng
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
        <h3 class="box-title">Điền Đầy Đủ Thông Tin khách hàng</h3>
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
            <div class="form-group col-md-12">
              <label for="name">Tên khách hàng</label>
              <input type="text" value="{{$customer->name}}" name="name" required class="form-control" id="name" placeholder="Nhập Tên khách hàng">
            </div>
            <div class="form-group col-md-6">
              <label for="email">Địa Chỉ Email</label>
              <input type="email" disabled value="{{$customer->email}}" name="email" required class="form-control" id="email" placeholder="Nhập Địa Chỉ Email">
            </div>
            <div class="form-group col-md-6">
                <label for="cmnd">Số CMND</label>
                <input type="number" value="{{$customer->cmnd}}" name="cmnd" required class="form-control" id="cmnd" placeholder="Nhập Chứng Minh Nhân Dân">
              </div>
            <div class="form-group col-md-6">
              <label for="password">Ngày sinh</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" value="{{$customer->ngaysinh}}" name="ngaysinh" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask />
              </div>
            </div>
            <div class="form-group col-md-6">
                <label for="password">Số Điện Thoại</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" value="{{$customer->phone}}" name="phone" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask />
                </div>
            </div>
            <div class="form-group col-md-6">
              <label for="diachi">Địa Chỉ </label>
              <input type="text" value="{{$customer->diachi}}" name="diachi" class="form-control" id="diachi" placeholder="Nhập Địa Chỉ Nhà">
            </div>
            <div class="form-group col-md-6">
                <label for="diachi">Giới Tính </label>
                <select name="gioitinh" class="form-control">
                  <option <?php echo ($customer->gioitinh == 1) ? 'selected' : '';  ?> value="1" >Nam</option>
                  <option <?php echo ($customer->gioitinh == 0) ? 'selected' : '';  ?> value="0" >Nữ</option>
                </select>
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
  <script src="plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
  <script src="plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
  <script src="plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
  <script type="text/javascript">
    $(function () {
      $("[data-mask]").inputmask();
    });
  </script>
@endsection

@section('css')
@endsection