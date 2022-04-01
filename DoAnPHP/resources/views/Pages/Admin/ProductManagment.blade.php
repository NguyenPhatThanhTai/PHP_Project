@extends('Layout.Client')

@section('title', 'DTT Store - Quản lý Balo')

@section('style-libraries')
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- logo -->
    <link rel="icon" href="./images/TTDStore_logo.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
@stop

@section('content')
    <!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand"><i class='bx bxs-smile icon'></i> DTT Store</a>
		<ul class="side-menu">
			<li><a href="#" class=""><i class='bx bxs-dashboard icon' ></i> Tổng quan</a></li>
			<li class="divider" data-text="Danh mục">Main</li>
			<li>
				<a href="#" class="active"><i class='bx bxs-inbox icon' ></i> Quản lý <i class='bx bx-chevron-right icon-right' ></i></a>
				<ul class="side-dropdown">
					<li><a href="#">Sản phẩm</a></li>
					<li><a href="#">Loại sản phẩm</a></li>
					<li><a href="#">Nhà sản xuất</a></li>
					<li><a href="#">Đơn hàng</a></li>
				</ul>
			</li>
			<li><a href="#"><i class='bx bxs-chart icon' ></i> Nhân sự</a></li>
			<li><a href="#"><i class='bx bxs-widget icon' ></i> Khách hàng</a></li>
			<li class="divider" data-text="table and forms">Thống kê</li>
			<li><a href="#"><i class='bx bx-table icon' ></i> Doanh thu</a></li>
		</ul>
	</section>
	<!-- SIDEBAR -->

	<!-- NAVBAR -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu toggle-sidebar' ></i>
			<form action="#">
				<div class="form-group">
					<input type="text" placeholder="Tìm kiếm...">
					<i class='bx bx-search icon' ></i>
				</div>
			</form>
			<a href="#" class="nav-link">
				<i class='bx bxs-bell icon' ></i>
				<span class="badge">1</span>
			</a>
			<a href="#" class="nav-link">
				<i class='bx bxs-message-square-dots icon' ></i>
				<span class="badge">1 </span>
			</a>
			<span class="divider"></span>
			<div class="profile">
				<img src="./img/avt.jpg" alt="">
				<ul class="profile-link">
					<li><a href="#"><i class='bx bxs-user-circle icon' ></i> Hồ sơ</a></li>
					<li><a href="#"><i class='bx bxs-cog' ></i> Cài đặt</a></li>
					<li><a href="#"><i class='bx bxs-log-out-circle' ></i> Đăng xuất</a></li>
				</ul>
			</div>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<h1 class="title">Tổng quan</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Trang chủ</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Tổng quan</a></li>
			</ul>
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAdd"><i class='bx bx-plus'></i> Thêm sản phẩm</button>
            <!-- Product table -->
            <!-- Style table -->

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Loại sản phẩm</th>
                            <th>Giá</th>
                            <th>Giới thiệu</th>
                            <th>Số lượng</th>
                            <th>Ảnh đại điện</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>iPhone X</td>
                            <td>iPhone</td>
                            <td>1.200.000</td>
                            <td>Chào em</td>
                            <td>100</td>
                            <td>Image</td>
                            <td>
                                <button type="button" class="btn-edit" data-toggle="modal" data-target="#modalEdit">
                                    <i class='bx bx-edit-alt' ></i>
                                    
                                </button>
                                <button type="button" class="btn-delete" data-toggle="modal" data-target="#modalDel">
                                    <i class='bx bx-trash' ></i>
                                
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>iPhone X</td>
                            <td>iPhone</td>
                            <td>1.200.000</td>
                            <td>Chào em</td>
                            <td>100</td>
                            <td>image</td>
                            <td>
                                <button type="button" class="btn-edit" data-toggle="modal" data-target="#modalEdit">
                                    <i class='bx bx-edit-alt' ></i>
                                    
                                </button>
                                <button type="button" class="btn-delete" data-toggle="modal" data-target="#modalDel">
                                    <i class='bx bx-trash' ></i>
                                
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="modalAdd" role="dialog">
                <div class="modal-dialog">
                
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Thêm Sản Phẩm</h4>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body-left">
                            <p>Tên sản phẩm</p>
                            <input type="text" placeholder="Tên sản phẩm" class="form-control my-3 p-4">
                            <p>Giới thiệu sản phẩm</p>
                            <input type="text" placeholder="Giới thiệu sản phẩm" class="form-control my-3 p-4">
                            <p>Giá sản phẩm</p>
                            <input type="text" placeholder="Giá sản phẩm" class="form-control my-3 p-4">
                            <p>Ảnh đại diện sản phẩm</p>
                            <input type="text" placeholder="Link ảnh đại diện" class="form-control my-3 p-4">
                            <p>Ảnh phụ đại diện sản phẩm</p>
                            <input type="text" placeholder="Link ảnh phụ" class="form-control my-3 p-4">
                            <p>Nhà sản xuất</p>
                                <select class="form-control my-3 p-4">
                                    <option>Yame</option>
                                    <option>QD Foundation</option>
                                    <option>LA</option>
                                    <option>EN</option>
                                    <option>JAP</option>
                                </select>
                          </div>
                          <div class="modal-body-left">
                              <p>Ảnh chi tiết thứ nhất sản phẩm</p>
                              <input type="text" placeholder="Link ảnh chi tiết thứ nhất" class="form-control my-3 p-4">
                              <p>Ảnh chi tiết thứ hai sản phẩm</p>
                              <input type="text" placeholder="Link ảnh chi tiết thứ hai" class="form-control my-3 p-4">
                              <p>Ảnh chi tiết thứ ba sản phẩm</p>
                              <input type="text" placeholder="Link ảnh chi tiết thứ ba" class="form-control my-3 p-4">
                              <p>Ảnh chi tiết thứ tư sản phẩm</p>
                              <input type="text" placeholder="Link ảnh chi tiết thứ tư" class="form-control my-3 p-4">
                              <p>Số lượng</p>
                              <input type="text" placeholder="Link ảnh chi tiết thứ tư" class="form-control my-3 p-4">
                              <p>Loại sản phẩm</p>
                                <select class="form-control my-3 p-4">
                                    <option>iPhone</option>
                                    <option>Samsung</option>
                                    <option>Oppo</option>
                                    <option>Vivo</option>
                                    <option>Xiaomi</option>
                                </select>
                          </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Thêm</button>
                    </div>
                  </div>
                </div>
            </div>
            
            <div class="modal fade" id="modalDel" role="dialog">
                <div class="modal-dialog">
                
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Xóa sản phẩm</h4>
                    </div>
                    <div class="modal-body">
                      <p>Bạn có chắc chắn muốn xóa sản phẩm này ?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Đồng ý</button>
                    </div>
                  </div>
                </div>
            </div>
            <div class="modal fade" id="modalEdit" role="dialog">
                <div class="modal-dialog">
                
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Cập nhật sản phẩm</h4>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body-left">
                            <p>Tên sản phẩm</p>
                            <input type="text" placeholder="Tên sản phẩm" class="form-control my-3 p-4" value="A du` balo kia`">
                            <p>Giới thiệu sản phẩm</p>
                            <input type="text" placeholder="Giới thiệu sản phẩm" class="form-control my-3 p-4" value="Balo dep vl vay man !!">
                            <p>Giá sản phẩm</p>
                            <input type="text" placeholder="Giá sản phẩm" class="form-control my-3 p-4" value="10000000 VND">
                            <p>Ảnh đại diện sản phẩm</p>
                            <input type="text" placeholder="Link ảnh đại diện" class="form-control my-3 p-4" value="avatar ne`">
                            <p>Ảnh phụ đại diện sản phẩm</p>
                            <input type="text" placeholder="Link ảnh phụ" class="form-control my-3 p-4" value="avatar phu. ne`">
                          </div>
                          <div class="modal-body-left">
                              <p>Ảnh chi tiết thứ nhất sản phẩm</p>
                              <input type="text" placeholder="Link ảnh chi tiết thứ nhất" class="form-control my-3 p-4" value="avatar thu nhat ne`">
                              <p>Ảnh chi tiết thứ hai sản phẩm</p>
                              <input type="text" placeholder="Link ảnh chi tiết thứ hai" class="form-control my-3 p-4" value="avatar thu hai ne`"/>
                              <p>Ảnh chi tiết thứ ba sản phẩm</p>
                              <input type="text" placeholder="Link ảnh chi tiết thứ ba" class="form-control my-3 p-4" value="avatar thu ba ne`">
                              <p>Ảnh chi tiết thứ tư sản phẩm</p>
                              <input type="text" placeholder="Link ảnh chi tiết thứ tư" class="form-control my-3 p-4" value="avatar thu tu ne`">
                              <p>Số lượng</p>
                              <input type="text" placeholder="Số lượng" class="form-control my-3 p-4" value="50">
                          </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Cập nhật</button>
                    </div>
                  </div>
                </div>
            </div>
		</main>
		<!-- MAIN -->
	</section>
@stop

@section('scripts')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<script src="{{ asset('js/script.js') }}"></script>
@stop