@extends('master')
@section('module','Compare')
@section('content')
<!-- main content start -->
<section class="compare-section section-padding-bottom">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="title mb-5 pb-3 text-capitalize">compare</h3>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">product info</th>
                                @foreach ($data as $item)
                                <th scope="col" class="text-center">
                                    <img src="{{asset('uploads/'.$item->image)}}" style="max-width: 200px; max-height: 300px;" alt="{{$item->slug}}">
                                    <span class="sub-title d-block">{{$item->slug}}</span>
                                    <a href="{{route('client.addToCart')}}" class="btn btn-dark">
                                    add to cart</a>
                                </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Product</th>
                                @foreach ($data as $key=>$item)
                                <td class="text-center">
                                    <span class="whish-list-price"> {{$item->slug}}</span>
                                </td>
                                @endforeach
                            </tr>
                            <tr>
                                <th scope="row">Price</th>
                                @foreach ($data as $key=>$item)
                                <td class="text-center">
                                    <span class="whish-list-price"> {{number_format($item->sale_price, 0, "", ".") }}$ </span>
                                </td>
                                @endforeach
                            </tr>
                            <tr>
                                <th scope="row">Description</th>
                                @foreach ($data as $item)
                                <td class="text-center">
                                    <p>{{$item->description}}</p>
                                </td>
                                @endforeach
                            </tr>
                            <tr>
                                <th scope="row">Availability</th>
                                @foreach ($data as $item)
                                @if($item->quantity>0)
                                <td class="text-center">
                                    <span class="badge bg-success">In Stock</span>
                                </td>
                                @else
                                <td class="text-center">
                                    <span class="badge bg-dark">Out of Stock</span>
                                </td>
                                @endif
                                @endforeach
                            </tr>
                            <tr>
                                <th scope="row">Category</th>
                                @foreach ($data as $item)
                                <?php dd($item->category->name)?>
                                <td class="text-center">{{$item->categories->name}}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <th scope="row">Brand</th>
                                @foreach ($data as $key=>$item)
                                <td class="text-center">{{$item->brand->name}}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <th scope="row">Dimension</th>
                                @foreach ($data as $key=>$item)
                                <td class="text-center">{{$item->dimension_id}}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <th scope="row">Material</th>
                                @foreach ($data as $key=>$item)
                                <td class="text-center">{{$item->material_id}}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <th></th>
                                @foreach ($data as $key=>$item)
                                <td align="center" style="background: red;padding:12px;color:white" onclick="removeItem('{{$item->id}}')">Remove Product</td>
                                @endforeach
                            </tr>
                        </tbody>             
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function removeItem(product_id){
        $.ajax({
            "url":'{{route('client.DeleteCompareProduct')}}',
            "method":'POST',
            'data':{product_id:product_id,_token:'{{csrf_token()}}'},
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