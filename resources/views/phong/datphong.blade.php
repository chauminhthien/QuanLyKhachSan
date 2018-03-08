@extends('layout.index')

@section('title')
  Đặt Phòng
@endsection

@section('content-header')
  <section class="content-header">
    <h1>
      Đặt Phòng
    </h1>
    <ol class="breadcrumb">
      <li><a href="../"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Đặt Phòng</li>
    </ol>
  </section>
@endsection

@section('content')
  <section class="content">
    <div class="box box-primary">
      <div class="box-header with-border">
        
      </div><!-- /.box-header -->
      <!-- form start -->
      @if(session('thongbao'))
        <div class="alert alert-success">
            {{session('thongbao')}}
        </div>
      @endif
      <div class="box-body">
        <div class="container-fuild">
          <form action="../cate/dat-phong/dat-phong-moi.html" method="post">
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Thông Tin Cá Nhân</h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div><!-- /.box-header -->
              <div class="box-body">
                <div class="row">

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="name">Họ Tên</label>
                      <input type="text" name="name" required class="form-control" id="name" placeholder="Nhập Họ Tên">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="name">Số CMND</label>
                      <input type="text" name="cmnd" required class="form-control" placeholder="Nhập CMND">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="name">Số Điện Thoại</label>
                      <input type="text" name="phone" class="form-control"  placeholder="Nhập Số Điện Thoại">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="name">Địa Chỉ Email</label>
                      <input type="email" name="email" class="form-control"  placeholder="Nhập Địa Chỉ Email">
                    </div>
                  </div>

                  </div><!-- /.col -->
                </div><!-- /.row -->
              </div>
            </div>
            <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Thông Tin Đặt Phòng</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
    
                    <div class="col-md-6">
                      <div class="form-group" >
                        <label>Hạng Phòng</label>
                        <select class="form-control select2" idP="<?php echo (isset($phong) ? $phong->id: '0' ) ?>" id="idHangPhong" name="idHangPhong">
                          @foreach($hangphong as $hp)
                            <option <?php echo ( isset($phong) && $hp->id == $phong->getHangPhong->id) ? 'selected="selected"' : '' ?> value="{{$hp->id}}">{{$hp->name}}</option>
                          @endforeach
                        
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Tên Phòng</label>
                        <select class="form-control" id="idPhong" name="idPhong">

                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="name">Ngày</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-clock-o"></i>
                          </div>
                          <input type="date" name="tgianden" value="<?php echo date('Y-m-d', time() ) ?>" name="phone" required class="form-control" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="name">Giá Phòng</label>
                        <input type="text" disabled name="giaPhong"   class="form-control" value="1">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="name">Cách Thanh Toán</label>
                        <select class="form-control" name="pthucthanhtoan">
                          <option value="Tiền Mặt">Tiền Mặt</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="name">Trả Trước</label>
                        <input type="number" name="tientratruoc" value="0" min="0"   class="form-control">
                      </div>
                    </div>
    
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div>
              </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button class="btn btn-success btn-flat" type="submit"> Đặt Phòng </button>
            </div>
          </div>
        </form>
      </div><!-- /.box-body -->
    </div>
  </section>
@endsection


@section('control-sidebar')

@endsection

@section('script')
  <script src="js/jAlert.js" type="text/javascript"></script>
  <script src="plugins/select2/select2.full.min.js" type="text/javascript"></script>
  <script type="text/javascript">

    $(function(){
      $(".select2").select2();
      $(document).on('click', '.Alert-Root', function(){
        $(this).remove();
      })
      
      getPhong = () => {
        var idHP = $('#idHangPhong').val();
        var idp = $('#idHangPhong').attr('idp');
        jAlert("<img src='img/loading.gif' />", "red", false);
        $.get(
          '../ajax/getPhongDP/' + idHP + '/' + idp,
          function(data){
            $('#idPhong').html(data);
            $(".LockBody").remove();
            getInfoPhong();
          }
        )
      }

      $(document).on('change', '#idHangPhong', ()=>{
        getPhong();
      });

      getInfoPhong = () =>{
        var idP = $('#idPhong').val();
        jAlert("<img src='img/loading.gif' />", "red", false);
        $.get(
          '../ajax/getInfoPhongDP/' + idP,
          function(data){
            $('input[name=giaPhong]').val(data.gia);
            $(".LockBody").remove();
          },'json'
        )
      }

      $(document).on('change', '#idPhong', ()=>{
        getInfoPhong();
      });

      getPhong();

    });

  </script>
@endsection

@section('css')
  
  <link rel="stylesheet" href="css/jAlert.css">
  <link rel="stylesheet" href="css/AlertConfirm.css">
  <link href="plugins/select2/select2.css" rel="stylesheet" type="text/css" />
@endsection