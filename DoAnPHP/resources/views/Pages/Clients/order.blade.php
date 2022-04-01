@extends('Layout.Client')

@section('title', 'DTT Store - Xác nhận đơn hàng)

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
    <link rel="icon" href="./images/TTDStore_logo.png">
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('css/grid.css') }}">
    <link rel="stylesheet" href="{{ asset('css/order.css') }}">
@stop

@section('content')
<div class="container">
        <div class="py-3 text-center">
            <h2>Thông tin thanh toán</h2>
        </div>
    </div>

    <div class="row g-5">
        <div class="col-md-5 col-lg-4 order-md-last">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-primary">Giỏ hàng của bạn</span>
            <span class="badge bg-primary rounded-pill">3</span>
          </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">Balo KEY Gradient</h6>
              </div>
              <span class="text-muted">300000 VND</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                    <h6 class="my-0">Balo KEY Gradient</h6>
                </div>
                  <span class="text-muted">300000 VND</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                    <h6 class="my-0">Balo KEY Gradient</h6>
                </div>
                  <span class="text-muted">300000 VND</span>
            </li>
            <li class="list-group-item d-flex justify-content-between bg-light">
              <div class="text-success">
                <h6 class="my-0">Mã giảm giá</h6>
                <small>CHAOEM2022</small>
              </div>
              <span class="text-success">-5000 VND</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Tổng (USD)</span>
              <strong>900000 VND</strong>
            </li>
          </ul>
  
          <form class="card p-2">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Nhập mã giảm giá">
              <button type="submit" class="btn btn-secondary">Áp dụng</button>
            </div>
          </form>
        </div>
        <div class="col-md-7 col-lg-8">
          <h4 class="mb-3">Địa chỉ thanh toán</h4>
          <form class="needs-validation" novalidate="">
            <div class="row g-3">
              <div class="col-sm-6">
                <label for="firstName" class="form-label">Họ</label>
                <input type="text" class="form-control" id="firstName" placeholder="Họ của bạn" value="" required="">
                <div class="invalid-feedback">
                    Vui lòng nhập Họ của bạn.
                </div>
              </div>
  
              <div class="col-sm-6">
                <label for="lastName" class="form-label">Tên</label>
                <input type="text" class="form-control" id="lastName" placeholder="Tên của bạn" value="" required="">
                <div class="invalid-feedback">
                    Vui lòng nhập Tên của bạn.
                </div>
              </div>
  
              <div class="col-12">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="you@example.com">
                <div class="invalid-feedback">
                    Vui lòng nhập Email của bạn.
                </div>
              </div>
  
              <div class="col-12">
                <label for="address" class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" id="address" placeholder="123/2 Võ Thị Sáu..." required="">
                <div class="invalid-feedback">
                  Vui lòng nhập Địa chỉ của bạn.
                </div>
              </div>
  
              <div class="col-md-5">
                <label for="country" class="form-label">Tỉnh/Thành phố</label>
                <select class="form-select" id="country" required="">
                    <option value="">Vui lòng chọn...</option>
                    <option value="1">Thành phố Hồ Chí Minh</option>
                    <option value="2">Hà Nội</option>
                    <option value="3">Bình Dương</option>
                    <option value="4">Long An</option>
                    <option value="5">Cà Mau</option>
                </select>
                <div class="invalid-feedback">
                  Vui lòng chọn Tỉnh/Thành phố của bạn.
                </div>
              </div>
  
              <div class="col-md-4">
                <label for="state" class="form-label">Quận/Huyện</label>
                <select class="form-select" id="state" required="">
                    <option value="">Vui lòng chọn...</option>
                    <option value="1">Quận 1</option>
                    <option value="2">Quận 3</option>
                    <option value="3">Quận Bình Thạnh</option>
                    <option value="4">Thủ Dầu Một</option>
                    <option value="5">Dĩ An</option>
                    <option value="6">Bến Cát</option>
                    <option value="7">Bến Lức</option>
                    <option value="8">Châu Thành</option>
                    <option value="9">Cần Đước</option>
                    <option value="10">An Lộc</option>
                    <option value="11">Tân Định</option>
                    <option value="12">Tân Lợi</option>
                </select>
                <div class="invalid-feedback">
                  Vui lòng nhập Quận/Huyện của bạn.
                </div>
              </div>
  
              <div class="col-md-3">
                <label for="zip" class="form-label">Mã Bưu Điện</label>
                <input type="text" class="form-control" id="zip" placeholder="888888" required="">
                <div class="invalid-feedback">
                  Vui lòng nhập Mã Bưu Điện của bạn.
                </div>
              </div>
            </div>
  
            <hr class="my-4">
  
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="same-address">
              <label class="form-check-label" for="same-address">Vận chuyển hàng đến địa chỉ trên</label>
            </div>
  
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="save-info">
              <label class="form-check-label" for="save-info">Lưu thông tin</label>
            </div>
  
            <hr class="my-4">
  
            <h4 class="mb-3">Phương thức thanh toán</h4>
  
            <div class="my-3">
              <div class="form-check">
                <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked="" required="">
                <label class="form-check-label" for="credit">Thẻ tín dụng</label>
              </div>
              <div class="form-check">
                <input id="cash" name="paymentMethod" type="radio" class="form-check-input" required="">
                <label class="form-check-label" for="cash">Tiền mặt</label>
              </div>
              <div class="form-check">
                <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required="">
                <label class="form-check-label" for="paypal">PayPal</label>
              </div>
            </div>
  
            <div class="row gy-3">
              <div class="col-md-6">
                <label for="cc-name" class="form-label">Tên chủ thẻ</label>
                <input type="text" class="form-control" id="cc-name" placeholder="NGUYEN VAN A" required="">
                <div class="invalid-feedback">
                  Vui lòng nhập Tên chủ thẻ.
                </div>
              </div>
  
              <div class="col-md-6">
                <label for="cc-number" class="form-label">Số thẻ</label>
                <input type="text" class="form-control" id="cc-number" placeholder="1234 XXXX YYYY ZZZZ" required="">
                <div class="invalid-feedback">
                  Vui lòng nhập Số thẻ.
                </div>
              </div>
  
              <div class="col-md-3">
                <label for="cc-expiration" class="form-label">Thời hạn</label>
                <input type="text" class="form-control" id="cc-expiration" placeholder="01/01" required="">
                <div class="invalid-feedback">
                  Vui lòng nhập Thời hạn.
                </div>
              </div>
  
              <div class="col-md-3">
                <label for="cc-cvv" class="form-label">CVV</label>
                <input type="text" class="form-control" id="cc-cvv" placeholder="XXX" required="">
                <div class="invalid-feedback">
                  Vui lòng nhập CVV Code.
                </div>
              </div>
            </div>
          </form>
        </div>
    </div>
    <div class="btn-payment-complete">
        <hr class="my-4">
        <button class="w-100 btn btn-primary btn-lg" type="submit">Xác nhận thanh toán</button>
    </div>
@stop

@section('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/index.js') }}"></script>
@stop