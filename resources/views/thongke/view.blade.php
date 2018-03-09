@extends('layout.index')

@section('title')
  Thống Kê Đặt Phòng
@endsection

@section('content-header')
  <section class="content-header">
    <h1>
      Thống Kê Đặt Phòng
    </h1>
    <ol class="breadcrumb">
      <li><a href="../"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Thống Kê Đặt Phòng</li>
    </ol>
  </section>
@endsection

@section('content')
  <section class="content">
    <div class="box box-primary">
      <div class="box-header with-border">
      <div class="form-row">
        <div class="form-group col-md-6">
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input type="text" class="form-control pull-right" id="reservation" />
          </div><!-- /.input group -->
        </div>
        <div class="form-group col-md-4">
          <a href="#" class="btn btn-primary btn-flat timKiemThongKe" data='3'> Tìm Kiếm</a>
        </div>
        <div class="clearfix"></div>
      </div>
     
      <!-- form start -->
      @if(session('thongbao'))
        <div class="alert alert-success">
            {{session('thongbao')}}
        </div>
      @endif
      <div class="box-body">
        <div class="container-fuild" id="viewThongKe">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Thống Kê</h3>
              <div class="box-tools pull-right">
              </div>
            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="line-chart" style="height: 300px;"></div>
            </div><!-- /.box-body -->
          </div>
        </div>
      </div><!-- /.box-body -->
    </div>
  </section>
@endsection


@section('control-sidebar')

@endsection

@section('script')
  <script src="js/jAlert.js" type="text/javascript"></script>
  <script src="plugins/morris/morris.min.js" type="text/javascript"></script>
  <script type="text/javascript">

    $(function(){
      $('#reservation').daterangepicker();
      
      $(document).on('click', '.timKiemThongKe', function(){
        var ngay = $('#reservation').val();
        
        if(ngay.length > 0){
          jAlert("<img src='img/loading.gif' />", "red", false);

          $.get(
            '../ajax/postThongKe',
            {
              ngay,
            },function(data){
              $('#line-chart').html('');
              $(".LockBody").remove();

              Morris.Line({
                element: 'line-chart',
                data: [
                  ...data
                ],
                xkey: 'd',
                ykeys: ['w'],
                xLabelFormat: function(d) {
                  return d.getDate()+'/'+(d.getMonth()+1)+'/'+d.getFullYear(); 
                },
                xLabels:'day',
                labels: ['Số Lượng'],
                lineColors: ['#167f39'],
                lineWidth: 2,
                dateFormat: function (ts) {
                  var d = new Date(ts);
                  return d.getYear() + '/' + (d.getMonth() + 1) + '/' + d.getDay();
                }
              });
            },'json'
          );
        }else{
          jAlert("Bạn Chưa Nhập Giá Trị", "red", true);
        }

        return false;
      });

    });

  </script>
@endsection

@section('css')
  <link rel="stylesheet" href="css/jAlert.css">
@endsection