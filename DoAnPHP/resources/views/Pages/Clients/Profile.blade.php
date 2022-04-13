@extends('Layout.Client')

@section('title', 'DTT Store - Trang cá nhân')

@section('style-libraries')
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- google font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<!-- box icons -->
<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
<!-- bootstrap -->
<link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- logo -->
<link rel="icon" href="{{ asset('images/TTDStore_logo.png') }}">
<!-- css -->
<link rel="stylesheet" href="{{ asset('css/grid.css') }}">
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@stop

@section('content')
<div class="container">
    <div class="account-page">
        <div class="profile">
            <div class="profile-detail">
                <img src="./images/TTDStore_logo.png" alt="">
                <h2>DTT Store</h2>
                <p>dtt@gmail.com</p>
            </div>
            <ul>
                <li><a href="#" class="active">Thông tin tài khoản <span>></span></a></li>
                <li><a href="#">Đổi mật khẩu <span>></span></a></li>
                <li><a href="#">Chi tiết đơn hàng <span>></span></a></li>
                <li><a href="#">Đơn đã mua <span>></span></a></li>
                <li><a href="#">Đăng xuất <span>></span></a></li>
            </ul>
        </div>
        <div class="account-detail">
            <h2>Thông tin tài khoản</h2>
            <div class="billing-detail">
                <form action="#">
                    <div class="row">
                        <div class="col-md-6 mt-5">
                            <div class="form-group">
                                <label for="">Họ tên</label>
                                <input type="text" class="form-control" placeholder="Họ tên" value="DTT Store">
                            </div>
                        </div>
                        <div class="col-md-6 mt-5">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" class="form-control" placeholder="Email" value="trongeddy48@gmail.com">
                            </div>
                        </div>
                        <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <label for="">Số điện thoại</label>
                                <input type="text" class="form-control" placeholder="Số điện thoại" value="0123456789">
                            </div>
                        </div>
                        <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <label for="">Địa chỉ</label>
                                <input type="text" class="form-control" placeholder="Địa chỉ" value="123 Sbc">
                            </div>
                        </div>
                        <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <label for="">Tỉnh/Thành phố</label>
                                <input type="text" class="form-control" placeholder="Tỉnh/Thành phố" value="TPHCM">
                            </div>
                        </div>
                        <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <label for="">Quận/Huyện</label>
                                <input type="text" class="form-control" placeholder="Quận/Huyện" value="Thu Duc">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label></label>
                                <input type="submit" id="btn-update" name="update" value="Cập nhật">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('scripts')

@stop