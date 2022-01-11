<section class="blog-area section-padding-100">
        <div class="container">

            <div class="row">
                <div class="col-12 col-lg-3">
                    @if(Auth::check())
                   <div class="service_single_content collection-item">
                        <!-- Icon -->
                        <div class="collection_icon">
                            <img src="{{asset('img/art-work/profile-header.jpg')}}" class="center-block" alt="">
                        </div>
                        <span class="aut-info">
                            <img src="{{asset('img/authors/2.png')}}" width="50" alt="">
                        </span>
                        <div class="collection_info text-center">
                            <h6>{{Auth::user()->name}}</h6>
                            <p class="w-text mr-5p">Creative NFTs Designer <img src="{{asset('img/art-work/fire.png')}}" width="20" alt=""></p>
                            <p class="mt-15">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eos distinctio labore.</p>

                            <div class="search-widget-area mt-15">
                                <form action="#" method="post">
                                    <input type="text" name="wallet" id="wallet" value="Xjo03s-osi6732...">
                                    <button class="btn"><i class="fa fa-copy"></i></button>
                                </form>
                            </div>

                            <ul class="social-links mt-30 mb-30">
                              <li><a href="#"><span class="fa fa-facebook-f"></span></a></li>
                              <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                              <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                              <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
                              <li><a href="#"><span class="fa fa-instagram"></span></a></li>
                           </ul>
                            <a href="{{ url('/profile') }}" class="more-btn">Follow</a>
                        </div>

                    </div>
                    @else
                    <div class="service_single_content collection-item">
                        <div class="collection_icon">
                            <img src="{{asset('img/art-work/profile-header.jpg')}}" class="center-block" alt="">
                        </div>
                        <span class="aut-info">
                            <img src="{{asset('img/authors/2.png')}}" width="50" alt="">
                        </span>
                        <form action="{{ url('/login')}}" method="get" id="main_contact_form" novalidate style="margin:10px 0 10px 0">
                            <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.6s">
                                <button type="submit" class="more-btn">SignUp</button>
                            </div>
                        </form>
                    </div>
                    @endif
                </div>
                <div class="col-12 col-lg-8">
                    <div class="creator-sec dd-bg">
                        <div class="who-we-contant">
                            <div class="dream-dots text-left fadeInUp" data-wow-delay="0.2s">
                                <span class="gradient-text ">Bid</span>
                            </div>
                            <h4 class="fadeInUp" data-wow-delay="0.3s">Edit your bid</h4>
                        </div>
                        <div class="contact_form">
                            <form action="{{ url('/purchase/update') }}" method="post" id="main_contact_form" novalidate enctype='multipart/form-data'>
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="group">
                                            <textarea name="message" id="Description" required>{{$bid->message}}</textarea>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Message for the Creator: クリエイターに向けた応援メッセージを</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="group">
                                            <input type="number" name="max_price" id="Price" value="{{$bid->max_price}}" required>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Max price you can afford</label>
                                        </div>
                                    </div>
                                    
                                    <div class="collection_info text-center">
                                        <p class="w-text mr-5p">募集期間が終わり、当選しない限りは決済はされません。 <img src="{{asset('img/art-work/fire.png')}}" width="20" alt=""></p>
                                    </div>
                                    <input type="hidden" name="user_id" value="{{Auth::id()}}" />
                                    <input type="hidden" name="item_id" value="{{$bid->item_id}}" /> 
                                    <input type="hidden" name="id" value="{{$bid->id}}" /> 
                                    <div class="col-12 text-center">
                                        <button type="submit" class="more-btn mb-15">Edit Your Bid!</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

