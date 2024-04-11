@extends('master')
@section('content')
   <!-- main content start -->
    <!-- bread crumb section start -->
  <nav class="breadcrumb-section bg-light bread-crumb-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb bg-transparent m-0 p-0 justify-content-center align-items-center">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </nav>
    <!-- bread crumb section end -->

    <!-- modal gallery slider start -->
    <section>
        <div class="container">
            <div class="row mb-n4">
                <div class="col-md-5 mb-4">
                    <div class="modal-gallery-slider">
                        <div class="gallery">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">

                                    <div class="swiper-slide product-modal-gallery-item">
                                        <img src="{{asset('uploads/'.$product->image)}}" alt="image_not_found" class="img-fluid" style="height: 600px;">
                                    </div>
                                    @foreach($product->productimages as $pi)
                                    <div class="swiper-slide product-modal-gallery-item">
                                        <img src="{{asset('uploads/'.$pi->name)}}" alt="image_not_found" class="img-fluid" style="height: 600px;">
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>

                        <div class="gallery-thumbs">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide product-modal-gallery-thumbs-item">
                                        <a href="javascript:void(0)"> <img src="{{asset('uploads/'.$product->image)}}" alt="image_not_found" class="img-fluid" style="height: 150px;"></a>
                                    </div>
                                    @foreach($product->productimages as $pi)
                                    <div class="swiper-slide product-modal-gallery-thumbs-item">
                                        <a href="javascript:void(0)">
                                            <img src="{{asset('uploads/'.$pi->name)}}" alt="image_not_found" class="img-fluid" style="height: 150px;">
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- If we need pagination -->
                            <div class="swiper-pagination"></div>
                        </div>

                    </div>
                </div>
                <!--Product start  -->
                <div class="col-md-7 mb-4">
                    <form method="post" action="{{ route('client.addToCart')}}">
                    
                        @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                        </div>
                        @endif
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-check"></i> Success!</h5>
                        {{ $message }}
                        </div>
                        
                        
                        @elseif ($message = Session::get('failed'))
                        <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-check"></i> Failed!</h5>
                        {{ $message }}
                        </div>
                        @endif

                        @csrf
                        <input type="hidden" name="id" value="{{$product->id}}">
                        
                        <div class="modal-product-des">
                            <h3 class="modal-product-title"><a href="#">{{$product->name}}</a></h3>
                            
                            {{-- Star --}}
                            {{-- <div class="reviews">
                                <span class="ion-star"></span>
                                <span class="ion-star"></span>
                                <span class="ion-star"></span>
                                <span class="ion-star"></span>
                                <span class="ion-star"></span>
                            </div> --}}

                            <div class="product-price-wrapp-lg">
                               
                                @if($product->price==0)
                                
                                <h4 class="product-price" style="font-size: 40px; color: black">$ {{ number_format($product->sale_price, 0, "", ".") }}</h4>
                                @else
                                
                                <span class="product-regular-price-lg">$ {{ number_format($product->price, 0, "", ".") }}</span>
                                <span class="product-price-on-sale-lg">$ {{ number_format($product->sale_price, 0, "", ".") }}</span>
                                <span class="badge badge-lg bg-dark">Save {{intval(100-($product->sale_price / $product->price * 100))}}%</span>
                                @endif 
                                
                            </div>

                            @if ($product->quantity > 5)
                                <div class="product-price-wrapp-lg">
                                    <span class="badge bg-success" style="font-size: 15px">In Stock {{$product->quantity}}</span>
                                </div>
                            @elseif($product->quantity == 0)
                            <div class="product-price-wrapp-lg">
                                <span class="badge bg-danger" style="font-size: 15px">Out of stock!!!</span>
                            </div>
                            @else
                            <div class="product-price-wrapp-lg">
                                <span class="badge bg-danger" style="font-size: 15px">Running out of stock!! Only {{$product->quantity}} now</span>
                            </div>
                            @endif
                            

                            <div class="product-description-short">
                                <p>{{$product->intro}}</p>
                            </div>


                            <div class="product-variants">
                                <div class="product-variants-item">
                                    <span class="control-label">Color</span>
                                    <ul>
                                        @foreach($colors as $c)
                                        @if($c)
                                        <li class="input-container">
                                            <label>
                                            <input class="input-color" type="radio" name="color" value="{{$c->id}}" required checked>
                                            <span class="color" style="background-color: {{ $c->value }} "></span>
                                            </label>
                                            <input type="hidden" name="selected_color" value="{{$c->id}}">
                                        </li>
                                        
                                        @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            

                            <div class="product-add-to-cart">
                                <span class="control-label">Quantity</span>

                                <div class="product-count style d-flex my-4">
                                    <div class="count d-flex">
                                        @if($product->quantity < 6)
                                        <input type="number" min="1" max="{{$product->quantity}}" style="width: 80%;" name="quantity" value="1">
                                        @else
                                        <input type="number" min="1" max="5" style="width: 80%;" name="quantity" value="1">
                                        @endif
                                    </div>
                                    <div>
                                        <button type="submit" class="btn animated btn-outline-dark">
                                            Add to cart
                                        </button>
                                    </div>
                                </div>
                                <div class="product-add-to-card">
                                    @auth
                                        <a class="product-add-to-card-item" onclick="saveToWishlist('{{$product->id}}',{{Auth::user()->id}})"><i class="ion-ios-heart-outline"></i> Add to wishlist</a>
                                        <a class="product-add-to-card-item" href="{{route('client.showWishlist',['id'=>Auth::user()->id])}}"><i class="ion-android-sync"></i> My wishlist</a>
                                    @endauth
                                    @guest
                                        <a class="product-add-to-card-item" onclick="saveToWishlist('{{$product->id}}','0')"><i class="ion-ios-heart-outline"></i> Add to wishlist</a>
                                        <a class="product-add-to-card-item" href="{{route('showLogin')}}"><i class="ion-android-sync"></i> My wishlist</a>
                                    @endguest
                                </div>

                                <div class="product-social-sharing">
                                    <span>Share</span>
                                    <ul>
                                        <li class="facebook"><a href="#" target="_blank"><i class="ion-social-facebook"></i></a></li>
                                        <li class="twitter"><a href="#" target="_blank"><i class="ion-social-twitter"></i></a></li>
                                        <li class="pinterest"><a href="#" target="_blank"><i class="ion-social-pinterest"></i></a></li>
                                        <li class="google"><a href="#" target="_blank"><i class="ion-social-google"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- modal gallery slider end -->

    <section class="section-padding-bottom section-padding-top">

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-tabs single-product-tab justify-content-center" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#description" role="tab">Description</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#productdetails" role="tab" aria-selected="false">Product
                            Details</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="tab" href="#reviews" role="tab" aria-selected="true">Reviews</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade" id="description" role="tabpanel">
                    <div class="row">
                        <div class="col-12">
                            <div class="single-product-desc">
                                <p>
                                    {{$product->description}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="productdetails" role="tabpanel">
                    <div class="row">
                        <div class="col-12">
                            <div class="single-product-desc" >
                                <div class="product-anotherinfo-wrapper" >
                                    <ul>
                                        <li style="font-size: 20px"><span>Material</span>
                                            @foreach ($material as $item)
                                            {{$item->value}}
                                            @endforeach
                                        </li>
                                        <li style="font-size: 20px"><span>Dimensions</span>
                                            @foreach ($dimension as $item)
                                            {{$item->value}}
                                            @endforeach
                                        </li>
                                        <li style="font-size: 20px">
                                            <span>Direction for Use</span>
                                            <a href="{{ asset('uploads/' . $product->file) }}" target="_blank">
                                                <i style="color: gray">Download</i>
                                            </a>
                                            
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- comment --}}
                <div class="tab-pane fade active show" id="reviews" role="tabpanel">
                    <div class="single-product-desc">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="review-wrapper">
                                    @auth
                                    <div class="single-review">
                                        <?php
                                        $mycomment = App\Models\RatingComment::where('product_id', $product->id)->where('user_id',Auth::User()->id)->where('status', 1)->get();
                                        ?>
                                        @foreach($mycomment as $com)
                                        <div class="review-content">
                                            <div class="review-top-wrap">
                                                <div class="review-left">
                                                    <div class="review-name">
                                                        <h4>{{$com->username}}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="review-bottom">
                                                <p style="width: 100%">
                                                    {{$com->comment}}
                                                </p>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    @endauth
                                    @guest
                                    @foreach($comments as $com)
                                    <div class="single-review">
                                        <div class="review-content">
                                            <div class="review-top-wrap">
                                                <div class="review-left">
                                                    <div class="review-name">
                                                        <h4>{{$com->username}}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="review-bottom">
                                                <p>
                                                    {{$com->comment}}
                                                </p>
                                            </div>
                                        </div>
                                    </div> 
                                    @endforeach                                  
                                    @endguest
                                </div>
                            </div>
                            <div class="col-lg-5">
                                @auth
                                <div class="ratting-form-wrapper">
                                    <h3>Add a Review</h3>
                                </br>
                                    <div class="ratting-form">
                                        <form action="{{route('client.commentCreate',['id'=>$product->id])}}" method="POST">
                                            @csrf
                                            @if ($errors->any())
                                            <div class="alert alert-danger alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                            </div>
                                            @endif
                                            @if ($message = Session::get('success'))
                                            <div class="alert alert-success alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <h5><i class="icon fas fa-check"></i> Success!</h5>
                                            {{ $message }}
                                            </div>


                                            @elseif ($message = Session::get('failed'))
                                            <div class="alert alert-danger alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <h5><i class="icon fas fa-check"></i> Failed!</h5>
                                            {{ $message }}
                                            </div>
                                            @endif
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="rating-form-style form-submit">
                                                        <textarea placeholder="Message" name="comment" value="{{old('comment')}}"></textarea>
                                                        <button type="submit" class="btn btn-dark">
                                                        Submit
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <form action="{{route('client.commentDelete')}}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="rating-form-style form-submit">
                                                        <button onclick="return confirmDelete(this)" type="submit" class="btn btn-dark">
                                                        Delete
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
                {{-- comment --}}
            </div>
        </div>

    </section>

    <!-- featured product start -->
    <div class="featured-product-section section-padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <section class="section-title text-center">
                        <h3 class="title">Featured Products</h3>
                    </section>
                </div>
                <div class="col-12">
                    <div class="featured-product swiper-arrow arrow-position-center">
                        <!-- Slider main container -->
                        <div class="swiper-container">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                @foreach($products_related as $pr)
                                    <div class="swiper-slide">
                                        <div class="product-list">
                                            <div class="product-card">
                                                <a href="{{route('detail',['slug'=>$pr->slug])}}" class="product-thumb">
                                                {{-- <span class="onsale bg-danger">sale!</span> --}}
                                                <img src="{{asset('uploads/'.$pr->image)}}" alt="image_not_found" class="img-fluid" style="height: 415px;">
                                                </a>
                                                <!-- thumb end -->
                                                <div class="product-content">
                                                    <h4><a href="{{ route('detail',['slug'=>$pr->slug]) }}" class="product-title">{{ $pr->name }}</a></h4>
                                                    <i><a href="{{ route('detail',['slug'=>$pr->slug]) }}"  style="color: gray">{{ $pr->intro }}</a></i>

                                                    <div class="product-group">
                                                        <h5 class="product-price">
                                                            @if(!$pr->price)
                                                            $ {{ number_format($pr->sale_price, 0, "", ".") }}
                                                            @else
                                                            <del class="old-price">$ {{ number_format($pr->price, 0, "", ".") }}</del> 
                                                            <span class="new-price">$ {{ number_format($pr->sale_price, 0, "", ".") }}</span>
                                                            <span class="badge badge-lg bg-dark" style="background-color: red !important;">Save {{intval(100-($pr->sale_price / $pr->price * 100))}}%</span>
                                                            @endif 
                                                            </h5>
            
                                                            <a href="{{route('detail',['slug'=>$product->slug])}}" class="product-btn">View Detail</a>
                                                    </div>

                                                </div>
                                                
                                                
                                            </div>
                                        </div>
                                        <!-- product list end -->
                                    </div>
                            <!-- swiper-slide end -->
                                @endforeach
                            </div>
                        </div>
                        <!-- If we need navigation buttons -->
                        <div class="featured-product swiper-button-prev"></div>
                        <div class="featured-product swiper-button-next"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- featured product end -->


    <!-- main content end -->
<script>
    function saveToWishlist(productID,userID){
            if(userID==0){
                alert('please login before add product to wishlist');
            }else{
                $.ajax({
                    "url":'{{route('client.addToWishlist')}}',
                    "method":'POST',
                    'data':{product_id:productID,user_id:userID,_token: '{{csrf_token()}}'},
                    success:function(resp){
                        alert(resp);
                    },
                    error:function(error){
                        alert(error);
                    }
                })
            }
        }
        function confirmDelete(link){
            var message = 'Are you sure you want to delete?';
            return confirm(message);
        }
</script>
@endsection