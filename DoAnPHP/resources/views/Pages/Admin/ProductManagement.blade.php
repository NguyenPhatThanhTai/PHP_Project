<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/baloCRUD.css') }}">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<!-- icon -->
	<link rel="icon" href="{{ asset('images/TTDStore_logo.png') }}">
	<title>DTT Store Admin - Hàng hóa</title>
</head>
<body>
	
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand"><i class='bx bxs-smile icon'></i> DTT Store</a>
		<ul class="side-menu">
			<li><a href="#" class=""><i class='bx bxs-dashboard icon' ></i> Tổng quan</a></li>
			<li class="divider" data-text="Danh mục">Main</li>
			<li>
				<a href="#" class="active"><i class='bx bxs-inbox icon' ></i> Quản lý <i class='bx bx-chevron-right icon-right' ></i></a>
				<ul class="side-dropdown">
					<li><a href="{{ url('ProductManagement')}}">Sản phẩm</a></li>
					<li><a href="{{ url('CategoryManagement')}}">Loại sản phẩm</a></li>
					<li><a href="{{ url('ManufactorManagement')}}">Nhà phân phối</a></li>
					<li><a href="{{ url('OrderManagement')}}">Đơn hàng</a></li>
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
				<img src="{{ asset('images/avt.jpg') }}" alt="">
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
			<h1 class="title">SẢN PHẨM</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Trang chủ</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">QL Sản phẩm</a></li>
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
                            <th>Giới thiệu</th>
                            <th>Giá</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($AllProduct as $item)
                        <tr>
                            <td>{{$item -> id}}</td>
                            <td>{{$item -> name}}</td>
                            <td>{{$item -> description}}</td>
                            <td>{{$item -> price}}</td>
                            <td>
                                <button type="button" class="btn-edit" data-toggle="modal" data-target="#modalEdit"
                                    onclick="(getInfoProduct('{{$item -> id}}'))"><i class='bx bx-edit-alt' ></i></button>
                                </button>
                                <button type="button" class="btn-delete" data-toggle="modal" data-target="#modalDel"
                                    onclick="(deleteProduct('{{$item -> id}}'))"><i class='bx bx-trash' ></i></button>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="modalAdd" role="dialog">
                <div class="modal-dialog">
                <form action="ProductManagement" method="post">
                    @csrf
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Thêm Sản Phẩm</h4>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body-left">
                            <p>Tên sản phẩm</p>
                            <input type="text" placeholder="Tên sản phẩm" class="form-control my-3 p-4" name="name">
                            <p>Giới thiệu sản phẩm</p>
                            <input type="text" placeholder="Giới thiệu sản phẩm" class="form-control my-3 p-4" name="description">
                            <p>Giá sản phẩm</p>
                            <input type="text" placeholder="Giá sản phẩm" class="form-control my-3 p-4" name="price">
                            <p>Ảnh đại diện sản phẩm</p>
                            <input type="text" placeholder="Link ảnh đại diện" class="form-control my-3 p-4" name="img_cover">
                            <p>Ảnh phụ đại diện sản phẩm</p>
                            <input type="text" placeholder="Link ảnh phụ" class="form-control my-3 p-4" name="img_hover">
                            <p>Nhà phân phối</p>
                                <select class="form-control my-3 p-4" name="manufactor">
                                    @foreach($AllManufactor as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                          </div>
                          <div class="modal-body-left">
                              <p>Ảnh chi tiết thứ nhất sản phẩm</p>
                              <input type="text" placeholder="Link ảnh chi tiết thứ nhất" class="form-control my-3 p-4" name="img_detail1">
                              <p>Ảnh chi tiết thứ hai sản phẩm</p>
                              <input type="text" placeholder="Link ảnh chi tiết thứ hai" class="form-control my-3 p-4" name="img_detail2">
                              <p>Ảnh chi tiết thứ ba sản phẩm</p>
                              <input type="text" placeholder="Link ảnh chi tiết thứ ba" class="form-control my-3 p-4" name="img_detail3">
                              <p>Ảnh chi tiết thứ tư sản phẩm</p>
                              <input type="text" placeholder="Link ảnh chi tiết thứ tư" class="form-control my-3 p-4" name="img_detail4">
                              <p>Số lượng</p>
                              <input type="text" placeholder="Link ảnh chi tiết thứ tư" class="form-control my-3 p-4" name="quantity">
                              <p>Loại sản phẩm</p>
                                <select class="form-control my-3 p-4" name="category">
                                    @foreach($AllCategory as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                          </div>
                    </div>
                    <div class="modal-footer">
                      <input type="button" class="btn btn-danger" data-dismiss="modal" value="Đóng"></input>
                      <input type="submit" class="btn btn-primary" value="Thêm"></input>
                    </div>
                  </div>
                </form>
                
                </div>
            </div>
            
            <div class="modal fade" id="modalDel" role="dialog">
                <div class="modal-dialog">
                <form action="PostProductDelete" method="post">
                    @csrf
                    <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Xóa sản phẩm</h4>
                    </div>
                    <div class="modal-body">
                      <p>Bạn có chắc chắn muốn xóa sản phẩm này ?</p>
                      <input id="deleteProduct" type="hidden" name="id"></input>
                    </div>
                    <div class="modal-footer">
                      <input type="button" class="btn btn-danger" data-dismiss="modal" value="Hủy"></input>
                      <input type="submit" class="btn btn-primary" value="Đồng ý"></input>
                    </div>
                  </div>
                </form>
                <!-- Modal content-->
                
                </div>
            </div>
            <div class="modal fade" id="modalEdit" role="dialog">
                <div class="modal-dialog">
                <form action="PostProductEdit" method="post">
                    @csrf
                <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Cập nhật sản phẩm</h4>
                    </div>
                    <div id="InfoProduct">

                    </div>
                    <div class="modal-footer">
                      <input type="button" class="btn btn-danger" data-dismiss="modal" value="Hủy"></input>
                      <input type="submit" class="btn btn-primary" value="Cập nhật"></input>
                    </div>
                </div>
                </form>
                <!-- Modal content-->
                </div>
            </div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- NAVBAR -->
    
</body>
</html>
    <script src="{{ asset('js/scriptAdmin.js') }}"></script>

    <script>
            function getInfoProduct($prodId){
            $("#loadComment").html("");
            $.ajax({
                  type: 'GET',
                  dataType:"jsonp",
                  url: '/GetProductJson?id=' + $prodId,
                  complete: function (data) {

                      data = JSON.parse(data.responseText);
                      console.log(data);

                            var cmtTemplate = 
                                '<div class="modal-body">' +
                                    '<div class="modal-body-left">' +
                                    '<input name="ProductId" type="hidden" value="'+data.ProductId+'"/>' +
                                    '<input name="ProductDetailId" type="hidden" value="'+data.ProductDetailId+'"/>' +
                                        '<p>Tên sản phẩm</p>' +
                                        '<input type="text" placeholder="Tên sản phẩm" class="form-control my-3 p-4" name="name" value="'+data.ProductName+'">' +
                                        '<p>Giới thiệu sản phẩm</p>' +
                                        '<input type="text" placeholder="Giới thiệu sản phẩm" class="form-control my-3 p-4" name="description" value="'+data.ProductDescription+'">' +
                                        '<p>Giá sản phẩm</p>' +
                                        '<input type="text" placeholder="Giá sản phẩm" class="form-control my-3 p-4" name="price" value="'+data.ProductPrice+'">' +
                                        '<p>Ảnh đại diện sản phẩm</p>' +
                                        '<input type="text" placeholder="Link ảnh đại diện" class="form-control my-3 p-4" name="img_cover" value="'+data.ProductImgCover+'">' +
                                        '<p>Ảnh phụ đại diện sản phẩm</p>' +
                                        '<input type="text" placeholder="Link ảnh phụ" class="form-control my-3 p-4" name="img_hover" value="'+data.ProductImgHover+'">' +
                                        '<p>Nhà phân phối</p>' +
                                        '<select class="form-control my-3 p-4" name="manufactor">' +
                                        '@foreach($AllManufactor as $item)' + 
                                            '<option value="{{$item->id}}">{{$item->name}}</option>' + 
                                        '@endforeach' +
                                        '</select>' +
                                    '</div>' +
                                    '<div class="modal-body-left">' +
                                        '<p>Ảnh chi tiết thứ nhất sản phẩm</p>' +
                                        '<input type="text" placeholder="Link ảnh chi tiết thứ nhất" class="form-control my-3 p-4" name="img_detail1" value="'+data.ProductImgDetail1+'">' +
                                        '<p>Ảnh chi tiết thứ hai sản phẩm</p>' +
                                        '<input type="text" placeholder="Link ảnh chi tiết thứ hai" class="form-control my-3 p-4" name="img_detail2" value="'+data.ProductImgDetail2+'"/>' +
                                        '<p>Ảnh chi tiết thứ ba sản phẩm</p>' +
                                        '<input type="text" placeholder="Link ảnh chi tiết thứ ba" class="form-control my-3 p-4" name="img_detail3" value="'+data.ProductImgDetail3+'">' +
                                        '<p>Ảnh chi tiết thứ tư sản phẩm</p>' +
                                        '<input type="text" placeholder="Link ảnh chi tiết thứ tư" class="form-control my-3 p-4" name="img_detail4" value="'+data.ProductImgDetail4+'">' +
                                        '<p>Số lượng</p>' +
                                        '<input type="text" placeholder="Số lượng" class="form-control my-3 p-4" name="quantity" value="'+data.ProductQuantityInShop+'">' +
                                        '<p>Loại sản phẩm</p>' +
                                        '<select class="form-control my-3 p-4" name="category">' +
                                        '@foreach($AllCategory as $item)' +
                                            '<option value="{{$item->id}}">{{$item->name}}</option>' +
                                        '@endforeach' +
                                        '</select>' +
                                    '</div>';
                            $("#InfoProduct").html(cmtTemplate);
                    }
                });	
            }

            function deleteProduct($prodId){
                $("#deleteProduct").val($prodId);
            }
    </script>
