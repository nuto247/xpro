@include('header')
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="hero__slider owl-carousel">
            
            <div class="hero__items set-bg" data-setbg="img/hero/hero-2.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <h6>Success Secrets</h6>
                                <h2>New Strategies To Earn More Money</h2>
                                <p>Learn from well experienced experts, equip yourself with new information to help you advance your career.</p>
                                <a href="register" class="primary-btn">Start Learning Now! <span class="arrow_right"></span></a>
                                <div class="hero__social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Banner Section Begin -->
    <section class="banner spad">
       
    </section>
    <!-- Banner Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="filter__controls">
                        <li class="active" data-filter="*">Discover New Strategies To Earn Extra Income</li>
                     
                       
                    </ul>
                </div>
            </div>
            <div class="row product__filter">
            @foreach ($products as $product)
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix hot-sales">
                    <div class="product__item">
                    <a href="{{ route('productdetail', $product->id) }}">
                        <div class="product__item__pic set-bg" data-setbg="{{ asset('images/' . $product->image_path) }}">
                 
                        </div>
                        </a> 
                        <div class="product__item__text">
                       
                            <h5>{{ $product->product_name }}</h5>
                            <h5>Price: NGN{{ $product->product_price }}</h5>
                            <div >
                            <td>

                                
                                                                    <form method="POST"
                                                                        action="{{ route('paynow') }}">
                                                                        @csrf

                                                                        <input type="hidden" name="product_id"
                                                                            value="{{ $product->id }}">

                                                                        <button type="submit" class="btn btn-primary">
                                                                            Pay Now
                                                                        </button>

                                                                    </form>
                                                                </td>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
           
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Categories Section Begin -->

    <!-- Categories Section End -->

    <!-- Instagram Section Begin -->

    <!-- Instagram Section End -->

    <!-- Latest Blog Section Begin -->
    <section class="latest spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Latest News</span>
                        <h2>Success Stories Of People Who Took Action</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-1.jpg"></div>
                        <div class="blog__item__text">
                            <span><img src="img/icon/calendar.png" alt=""> 16 May 2024</span>
                            <h5>How I Mastered The Art Of Facebook Ads</h5>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-2.jpg"></div>
                        <div class="blog__item__text">
                            <span><img src="img/icon/calendar.png" alt=""> 21 May 2024</span>
                            <h5>How I Made My First 10 Sales On Pampost.com</h5>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-3.jpg"></div>
                        <div class="blog__item__text">
                            <span><img src="img/icon/calendar.png" alt=""> 28 May 2024</span>
                            <h5>I Created My First Digital Product On Pampost.com</h5>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Blog Section End -->

   @include('footer')