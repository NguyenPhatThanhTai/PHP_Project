
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- logo -->
    <link rel="icon" href="./images/TTDStore_logo.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">


<section class="Form my-4 mx-5">
      <div class="container">
        <div class="row no-gutters">
          <div class="col-lg-5">
            <img src="./images/thumb_login.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-7 px-5 pt-5">
            <h1 class="font-weight-bold py-3">DTT Store Admin</h1>
            <h4>Đăng nhập dành cho Admin</h4>
            <form action="FormLoginAdmin" method="post">
            @csrf
              <div class="form-row">
                <div class="col-lg-7">
                  <input type="email" placeholder="Địa chỉ Email" class="form-control my-3 p-4" name="email">
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                  <input type="password" placeholder="Mật khẩu" class="form-control my-3 p-4" name="password">
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                  <input type="submit" value="Đăng nhập" class="btn-login mt-3 mb-5"></input>
                </div>
              </div>
              <a href="#">Quên mật khẩu ?</a>
              <p>Bạn chưa có tài khoản ? <a href="./signup.html">Đăng ký ngay</a></p>
            </form>
          </div>
        </div>
      </div>
    </section>

