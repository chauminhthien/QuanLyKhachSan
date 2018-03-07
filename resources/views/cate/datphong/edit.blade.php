@extends('layout.index')

@section('title')
 Sửa Phòng {{$phong->name}}
@endsection

@section('content-header')
  <section class="content-header">
    <h1>
        Sửa Phòng <small>{{$phong->name}}</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="../"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Danh Mục</li>
      <li class="active">Quản lý phòng</li>
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
            <div class="form-group col-md-12">
              <label for="name">Tên Phòng</label>
              <input type="text" value="{{$phong->name}}" name="name" required class="form-control" id="name" placeholder="Nhập Tên Hạng Phòng">
            </div>
            <div class="form-group col-md-12">
              <label for="gia">Giá</label>
              <input type="number" name="gia"  required min="1" value="{{$phong->gia}}" class="form-control" id="gia" placeholder="Nhập Giá Hạng Phòng">
            </div>
            <div class="form-group col-md-6">
              <label for="gia">Hạng Phòng</label>
              <select class="form-control" name="idHangPhong">
                @foreach($hangphong as $hp)
                  <option <?php echo ($hp->id == $phong->idHangPhong) ? 'selected' : '' ?> value="{{$hp->id}}"> {{$hp->name}} </option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="gia">Lầu</label>
              <select class="form-control" name="idLau">
                @foreach($lau as $l)
                  <option <?php echo ($l->id == $phong->idLau) ? 'selected' : '' ?> value="{{$l->id}}"> {{$l->name}} </option>
                @endforeach
              </select>
            </div>
          </div><!-- /.box-body -->

          <div class="box-footer col-md-12">
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
<script type="text/javascript">

  $(function(){

    ajax = (id) =>{
      return $.get(
        '../ajax/getGiaPhong/'+id,
        function(data){
          return data;
        }
      )
    }

    $(document).on('change', 'select[name=idHangPhong]', function(){
      var id = $(this).val();
      ajax(id).then(e => $('input[name=gia]').val(e))

      return false;
    });
  })
</script>
@endsection

@section('css')
@endsection