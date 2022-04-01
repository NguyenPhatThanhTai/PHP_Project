@extends('Layout.Client')

@section('title', 'DTT Store - Đăng ký')

@section('style-libraries')
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- logo -->
    <link rel="icon" href="./images/TTDStore_logo.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/signup.css') }}">
@stop

@section('content')
<section class="Form my-4 mx-5">
      <div class="container">
        <div class="row no-gutters">
          <div class="col-lg-5">
            <img src="./images/thumb_login.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-7 px-5 pt-5">
            <h1 class="font-weight-bold py-3">DTT Store</h1>
            <h4>Đăng ký ngay</h4>
            <form>
              <div class="form-row">
                <div class="col-lg-7">
                  <input type="email" placeholder="Địa chỉ Email" class="form-control my-3 p-4">
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                  <input type="password" placeholder="Mật khẩu" class="form-control my-3 p-4">
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                  <input type="tel" placeholder="Số điện thoại" class="form-control my-3 p-4">
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                  <button type="button" class="btn-login mt-3 mb-5">Đăng ký</button>
                </div>
                <p>Bạn đã có tài khoản ? <a href="./login.html">Đăng nhập ngay</a></p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
@stop

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
@stop