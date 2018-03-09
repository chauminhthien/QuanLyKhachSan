<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
      </div>
      @if(isset($userAdmin))
        <div class="pull-left info">
          <p>{{$userAdmin->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      @endif
    </div>
    
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search..." />
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
        </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      <li class="treeview" data="dashboard">
        <a href="../">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
        </a>
      </li>
      <li class="treeview" data="phong">
          <a href="../phong/so-do-phong.html">
            <i class="fa fa-th"></i> <span>Sơ Đồ Phòng</span></i>
          </a>
        </li>
        
      <li class="treeview" data="cate">
        <a href="#">
          <i class="fa fa-files-o"></i>
          <span>Danh mục</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="../cate/employees/view/danh-sach-nhan-vien.html"><i class="fa fa-circle-o"></i> Quản Lý Nhân Viên</a></li>
          <li><a href="../cate/customer/view/danh-sach-khach-hang.html"><i class="fa fa-circle-o"></i> Quản Lý khách hàng</a></li>
          <li><a href="../cate/phong/view/danh-sach-phong.html"><i class="fa fa-circle-o"></i> Quản lý phòng</a></li>
          <li><a href="../cate/dat-phong/danh-sach.html"><i class="fa fa-circle-o"></i> Danh sách đặt phòng</a></li>
          <li><a href="../update.html"><i class="fa fa-circle-o"></i> Quản lý tiện nghi</a></li>
          <li><a href="../update.html"><i class="fa fa-circle-o"></i> Quản lý dịch vụ</a></li>
        </ul>
      </li>

      <li class="treeview" data="thong-ke">
        <a href="#">
          <i class="fa fa-bar-chart-o"></i>
          <span>Thống Kê</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="../thong-ke/thong-ke-dat-phong.html"><i class="fa fa-circle-o"></i> Thống Kê Đặt Phòng</a></li>
          <li><a href="../thong-ke/thong-ke-doanh-thu.html"><i class="fa fa-circle-o"></i> Thống Kê Doanh Thu</a></li>
        </ul>
      </li>

      <li class="treeview" data="bao-cao">
        <a href="#">
          <i class="fa fa-bar-chart-o"></i>
          <span>Báo Cáo</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="../update.html"><i class="fa fa-circle-o"></i> Báo Cáo Tiền Phòng</a></li>
          <li><a href="../update.html"><i class="fa fa-circle-o"></i> Báo Cáo Doanh Thu</a></li>
          <li><a href="../update.html"><i class="fa fa-circle-o"></i> Báo Cáo Dịch Vụ</a></li>
          <li><a href="../update.html"><i class="fa fa-circle-o"></i> Báo Cáo Thu Chi</a></li>
        </ul>
      </li>
      <li class="treeview" data="setting">
        <a href="#">
          <i class="fa fa-cog"></i>
          <span>Cài đặt</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="treeview">
            <a href="#">
              <i class="fa fa-cog"></i>
              <span>Cài đặt Khách Sạn</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a href="../setting/info/thong-tin-khach-san.html"><i class="fa fa-circle-o"></i> Thông tin khách sạn</a></li>
              <li><a href="../setting/hang-phong/view/hang-phong.html"><i class="fa fa-circle-o"></i> Hạng Phòng</a></li>
              <li><a href="../setting/lau/view/tang-lau.html"><i class="fa fa-circle-o"></i> Tầng/Lầu</a></li>
            </ul>
          </li>
          <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Backup dữ liệu</a></li>
          <li><a href="../setting/quyen/view/danh-sach.html"><i class="fa fa-circle-o"></i> Cấu hình quyền</a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>