@extends('Layout.Client')

@section('title', 'DTT Store - Trang Chủ')

@section('style-libraries')
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DTT Store</title>
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- box icons -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <!-- logo -->
    <link rel="icon" href="{{ asset('images/TTDStore_logo.png') }}">
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('css/grid.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@stop

@section('content')
    <!-- hero section -->
    <div class="hero">
        <div class="slider">
            <div class="container">
                <!-- slide item -->
                <div class="slide active">
                    <div class="info">
                        <div class="info-content">
                            <h3 class="top-down">
                                BAG CAROL PINK
                            </h3>
                            <h2 class="top-down trans-delay-0-2">
                                Next-gen design
                            </h2>
                            <p class="top-down trans-delay-0-4">
                                Sản phẩm phù hợp cho giới trẻ. Màu sắc cá tính, trẻ trung cùng với thiết kế đậm chất tươi mới. Khiến cho nhiều anh em phải ngước nhìn.
                            </p>
                            <div class="top-down trans-delay-0-6">
                                <button class="btn-flat btn-hover">
                                    <span>mua ngay</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="img top-down">
                        <img src="./images/bag6.jpg" alt="">
                    </div>
                </div>
                <!-- end slide item -->
                <!-- slide item -->
                <div class="slide">
                    <div class="info">
                        <div class="info-content">
                            <h3 class="top-down">
                                BAG TUNE HORIZON
                            </h3>
                            <h2 class="top-down trans-delay-0-2">
                                New trending
                            </h2>
                            <p class="top-down trans-delay-0-4">
                                Sản phẩm phù hợp cho giới trẻ. Màu sắc cá tính, trẻ trung cùng với thiết kế đậm chất tươi mới. Khiến cho nhiều anh em phải ngước nhìn.
                            </p>
                            <div class="top-down trans-delay-0-6">
                                <button class="btn-flat btn-hover">
                                    <span>mua ngay</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="img right-left">
                        <img src="./images/bag12.jpg" alt="">
                    </div>
                </div>
                <!-- end slide item -->
                <!-- slide item -->
                <div class="slide">
                    <div class="info">
                        <div class="info-content">
                            <h3 class="top-down">
                                BAG YOUNG YELLOW
                            </h3>
                            <h2 class="top-down trans-delay-0-2">
                                Simple is good
                            </h2>
                            <p class="top-down trans-delay-0-4">
                                Sản phẩm phù hợp cho giới trẻ. Màu sắc cá tính, trẻ trung cùng với thiết kế đậm chất tươi mới. Khiến cho nhiều anh em phải ngước nhìn.
                            </p>
                            <div class="top-down trans-delay-0-6">
                                <button class="btn-flat btn-hover">
                                    <span>mua ngay</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="img left-right">
                        <img src="./images/bag14.jpg" alt="">
                    </div>
                </div>
                <!-- end slide item -->
            </div>
            <!-- slider controller -->
            <button class="slide-controll slide-next">
                <i class='bx bxs-chevron-right'></i>
            </button>
            <button class="slide-controll slide-prev">
                <i class='bx bxs-chevron-left'></i>
            </button>
            <!-- end slider controller -->
        </div>
    </div>
    <!-- end hero section -->

    <!-- promotion section -->
    <div class="promotion">
        <div class="row">
            <div class="col-4 col-md-12 col-sm-12">
                <div class="promotion-box">
                    <div class="text">
                        <h3>Balo</h3>
                        <button class="btn-flat btn-hover"><span>xem ngay</span></button>
                    </div>
                    <img src="./images/bagbgrm_bg.png" alt="">
                </div>
            </div>
            <div class="col-4 col-md-12 col-sm-12">
                <div class="promotion-box">
                    <div class="text">
                        <h3>Túi xách</h3>
                        <button class="btn-flat btn-hover"><span>xem ngay</span></button>
                    </div>
                    <img src="./images/bagrmbg_removebg.png" alt="">
                </div>
            </div>
            <div class="col-4 col-md-12 col-sm-12">
                <div class="promotion-box">
                    <div class="text">
                        <h3>Túi đeo chéo</h3>
                        <button class="btn-flat btn-hover"><span>xem ngay</span></button>
                    </div>
                    <img src="./images/bagbgrmv_removebg.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- end promotion section -->

    <!-- product list -->
    <div class="section">
        <div class="container">
            <div class="section-header">
                <h2>Sản phẩm mới nhất</h2>
            </div>
            <div class="row" id="latest-products">
                @foreach($ListProduct as $item)
                    <div class="col-3 col-md-6 col-sm-12">
                        <div class="product-card">
                            <div class="product-card-img">
                                <img src="{{$item -> img_cover}}" alt="">
                                <img src="{{$item -> img_hover}}" alt="">
                            </div>
                            <div class="product-card-info">
                                <div class="product-btn">
                                    <button class="btn-flat btn-hover btn-shop-now"><a href="/Detail?prodId={{$item -> id}}">xem ngay</a></button>
                                    <button class="btn-flat btn-hover btn-cart-add" onclick="addToCart('{{$item -> product_id}}', '{{$item -> price}}', '{{$item -> img_cover}}', '{{$item -> name}}')">
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
                                    <span><del>{{$item -> price + ($item -> price)/2}}</del> VND</span>
                                    <span class="curr-price">{{$item -> price}} VND</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="section-footer">
                <a href="/AllProducts?offset=1" class="btn-flat btn-hover">xem tất cả</a>
            </div>
        </div>
    </div>
    <!-- end product list -->

    <!-- special product -->
    <div class="bg-second">
        <div class="section container">
            <div class="row">
                <div class="col-4 col-md-4">
                    <div class="sp-item-img">
                        <img src="./images/tuixachfgd_ccexpress.png" alt="">
                    </div>
                </div>
                <div class="col-7 col-md-8">
                    <div class="sp-item-info">
                        <div class="sp-item-name">SIMPLE SERIES</div>
                        <p class="sp-item-description">
                            Sản phẩm phù hợp cho giới trẻ. Màu sắc cá tính, trẻ trung cùng với thiết kế đậm chất tươi mới. Khiến cho nhiều anh em phải ngước nhìn.
                        </p>
                        <button class="btn-flat btn-hover">xem ngay</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end special product -->

    

    <!-- blogs -->
    <div class="section">
        <div class="container">
            <div class="section-header">
                <h2>bài viết mới nhất</h2>
            </div>
            <div class="blog">
                <div class="blog-img">
                    <img src="./images/thub0403.jpg" alt="">
                </div>
                <div class="blog-info">
                    <div class="blog-title">
                        Sản phẩm bán chạy nhất tháng 3
                    </div>
                    <div class="blog-preview">
                        Sản phẩm phù hợp cho giới trẻ. Màu sắc cá tính, trẻ trung cùng với thiết kế đậm chất tươi mới. Khiến cho nhiều anh em phải ngước nhìn.
                    </div>
                    <button class="btn-flat btn-hover">đọc tiếp</button>
                </div>
            </div>
            <div class="blog row-revere">
                <div class="blog-img">
                    <img src="./images/THUMB.jpg" alt="">
                </div>
                <div class="blog-info">
                    <div class="blog-title">
                        Sản phẩm nổi bật tháng 4
                    </div>
                    <div class="blog-preview">
                        Sản phẩm phù hợp cho giới trẻ. Màu sắc cá tính, trẻ trung cùng với thiết kế đậm chất tươi mới. Khiến cho nhiều anh em phải ngước nhìn.
                    </div>
                    <button class="btn-flat btn-hover">đọc tiếp</button>
                </div>
            </div>
            <div class="section-footer">
                <a href="#" class="btn-flat btn-hover">xem tất cả</a>
            </div>
        </div>
    </div>
    <!-- end blogs -->
@stop

@section('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/index.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        function addToCart(ProductId, Price, Img, Name){
			$.ajax({
				  type: 'POST',
				  contentType : 'application/json; charset=utf-8',
				  data: JSON.stringify({ 
                    "_token": "{{ csrf_token() }}",
			        "productId": ProductId, 
			        "number": 1,
			        "action": 0,
			        "price": Price,
			        "image": Img,
			        "name": Name
			      }),
				  url: 'AddToCart',
				  success: function (data) {
                      data = JSON.parse(data);
                      console.log(data);
                        
                        if(data.IsSuccess == "true"){
                            alert("Thêm vào giỏ hàng thành công");
                        }
                        else{
                            alert("Thêm vào giỏ hàng thất bại");
                        }
				  }
			});	
		}
    </script>
@stop