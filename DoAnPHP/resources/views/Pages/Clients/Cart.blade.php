@extends('Layout.Client')

@section('title', 'DTT Store - Giỏ hàng')

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
    <!-- logo -->
    <link rel="icon" href="./images/TTDStore_logo.png">
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('css/grid.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@stop

@section('content')
  <!-- promotion section -->
  <div class="promo-parent">
        <div class="promotion">
            <div class="row">
                <div class="col-4 col-md-12 col-sm-12">
                    <div class="promotion-box">
                        <div class="text">
                            <h3>Số lượng</h3>
                            <button class="btn-minus btn-hover"><span>-</span></button>
                            <input id="ascending" type="number" value="1">
                            <button class="btn-plus btn-hover"><span>+</span></button>
                            <h3 class="text-all-price">Tổng tiền: <span class="bg-color-price"><input class="price" type="number" value="300000"></span></h3>
                            <input class="hiddenprice" type="hidden" value="300000">
                        </div>
                        <img src="./images/bag7.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="promo-parent">
        <div class="promotion">
            <div class="row">
                <div class="col-4 col-md-12 col-sm-12">
                    <div class="promotion-box">
                        <div class="text">
                            <h3>Số lượng</h3>
                            <button class="btn-minus btn-hover"><span>-</span></button>
                            <input id="ascending" type="number" value="1">
                            <button class="btn-plus btn-hover"><span>+</span></button>
                            <h3 class="text-all-price">Tổng tiền: <span class="bg-color-price"><input class="price" type="number" value="300000"></span></h3>
                            <input class="hiddenprice" type="hidden" value="300000">
                        </div>
                        <img src="./images/bag1.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="promo-parent">
        <div class="promotion">
            <div class="row">
                <div class="col-4 col-md-12 col-sm-12">
                    <div class="promotion-box">
                        <div class="text">
                            <h3>Số lượng</h3>
                            <button class="btn-minus btn-hover"><span>-</span></button>
                            <input id="ascending" type="number" value="1">
                            <button class="btn-plus btn-hover"><span>+</span></button>
                            <h3 class="text-all-price">Tổng tiền: <span class="bg-color-price"><input class="price" type="number" value="300000"></span></h3>
                            <input class="hiddenprice" type="hidden" value="300000">
                        </div>
                        <img src="./images/bag5.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end promotion section -->
    <div class="price">
        <div class="row">
            <div class="col-12 col-md-12 col-sm-12">
                <div class="text-price">
                    <h3>Thành tiền: <span>1.000.000 VND</span></h3>
                    <button class="btn-flat btn-hover complete-cart"><span>Đặt hàng</span></button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('.btn-minus').click(function() {
            var $input = $(this).parent().find('#ascending');
            var count = parseInt($input.val()) - 1;
            count = count < 1 ? 1 : count;
            $input.val(count);
            $input.change();
            var price_all_price = $(this).parent().find('.price');
            var totalprice = parseInt(price_all_price.val())-parseInt($(this).parent().find('.hiddenprice').val());
            price_all_price.val(totalprice < parseInt($(this).parent().find('.hiddenprice').val()) ? parseInt($(this).parent().find('.hiddenprice').val()) : totalprice);
            price_all_price.change();
            return false;
        });
        $('.btn-plus').click(function() {
            var $input = $(this).parent().find('#ascending');
            $input.val(parseInt($input.val()) + 1);
            $input.change();
            var price_all_price = $(this).parent().find('.price');
            var totalprice = parseInt(price_all_price.val())+parseInt($(this).parent().find('.hiddenprice').val());
            price_all_price.val(totalprice < parseInt($(this).parent().find('.hiddenprice').val()) ? parseInt($(this).parent().find('.hiddenprice').val()) : totalprice);
            price_all_price.change();
            return false;
          });
      });
</script>
@stop
