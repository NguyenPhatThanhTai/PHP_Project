@extends('Layout.Client')

@section('title', 'DTT Store - Trang Chủ')

@section('style-libraries')
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DTT Store</title>
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,900&display=swap" rel="stylesheet">
    <!-- boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- logo -->
    <link rel="icon" href="{{ asset('images/TTDStore_logo.png') }}">
    <!-- app css -->
    <link rel="stylesheet" href="{{ asset('css/grid.css') }}">
    <link rel="stylesheet" href="{{ asset('css/products.css') }}">
@stop

@section('content')
	<!-- products content -->
    <div class="bg-main">
        <div class="container">
            <div class="box">
                <div class="breadcumb">
                    <a href="./index.html">trang chủ</a>
                    <span><i class='bx bxs-chevrons-right'></i></span>
                    <a href="./products.html">tất cả sản phẩm</a>
                </div>
            </div>
            <div class="box">
                <div class="row">
                    <div class="col-3 filter-col" id="filter-col">
                        <div class="box filter-toggle-box">
                            <button class="btn-flat btn-hover" id="filter-close">đóng</button>
                        </div>
                        <div class="box">
                            <span class="filter-header">
                                Danh mục
                            </span>
                            <ul class="filter-list">
                                <li><a href="#">Balo</a></li>
                                <li><a href="#">Túi xách</a></li>
                                <li><a href="#">Túi đeo chéo</a></li>
                            </ul>
                        </div>
                        <div class="box">
                            <span class="filter-header">
                                Giá tiền
                            </span>
                            <div class="price-range">
                                <input type="text">
                                <span>-</span>
                                <input type="text">
                            </div>
                        </div>
                        <div class="box">
                            <ul class="filter-list">
                                <li>
                                    <div class="group-checkbox">
                                        <input type="checkbox" id="status1">
                                        <label for="status1">
                                            Đang hạ giá
                                            <i class='bx bx-check'></i>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="group-checkbox">
                                        <input type="checkbox" id="status2">
                                        <label for="status2">
                                            Có sẵn
                                            <i class='bx bx-check'></i>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="group-checkbox">
                                        <input type="checkbox" id="status3">
                                        <label for="status3">
                                            Đặc biệt
                                            <i class='bx bx-check'></i>
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="box">
                            <span class="filter-header">
                                Nhãn hiệu
                            </span>
                            <ul class="filter-list">
                                @foreach($AllCategory as $item)
                                    <li>
                                        <div class="group-checkbox">
                                            <input type="checkbox" value="{{$item->id}}" class="cateCheck" id="remember{{$item->id}}" onclick="FilterCate(1)">
                                            <label for="remember{{$item->id}}">
                                                {{$item->name}}
                                                <i class='bx bx-check'></i>
                                            </label>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="box">
                            <span class="filter-header">
                                Colors
                            </span>
                            <ul class="filter-list">
                                <li>
                                    <div class="group-checkbox">
                                        <input type="checkbox" id="remember1">
                                        <label for="remember1">
                                            Black
                                            <i class='bx bx-check'></i>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="group-checkbox">
                                        <input type="checkbox" id="remember2">
                                        <label for="remember2">
                                            Pink
                                            <i class='bx bx-check'></i>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="group-checkbox">
                                        <input type="checkbox" id="remember3">
                                        <label for="remember3">
                                            White
                                            <i class='bx bx-check'></i>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="group-checkbox">
                                        <input type="checkbox" id="remember4">
                                        <label for="remember4">
                                            Grey
                                            <i class='bx bx-check'></i>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="group-checkbox">
                                        <input type="checkbox" id="remember5">
                                        <label for="remember5">
                                            Blue
                                            <i class='bx bx-check'></i>
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="box">
                            <span class="filter-header">
                                Đánh giá
                            </span>
                            <ul class="filter-list">
                                <li>
                                    <div class="group-checkbox">
                                        <input type="checkbox" id="remember1">
                                        <label for="remember1">
                                            <span class="rating">
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bxs-star'></i>
                                            </span>
                                            <i class='bx bx-check'></i>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="group-checkbox">
                                        <input type="checkbox" id="remember1">
                                        <label for="remember1">
                                            <span class="rating">
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bx-star'></i>
                                            </span>
                                            <i class='bx bx-check'></i>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="group-checkbox">
                                        <input type="checkbox" id="remember1">
                                        <label for="remember1">
                                            <span class="rating">
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bx-star'></i>
                                                <i class='bx bx-star'></i>
                                            </span>
                                            <i class='bx bx-check'></i>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="group-checkbox">
                                        <input type="checkbox" id="remember1">
                                        <label for="remember1">
                                            <span class="rating">
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bx-star'></i>
                                                <i class='bx bx-star'></i>
                                                <i class='bx bx-star'></i>
                                            </span>
                                            <i class='bx bx-check'></i>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="group-checkbox">
                                        <input type="checkbox" id="remember1">
                                        <label for="remember1">
                                            <span class="rating">
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bx-star'></i>
                                                <i class='bx bx-star'></i>
                                                <i class='bx bx-star'></i>
                                                <i class='bx bx-star'></i>
                                            </span>
                                            <i class='bx bx-check'></i>
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-9 col-md-12">
                        <div class="box filter-toggle-box">
                            <button class="btn-flat btn-hover" id="filter-toggle">lọc</button>
                        </div>
                        <div class="box">
                            <div class="row" id="products">
                            @foreach($AllProduct as $item)
                                <div class="col-4 col-md-6 col-sm-12">
                                    <div class="product-card">
                                        <div class="product-card-img">
                                            <img src="{{$item->img_cover}}" alt="">
                                            <img src="{{$item->img_hover}}" alt="">
                                        </div>
                                        <div class="product-card-info">
                                            <div class="product-btn">
                                                <a href="./product-detail.html" class="btn-flat btn-hover btn-shop-now"><a href="/Detail?prodId={{$item->product_id }}">xem ngay</a></a>
                                                <button class="btn-flat btn-hover btn-cart-add">
                                                    <i class='bx bxs-cart-add'></i>
                                                </button>
                                                <button class="btn-flat btn-hover btn-cart-add">
                                                    <i class='bx bxs-heart'></i>
                                                </button>
                                            </div>
                                            <div class="product-card-name">
                                                {{$item -> name}} 
                                            </div>
                                            <div class="product-card-price">
                                                <span><del>{{$item->price + ($item->price)/2}}</del></span>
                                                <span class="curr-price">{{$item->price}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                        <div class="box">
                            <ul class="pagination">
                                <li><a href="/AllProducts?offset={{$CurrentPage -1}}&cateid={{$CurrentCateId}}"><i class='bx bxs-chevron-left'></i></a></li>
                                @for ($i = 1; $i <= $CountProduct; $i++)
                                    <li><a href="/AllProducts?offset={{$i}}&cateid={{$CurrentCateId}}" class="{{$i == $CurrentPage ? "active" : ""}}">{{$i}}</a></li>
                                @endfor
                                <!-- <li><a href="#" class="active">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li> -->
                                <li><a href="../AllProducts?offset={{$CurrentPage + 1}}&cateid={{$CurrentCateId}}"><i class='bx bxs-chevron-right'></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end products content -->

    <script type="text/javascript">
        function FilterCate(id){
            var checkedValue = "";
            const checkbox = document.getElementsByClassName("cateCheck");
            
            for(var i=0; i < checkbox.length; i++){
                if(checkbox[i].checked){
                     checkedValue += checkbox[i].value + "-";
                }
              }
            
            var urlAssign = "/AllProducts?offset=1";
            if(checkedValue != ""){
                urlAssign += '&cateid= ' + checkedValue;
            }
            window.location.assign(urlAssign);
        }
       
       window.onload = function()
       {
            var rememberFilter = '{{$CurrentCateId}}';
            const listRememberFilter = rememberFilter.split("-");
            
            for(var i=0; i < listRememberFilter.length; i++){
                var id = "remember" + listRememberFilter[i].replace(/\s+/g, '');
                document.getElementById(id).checked = true;
            }
       };
    </script>
    
    <script src="{{ asset('js/iproducts.js') }}"></script>
@stop
    