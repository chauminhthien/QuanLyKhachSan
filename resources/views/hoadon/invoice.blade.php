
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Hoá Đơn | Quản lý khách sạn</title>
    <base href="{{ asset('') }}public/" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body onload="window.print();">

    <div class="wrapper">
      <!-- Main content -->
      <section class="invoice">
        <!-- title row -->
        <div class="row">
          <div class="col-xs-12">
            <h2 class="page-header">
              <i class="fa fa-globe"></i> Quản lý khách sạn
              <small class="pull-right">Date: {{ date('d-m-Y', time())}}</small>
            </h2>
          </div><!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-sm-4 invoice-col">
            Admin
            <address>
              <strong>{{$info->name}}</strong><br>
              {{$info->address}}<br>
              Fax: {{$info->fax}}<br>
              Phone: {{$info->phone}}<br/>
              Email: {{$info->email}}
            </address>
          </div><!-- /.col -->
          <div class="col-sm-4 invoice-col">
            To
            <address>
              <strong>{{$datphong->name}}</strong><br>
              {{$datphong->address}}<br>
              Phone: {{$datphong->phone}}<br/>
              Email: {{$datphong->email}}
            </address>
          </div><!-- /.col -->
          <div class="col-sm-4 invoice-col">
            <b>Invoice #{{$datphong->id}}</b><br/>
            <br/>
            <b>Order ID:</b> {{$datphong->id}}<br/>
            <b>Payment Due:</b> {{ ($datphong->tgiandi > 0 ) ? date('d-m-Y', $datphong->tgiandi) : date('d-m-Y', time())}}<br/>
            <b>Account:</b> 968-34567
          </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- Table row -->
        <div class="row">
          <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Tên Phòng</th>
                  <th>Ngày Đến</th>
                  <th>Ngày Đi</th>
                  <th>Tồng Tiền</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>{{$datphong->name}}</td>
                  <td>{{$datphong->getPhong->name}}</td>
                  <td>{{ date('d-m-Y',$datphong->tgianden)}}</td>
                  <td>{{ ($datphong->tgiandi > 0 ) ? date('d-m-Y', $datphong->tgiandi) : date('d-m-Y', time())}}</td>
                  <td>
                    <?php
                      $den = date('d',$datphong->tgianden);
                      $di = ($datphong->tgiandi > 0 ) ? date('d-m-Y', $datphong->tgiandi) : date('d-m-Y', time());

                      $ngay = $di - $den;
                      if($ngay == 0) $ngay = 1;

                      echo ( number_format( $ngay*$datphong->getPhong->gia)) . 'đ';
                    ?>
                  </td>
                </tr>
              </tbody>
            </table>
          </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="row">
          <!-- accepted payments column -->
          <div class="col-xs-6">
            <p class="lead">Payment Methods:</p>
            <img src="dist/img/credit/visa.png" alt="Visa" />
            <img src="dist/img/credit/mastercard.png" alt="Mastercard" />
            <img src="dist/img/credit/american-express.png" alt="American Express" />
            <img src="dist/img/credit/paypal2.png" alt="Paypal" />
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
              Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
            </p>
          </div><!-- /.col -->
          <div class="col-xs-6">
            <p class="lead">Amount Due {{ date('d-m-Y', time())}}</p>
            <div class="table-responsive">
              <table class="table">
                <tr>
                  <th style="width:50%">Subtotal:</th>
                  <td>$250.30</td>
                </tr>
                <tr>
                  <th>Tax (9.3%)</th>
                  <td>$10.34</td>
                </tr>
                <tr>
                  <th>Shipping:</th>
                  <td>$5.80</td>
                </tr>
                <tr>
                  <th>Total:</th>
                  <td>$265.24</td>
                </tr>
              </table>
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </section><!-- /.content -->
    </div><!-- ./wrapper -->

    <!-- AdminLTE App -->
    
  </body>
</html>
