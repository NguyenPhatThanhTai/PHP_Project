
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="{{ asset('css/categoryCRUD.css') }}">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<!-- icon -->
	<link rel="icon" href="{{ asset('images/TTDStore_logo.png') }}">
	<title>DTT Store Admin - Danh mục</title>

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
			<h1 class="title">DANH MỤC</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Trang chủ</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">QL Danh mục</a></li>
			</ul>
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAdd"><i class='bx bx-plus'></i> Thêm danh mục sản phẩm</button>
            <!-- Product table -->
            <!-- Style table -->

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên loại sản phẩm</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($AllCategory as $item)
                        <tr>
                            <td>{{$item -> id}}</td>
                            <td>{{$item -> name}}</td>
                            <td>
                                <button type="button" class="btn-edit" data-toggle="modal" data-target="#modalEdit"
                                    onclick="getInfoCategory('{{$item -> id}}')"><i class='bx bx-edit-alt'></i></button>
                                </button>
                                <button type="button" class="btn-delete" data-toggle="modal" data-target="#modalDel"
                                    onclick="deleteCategory('{{$item -> id}}')"><i class='bx bx-trash'></i></button>
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
                <form action="CategoryManagement" method="post">
                    @csrf
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Thêm Danh Mục Sản Phẩm</h4>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body-left">
                            <p>Tên loại sản phẩm</p>
                            <input type="text" placeholder="Tên loại sản phẩm" class="form-control my-3 p-4" name="name">
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
                <form action="DeleteCategory" method="post">
                    @csrf
                    <!-- Modal content-->
                    <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Xóa loại sản phẩm</h4>
                    </div>
                    <div class="modal-body">
                      <p>Bạn có chắc chắn muốn xóa loại sản phẩm này ?</p>
                      <input id="deleteCategory" type="hidden" name="id"></input>
                    </div>
                    <div class="modal-footer">
                      <input type="button" class="btn btn-danger" data-dismiss="modal" value="Hủy"></input>
                      <input type="submit" class="btn btn-primary" value="Đồng ý"></input>
                    </div>
                  </div>
                </form>
                
                </div>
            </div>
            <div class="modal fade" id="modalEdit" role="dialog">
                <div class="modal-dialog">
                <form action="EditCategory" method="post">
                    @csrf
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Cập nhật Danh Mục Sản Phẩm</h4>
                    </div>
                    <div id="InfoCategory">

                    </div>
                    <div class="modal-footer">
                      <input type="button" class="btn btn-danger" data-dismiss="modal" value="Đóng"></input>
                      <input type="submit" class="btn btn-primary" value="Cập nhật"></input>
                    </div>
                  </div>
                </form>
                
            </div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- NAVBAR -->
</body>
</html>

	<script src="{{ asset('js/scriptAdmin.js') }}"></script>

    <script>
        function getInfoCategory($cateId){
            $.ajax({
                type: 'GET',
                  dataType:"jsonp",
                  url: '/EditCategory?id=' + $cateId,
                  complete: function (data) {

                      data = JSON.parse(data.responseText);
                      console.log(data);

                        var cmtTemplate = 
                            '<div class="modal-body">' +
                                '<div class="modal-body-left">' +
                                '<input name="CategoryId" type="hidden" value="'+data.CategoryId+'"/>' +
                                    '<p>Tên loại sản phẩm</p>' +
                                    '<input type="text" placeholder="Tên Loại SP" class="form-control my-3 p-4" name="name" value="'+data.CategoryName+'">' +
                                '</div>' +
                            '</div>';
                        $("#InfoCategory").html(cmtTemplate);
                    }
            });
        }

        function deleteCategory($cateId){
                $("#deleteCategory").val($cateId);
            }
    </script>