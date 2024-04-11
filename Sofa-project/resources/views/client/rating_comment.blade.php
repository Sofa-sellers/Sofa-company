<!-- rating_comment.blade.php -->

@extends('guest.productdetail')

{{-- Hiển thị các đánh giá đã có --}}
@foreach ($products as $product)
    {{-- Kiểm tra xem sản phẩm có đánh giá không --}}
    @if ($product->ratingComments)
        @foreach ($product->ratingComments as $ratingComment)
            <div class="single-review">
                <div class="review-content">
                    <div class="review-top-wrap">
                        <div class="review-left">
                            <div class="review-name">
                                <h4>{{ $ratingComment->user->name }}</h4>
                            </div>
                            <div class="rating-product">
                                @for ($i = 0; $i < $ratingComment->rating; $i++)
                                    <i class="ion-android-star"></i>
                                @endfor
                            </div>
                        </div>
                        {{-- Chỉ hiển thị nút chỉnh sửa đánh giá nếu là đánh giá của người dùng hiện tại --}}
                        @if ($ratingComment->user_id === auth()->id())
                            <div class="review-left">
                                <a href="#" class="edit-rating-comment">Edit</a>
                            </div>
                        @endif
                    </div>
                    <div class="review-bottom">
                        <p>{{ $ratingComment->comment }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <p>No reviews available for this product.</p>
    @endif
@endforeach

<div class="ratting-form-wrapper">
    <h3>Add a Review</h3>
    {{-- Form viết đánh giá mới --}}
    <div class="ratting-form">
        <form action="{{ route('client.ratingCommentStore', ['product_id' => $product->id]) }}" method="POST">
            @csrf
            <div class="star-box">
                <span>Your rating:</span>
                <div class="rating-product">
                    <input type="hidden" name="rating" value="1">
                    <i class="ion-android-star"></i>
                    <i class="ion-android-star"></i>
                    <i class="ion-android-star"></i>
                    <i class="ion-android-star"></i>
                    <i class="ion-android-star"></i>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="rating-form-style mb-10">
                        <input placeholder="Name" type="text" name="name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="rating-form-style mb-10">
                        <input placeholder="Email" type="email" name="email">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="rating-form-style form-submit">
                        <textarea name="comment" placeholder="Message"></textarea>
                        <button type="submit" class="btn btn-dark">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
