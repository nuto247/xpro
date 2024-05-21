@include('header')
    <!-- Header Section End -->

    <!-- Blog Details Hero Begin -->
    <section class="blog-hero spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-9 text-center">
                    <div class="blog__hero__text">
                        <h2>     {{$product->product_name}}</h2>
                        <ul>
                            <li>By Deercreative</li>
                            <li>February 21, 2019</li>
                            <li>8 Comments</li>
                        </ul>
                    </div><br>
                    <h2>Price: NGN{{$product->product_price}}<h2>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Hero End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-12">

                
                <input type="hidden" name="id" value="{{$product->id}}" readonly><br><br>
                    <div class="blog__details__pic">
                    <img src="{{ asset('images/' . $product->image_path) }}">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="blog__details__content">
                        <div class="blog__details__share">
                            <span>share</span>
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" class="youtube"><i class="fa fa-youtube-play"></i></a></li>
                                <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <div class="blog__details__text">
                            <p>Hydroderm is the highly desired anti-aging cream on the block. This serum restricts the
                                occurrence of early aging sings on the skin and keeps the skin younger, tighter and
                                healthier. It reduces the wrinkles and loosening of skin. This cream nourishes the skin
                                and brings back the glow that had lost in the run of hectic years.</p>
                            <p>The most essential ingredient that makes hydroderm so effective is Vyo-Serum, which is a
                                product of natural selected proteins. This concentrate works actively in bringing about
                                the natural youthful glow of the skin. It tightens the skin along with its moisturizing
                                effect on the skin. The other important ingredient, making hydroderm so effective is
                                “marine collagen” which along with Vyo-Serum helps revitalize the skin.</p>
                        </div>
                        <div class="blog__details__quote">
                            <i class="fa fa-quote-left"></i>
                            <p>“When designing an advertisement for a particular product many things should be
                                researched like where it should be displayed.”</p>
                            <h6>_ John Smith _</h6>
                        </div>
                        <div class="blog__details__text">
                            <p>Vyo-Serum along with tightening the skin also reduces the fine lines indicating aging of
                                skin. Problems like dark circles, puffiness, and crow’s feet can be control from the
                                strong effects of this serum.</p>
                            <p>Hydroderm is a multi-functional product that helps in reducing the cellulite and giving
                                the body a toned shape, also helps in cleansing the skin from the root and not letting
                                the pores clog, nevertheless also let’s sweeps out the wrinkles and all signs of aging
                                from the sensitive near the eyes.</p>
                        </div>
                  
                        
                        <div class="blog__details__comment">
                       
                          
                                <div class="row">
                                   
                                    <div class="col-lg-12 text-center">
                                      
                                    
                                    <form method="POST" action="{{ route('paynow') }}">
                                                                        @csrf

                                                                        <input type="hidden" name="product_id"
                                                                            value="{{ $product->id }}">

                                                                        <button type="submit" class="btn btn-primary">
                                                                            Pay Now
                                                                        </button>

                                                                    </form>
                                    </div>
                                </div>
                     
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="#"><img src="img/footer-logo.png" alt=""></a>
                        </div>
                        <p>The customer is at the heart of our unique business model, which includes design.</p>
                        <a href="#"><img src="img/payment.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                            <li><a href="#">Clothing Store</a></li>
                            <li><a href="#">Trending Shoes</a></li>
                            <li><a href="#">Accessories</a></li>
                            <li><a href="#">Sale</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Payment Methods</a></li>
                            <li><a href="#">Delivary</a></li>
                            <li><a href="#">Return & Exchanges</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6>NewLetter</h6>
                        <div class="footer__newslatter">
                            <p>Be the first to know about new arrivals, look books, sales & promos!</p>
                            <form action="#">
                                <input type="text" placeholder="Your email">
                                <button type="submit"><span class="icon_mail_alt"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer__copyright__text">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <p>Copyright ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>2020
                            All rights reserved | This template is made with <i class="fa fa-heart-o"
                                aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        </p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('js/mixitup.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>