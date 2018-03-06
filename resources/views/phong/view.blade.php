@extends('layout.index')

@section('title')
  Sơ Đồ Phòng
@endsection

@section('content-header')
  <section class="content-header">
    <h1>
      Sơ Đồ Phòng
    </h1>
    <ol class="breadcrumb">
      <li><a href="../"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Sơ Đồ Phòng</li>
    </ol>
  </section>
@endsection

@section('content')
  <section class="content">
    <div class="box box-primary">
      <div class="box-header with-border">
        <a href="#" class="btn btn-primary btn-flat phongClick active" data='-1'> Tất Cả</a>
        <a href="#" class="btn btn-primary btn-flat phongClick" data='0'> Phòng Trống</a>
        <a href="#" class="btn btn-primary btn-flat phongClick" data='1'> Phòng có khách</a>
        <a href="#" class="btn btn-primary btn-flat phongClick" data='2'> Phòng bẩn</a>
        <a href="#" class="btn btn-primary btn-flat phongClick" data='3'> Phòng hư</a>
      </div><!-- /.box-header -->
      <!-- form start -->
      @if(session('thongbao'))
        <div class="alert alert-success">
            {{session('thongbao')}}
        </div>
      @endif
      <div class="box-body">
        <div class="container-fuild" id="viewPhong">
          

        </div>
      </div><!-- /.box-body -->
    </div>
  </section>
@endsection


@section('control-sidebar')

@endsection

@section('script')
  <script src="js/jAlert.js" type="text/javascript"></script>
  <script type="text/javascript">

    $(function(){

      viewPhong = (st) => {
        $.get(
          '../ajax/getViewPhong/' + st,
          function(data){
            $('#viewPhong').html(data);
            $(".LockBody").remove();
          }
        )
      }

      viewPhong(-1);

      $(document).on('click', 'a.phongClick', function(){
        jAlert("<img src='img/loading.gif' />", "red", false);
        $('a.phongClick').removeClass('active');
        $(this).addClass('active');

        var st = $(this).attr('data');
        viewPhong(st);

        return false;
      });

      $(document).on('click', 'div.phong', function(){
        var id = $(this).attr('id');
        var st = $(this).attr('st');
        
        $.get(
          '../ajax/getViewMorePhong/' + id + '/' + st,
          function(data){
            $('body').append(data);
          }
        )
      });

      $(document).on('click', 'a.editStPhong', function(){
        var data = $(this).attr('data');
        var id = $(this).attr('id');
        var st = $(this).attr('st');
        
        jAlert("<img src='img/loading.gif' />", "red", false);

        $.get(
          '../ajax/postEditStPhong/' + id + '/' + data,
          function(d){
            if(d.st == 1){
              $('a.phongClick').removeClass('active');
              $('a.phongClick[data='+ st +']').addClass('active');
              viewPhong(st);
              $('.Alert-Root').remove();
              $(".LockBody").remove();
            }
          },'json'
        );
        
        return false;
      });

      $(document).on('click', '.Alert-Root', function(){
        $(this).remove();
      })

    });

  </script>
@endsection

@section('css')
  <link rel="stylesheet" href="css/phong.css">
  <link rel="stylesheet" href="css/jAlert.css">
  <link rel="stylesheet" href="css/AlertConfirm.css">
@endsection