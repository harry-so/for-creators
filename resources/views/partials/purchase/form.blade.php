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
                            @if(Auth::user()->prof_img)
                            <img src="/users/{{Auth::user()->prof_img}}" >
                            @else
                            <img src="{{ asset('img/authors/2.png') }}" >
                            @endif
                        </span>
                        <div class="collection_info text-center">
                            <h6>{{Auth::user()->name}}</h6>
                            <p class="w-text mr-5p">{{Auth::user()->title}}<img src="{{asset('img/art-work/fire.png')}}" width="20" alt=""></p>
                            <p class="mt-15">{{Auth::user()->user_desc}}</p>

                            <ul class="social-links mt-15">
                              <li><a href="{{Auth::user()->website}}"><span class="fa fa-laptop"></span></a></li>
                              <li><a href="{{Auth::user()->twitter}}"><span class="fa fa-twitter"></span></a></li>
                              <li><a href="{{Auth::user()->instagram}}"><span class="fa fa-instagram"></span></a></li>
                            </ul>
                            <a href="{{ url('/useredit/'.Auth::user()->id) }}" class="more-btn mt-15">Edit</a>
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
                            <h4 class="fadeInUp" data-wow-delay="0.3s">Apply for purchase</h4>
                        </div>
                        <div class="contact_form">
                            <form action="{{ url('/purchase/confirm') }}" method="post" id="main_contact_form" novalidate enctype='multipart/form-data'>
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="group">
                                            <textarea name="message" id="Description" required></textarea>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Message for the Creator: クリエイターに向けた応援メッセージを</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="group">
                                            <input type="number" name="max_price" id="Price" required>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Max price you can afford</label>
                                        </div>
                                    </div>
                                    
                                    <div class="collection_info text-center">
                                        <p class="w-text mr-5p">クレジットカードの登録をお願いしますが、募集期間が終わり、当選しない限りは決済はされません。 <img src="{{asset('img/art-work/fire.png')}}" width="20" alt=""></p>
                                    </div>
                                    <input type="hidden" name="user_id" value="{{Auth::id()}}" />
                                    <input type="hidden" name="item_id" value="{{$item->id}}" /> 
                                    <div class="col-12 text-center">
                                        <button type="submit" class="more-btn mb-15">Bid!</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

