@extends('User.layout')

@section('title', 'Home')

@section('content')
<div class="hero-slider">

    @foreach ($slider as $slide)
    <div class="slider-item th-fullpage hero-area" style="background-image: url({{ asset('pizza_images/'.$slide->image) }});">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 text-center">
              <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1"></p>
              <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">{{ $slide->name }} </h1>
              <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn" href="shop.html">Shop Now</a>
            </div>
          </div>
        </div>
      </div>
    @endforeach



  </div>



  <section class="products section bg-gray">
      <div class="container">
          <div class="row">
              <div class="title text-center">
                  <h2>Trendy Products</h2>
              </div>
          </div>
          <div class="row">

                @foreach ($pizzas as $pizza)
                    <div class="col-md-4">
                        <div class="product-item">
                            <div class="product-thumb">
                                <img class="img-responsive img" src="{{ asset('pizza_images/'.$pizza->image) }}" alt="product-img" />
                                <div class="preview-meta">
                                    <ul>
                                        <li>
                                            <span  data-toggle="modal" data-target="#product-modal">
                                                <i class="tf-ion-ios-search-strong"></i>
                                            </span>
                                        </li>

                                        @guest

                                        @else
                                        <li>
                                            <a href="#!" class="add-to-cart" data-pizza-id="{{ $pizza->id }}"><i class="tf-ion-android-cart"></i></a>
                                        </li>
                                        @endguest


                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4><a href="product-single.html" class="pizza-name">{{ $pizza->name }}</a></h4>
                                <p class="price" class="pizza-price">${{ $pizza->price }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

          <!-- Modal -->
          <div class="modal product-modal fade" id="product-modal">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <i class="tf-ion-close"></i>
              </button>
                <div class="modal-dialog " role="document">
                  <div class="modal-content">
                        <div class="modal-body">
                          <div class="row">
                              <div class="col-md-8 col-sm-6 col-xs-12">
                                  <div class="modal-image">
                                      <img class="img-responsive" src="images/shop/products/modal-product.jpg" alt="product-img" />
                                  </div>
                              </div>
                              <div class="col-md-4 col-sm-6 col-xs-12">
                                  <div class="product-short-details">
                                      <h2 class="product-title">GM Pendant, Basalt Grey</h2>
                                      <p class="product-price">$200</p>
                                      <p class="product-short-description">
                                          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem iusto nihil cum. Illo laborum numquam rem aut officia dicta cumque.
                                      </p>
                                      <a href="cart.html" class="btn btn-main">Add To Cart</a>
                                      <a href="product-single.html" class="btn btn-transparent">View Product Details</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
          </div><!-- /.modal -->

          </div>
      </div>
  </section>

@endsection
