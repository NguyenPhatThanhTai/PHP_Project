
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="{{ asset('css/orderCRUD.css') }}">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<!-- icon -->
	<link rel="icon" href="{{ asset('images/TTDStore_logo.png') }}"> 
	<title>DTT Store Admin - Đơn hàng</title>

<body>
	
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand"><i class='bx bxs-smile icon'></i> DTT Store</a>
		<ul class="side-menu">
			<li><a href="{{ url('AdminDashboard')}}" class=""><i class='bx bxs-dashboard icon' ></i> Tổng quan</a></li>
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
			<li><a href="{{ url('UserManagement')}}"><i class='bx bxs-widget icon' ></i> Khách hàng</a></li>
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
			<h1 class="title">ĐƠN HÀNG</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Trang chủ</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">QL Đơn hàng</a></li>
			</ul>

            <!-- Product table -->
            <!-- Style table -->
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Thời gian</th>
                            <th>Tên người nhận</th>
                            <th>SĐT người nhận</th>
                            <th>Địa chỉ người nhận</th>
                            <th>Ghi chú</th>
                            <th>Tổng tiền</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($AllOrder as $item)
                        <tr>
                            <td>{{$item -> id}}</td>
                            <td>{{$item -> time}}</td>
                            <td>{{$item -> name_receive}}</td>
                            <td>{{$item -> phone_receive}}</td>
                            <td>{{$item -> address_receive}}</td>
                            <td>{{$item -> note}}</td>
                            <td>{{$item -> total_price}}</td>
                            <td>
                                <button type="button" class="btn-delete" data-toggle="modal" data-target="#modalDel"
                                    onclick="getInfoDetailOrder('{{$item -> id}}')"><i class='bx bx-search' ></i></button>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="modal fade" id="modalDel" role="dialog">
                <div class="modal-dialog">
                    <form action="SetStatusOrder" method="post">
                        @csrf
                    <!-- Modal content-->
                    <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Chi tiết đơn hàng</h4>
                    </div>
                    <div class="modal-body">
                        <div id="InfoOrder">

                        </div>
                </div>
                <div class="modal-footer">
                      <input type="button" class="btn btn-danger" data-dismiss="modal" value="Hủy"></input>
                      <input id="OrderDone" type="submit" class="btn btn-primary" value="Hoàn thành đơn hàng" />
                    </div>
                </div>
                </form>
                
		</main>
		<!-- MAIN -->
	</section>
	<!-- NAVBAR -->
    
</body>
</html>

<script src="{{ asset('js/scriptAdmin.js') }}"></script>
<script>
    function getInfoDetailOrder($orderId){
        $("#loadComment").html("");
            $.ajax({
                  type: 'GET',
                  dataType:"jsonp",
                  url: '/GetOrderJson?id=' + $orderId,
                  complete: function (data) {

                      data = JSON.parse(data.responseText);
                      console.log(data.Order.name_receive);

                      var template = "";
                      for(var i = 0; i < data.ListProduct.length; i++){
                        template += '<tr>' +
                                        '<td>'+data.ListProduct[i].id+'</td>' +
                                        '<td>'+data.ListProduct[i].name+'</td>' +
                                        '<td>'+data.ListProduct[i].quantity+'</td>' +
                                    '</tr>';
                      }

                      if(data.Order.status == -1){
                        $("#OrderDone").attr("value", "Đã hoàn thành đơn hàng");
                        $("#OrderDone").attr("disabled", "disabled");
                      }else{
                        $("#OrderDone").attr("value", "Hoàn thành đơn hàng");
                        $("#OrderDone").removeAttr("disabled");
                      }


                            var cmtTemplate = 
                                '<div class="modal-body">' +
                                    '<div class="modal-body-left">' +
                                    '<input id="OrderId" name="id" type="hidden" value="'+data.Order.id+'" />' +
                                        '<p>Tên người đặt</p>' +
                                        '<input type="text" placeholder="Tên người đặt" class="form-control my-3 p-4" value="'+data.Order.name_receive+'" disabled>' +
                                        '<p>SĐT người đặt</p>' +
                                        '<input type="text" placeholder="SĐT người đặt" class="form-control my-3 p-4" value="'+data.Order.phone_receive+'" disabled>' +
                                        '<p>Địa chỉ người đặt</p>' +
                                        '<input type="text" placeholder="Địa chỉ người đặt" class="form-control my-3 p-4" value="'+data.Order.address_receive+'" disabled>' +
                                        '<p>Ghi chú</p>' +
                                        '<input type="text" placeholder="Ghi chú" class="form-control my-3 p-4" value="'+data.Order.note+'" disabled>' +
                                        '<p>Tổng tiền</p>' +
                                        '<input type="text" placeholder="Tổng tiền" class="form-control my-3 p-4" value="'+data.Order.total_price+'" disabled>' +
                                    '</div>' +
                                        '<div class="modal-body-left">' +
                                            '<div class="table-responsive table-height">' +
                                                '<table class="table table-striped table-hover ">' +
                                                    '<thead>' +
                                                        '<tr>' +
                                                            '<th>Mã sản phẩm</th>' +
                                                            '<th>Tên sản phẩm</th>' +
                                                            '<th>Số lượng</th>' +
                                                        '</tr>' +
                                                    '</thead>' +
                                                    '<tbody>' +
                                                        template +
                                                    '</tbody>' +
                                                '</table>' +
                                            '</div>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>';
                            $("#InfoOrder").html(cmtTemplate);
                    }
                });
    }

</script>