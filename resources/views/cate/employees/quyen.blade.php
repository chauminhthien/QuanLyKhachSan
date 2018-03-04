@extends('layout.index')

@section('title')
  Cập Nhật Quyền Nhân Viên {{$user->name}}
@endsection

@section('content-header')
  <section class="content-header">
    <h1>
      Cập Nhật Quyền Nhân Viên <small> {{$user->name}} </small>
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
              <input type="text" name="name" disabled value="{{$user->name}}" class="form-control" id="name" placeholder="Nhập Tên Nhân Viên">
            </div>
          </div>
          <div class="box-body">
            <div class="form-group">
              <label for="name">Danh Sách Quyền</label>
              @php
                $qUser = explode(',', $user->quyen);
              @endphp
              @foreach($quyen as $q)
                
                <div class="form-group">
                  <label>
                    <input type="checkbox"
                      <?php
                        echo ( in_array($q->id, $qUser) == 1) ? 'checked' : '';
                      ?> 
                      name="quyen[]" value="{{$q->id}}" class="minimal" />
                      {{$q->name}}
                  </label>
                </div>
              @endforeach
            </div>
          </div>
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
  <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
  <script>
    $(document).ready(function(){
      $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
      });
    });
  </script>
@endsection

@section('css')
  <link href="plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
@endsection