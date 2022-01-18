@extends('layouts.front')

@section('title',$product->name)
@section('content')
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Rate {{$product->name}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{url('/add-rating')}}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                    <div class="rating-css">
                        <div class="star-icon">
                            @if($user_rating)
                                @for($i=1; $i<= $user_rating->stars_rated; $i++)
                                    <input type="radio" value="{{$i}}" name="product_rating" checked id="rating{{$i}}">
                                    <label for="rating{{$i}}" class="fa fa-star"></label>
                                @endfor
                                @for($j=$user_rating->stars_rated+1; $j<= 5; $j++)
                                        <input type="radio" value="{{$j}}" name="product_rating"  id="rating{{$j}}">
                                        <label for="rating{{$j}}" class="fa fa-star"></label>
                                @endfor
                                @else
                                    <input type="radio" value="1" name="product_rating" checked id="rating1">
                                    <label for="rating1" class="fa fa-star"></label>
                                    <input type="radio" value="2" name="product_rating" id="rating2">
                                    <label for="rating2" class="fa fa-star"></label>
                                    <input type="radio" value="3" name="product_rating" id="rating3">
                                    <label for="rating3" class="fa fa-star"></label>
                                    <input type="radio" value="4" name="product_rating" id="rating4">
                                    <label for="rating4" class="fa fa-star"></label>
                                    <input type="radio" value="5" name="product_rating" id="rating5">
                                    <label for="rating5" class="fa fa-star"></label>
                                @endif
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                    </form>
            </div>
        </div>
    </div>
    </div>
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{url('category')}}">Collection</a> /
                <a href="{{url('category/'.$product->category->slug)}}">{{$product->category->name}}</a>/
                <a href="{{url('category/'.$product->category->slug.'/'.$product->slug)}}">{{$product->name}}</a>
            </h6>
        </div>
    </div>
    <div class="container pb-5">
        <div class="product_data">
            <div class="">
                <div class="row">
            <div class="col-md-4 border-right">
                <img src="{{asset('assets/uploads/product/'.$product->image)}}" width="200px" alt="category image">
            </div>
                <div class="col-md-8">
                    <h2 class="mb-0">
                        {{$product->name}}
                        @if($product->trending =='1')
                        <label style="font-size: 16px;" class="float-end badge bg-danger trending-tag">Trending</label>
                            @endif
                    </h2>
                    <hr>
                    <label class="me-3">Original Price:<s> {{$product->original_price}} sp</s></label>
                    <label class="fw-bold">Selling Price: {{$product->selling_price}} sp</label>
                   @php $rateNum= number_format($rating_value) @endphp
                    <div class="rating">
                        @for($i=1; $i<= $rateNum; $i++)
                        <i class="fa fa-star checked"></i>
                        @endfor
                            @for($j=$rateNum+1; $j<= 5; $j++)
                        <i class="fa fa-star"></i>
                            @endfor
                            <span>
                            @if($rating->count()>0)
                                    {{$rating->count()}} Ratings
                                @else
                                    No Ratings
                                @endif
                        </span>
                    </div>
                    <p class="mt-3">
                        {!!$product->small_description!!}
                    </p>
                    <hr>
                    @if($product->qty > 0)
                        <label class="badge bg-success">in stock</label>
                        @else
                        <label class="badge bg-danger">out of stock</label>
                        @endif
                    <div class="row mt-2">
                        <div class="col-md-2">
                            <input type="hidden" value="{{$product->id}}" class="prod_id">
                            <label for="quantity">Quantity</label>
                            <div class="input-group text-center mb-3">
                                <button class="input-group-text decrement-btn">-</button>
                                <input type="text" name="quantity " value="1" class="form-control qty-input text-center"/>
                                <button class="input-group-text increment-btn">+</button>
                  </div>
                        </div>
                        <div class="col-md-10">
                            <br/>
                            @if($product->qty > 0)
                                <button type="button" class="btn btn-success me-3 addToCartBtn float-start">Add to Cart<i class="fa fa-shopping-cart"></i></button>
                            @endif
                            <button type="button" class="btn btn-success me-3 addToWishListBtn float-start ">Add to Wishlist<i class="fa fa-heart"></i></button>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <hr>
                        <h3>Description</h3>
                        <p class="mt-3">{!! $product->description !!}</p>
                    </div>
                    <hr>
                </div>
                    <div class="row">
                        <div class="col-md-4">
                            <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Rate this Product
                            </button>
                            <a href="{{url('add-review/'.$product->slug.'/user-review')}}" class="btn btn-link" >
                                Write a Review
                            </a>
                        </div>
                        <div class="col-md-8">
                            @foreach($reviews as $review)
                                <div class="user_review">
                                    <label for="">{{$review->user->name.' '.$review->user->l_name}}</label>
                                    @if($review->user_id == \Illuminate\Support\Facades\Auth::id())
                                    <a href="{{url('edit-review/'.$product->slug.'/user-review')}}">edit</a>
                                    @endif
                                    <br>
                                    @php $rating=\App\Rating::query()->where('prod_id',$product->id)->where('user_id',$review->user->id)->first(); @endphp
                                    @if($rating)
                                        @php $user_rated= $rating->stars_rated @endphp
                                        @for($i=1; $i<= $user_rated; $i++)
                                            <i class="fa fa-star checked"></i>
                                        @endfor
                                        @for($j=$user_rated+1; $j<= 5; $j++)
                                            <i class="fa fa-star"></i>
                                        @endfor
                                        @endif
                                    <small>reviewed on {{$review->created_at->format('d M Y')}}</small>
                                    <p>{{$review->user_review}}</p>
                                </div>
                            @endforeach
                        </div>

                </div>
            </div>
        </div>
    </div>
@endsection


