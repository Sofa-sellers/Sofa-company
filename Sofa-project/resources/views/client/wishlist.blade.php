@extends('master')
@section('content')
<nav class="breadcrumb-section breadcrumb-bg1">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="bread-crumb-title">Wishlist</h2>
                <ol class="breadcrumb bg-transparent m-0 p-0 justify-content-center align-items-center">
                    <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                </ol>
            </div>
        </div>
    </div>
</nav>
    <!-- main content start -->
    <section class="whish-list-section section-padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="title mb-5 pb-3 text-capitalize">Your wishlist items</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-center" scope="col">Product Image</th>
                                    <th class="text-center" scope="col">Product slug</th>
                                    <th class="text-center" scope="col">Stock Status</th>
                                    <th class="text-center" scope="col">Price</th>
                                    <th class="text-center" scope="col">action</th>
                                    <th class="text-center" scope="col">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <th class="text-center" scope="row">
                                        <img src="{{asset('uploads/'.$item->item->image)}}" width="250" height="150" alt="{{$item->item->slug}}">
                                    </th>
                                    <td class="text-center">
                                        <span class="whish-title">{{$item->item->slug}}</span>
                                    </td>
                                    <td class="text-center">
                                        @if ($item->item->quantity>0)
                                        <span class="badge bg-success">In Stock</span>
                                        @else
                                        <span class="badge bg-dark">Out of Stock</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <span class="whish-list-price"> ${{$item->item->price}} </span>
                                    </td>
                                    <td class="text-center">
                                        <a onclick="removeWishlistItem('{{$item->id}}')">
                                            <span class="trash"><i class="ion-android-delete"></i> </span></a>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{route('detail',['slug'=>$item->item->slug])}}" class="btn btn-dark">View Detail</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function removeWishlistItem(id){
            $.ajax({
                "url":'{{route('client.wishlistDelete')}}',
                "method":'POST',
                'data':{id:id,_token:'{{csrf_token()}}'},
                success:function(resp){
                    alert(resp);
                },
                error:function(error){
                    alert(error);
                }
            })
        }
    </script>
    <!-- main content end -->
@endsection
