<section class="features section-padding-100 ">

        <div class="container">
            <div class="section-heading text-center">
                <!-- Dream Dots -->
                <div class="dream-dots justify-content-center fadeInUp" data-wow-delay="0.2s">
                     <span>Live auctions</span>
                </div>
                <h2 class="fadeInUp" data-wow-delay="0.3s">Biding Time!! <img src="img/art-work/fire.png" width="20" alt=""></h2>
                <p class="fadeInUp" data-wow-delay="0.4s">残り時間はあとわずか。アイテムやクリエイターについて確認しましょう！</p>
            </div>



            <div class="row align-items-center">
                @foreach($onsales as $onsale)
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="pricing-item ">
                        <div class="wraper">
                            <a href="{{ url('/item/'.$onsale->id) }}"><img src="items/{{$onsale->img_1}}" alt=""></a>
                            <a href="{{ url('/item/'.$onsale->id) }}"><h4>{{$onsale->item_name}}</h4></a>
                            <div class="owner-info">
                                <img src="users/{{onsale->user->prof_img}}" width="40" alt="">
                                <a href="{{ url('/user/'$onsale->user->id) }}"><h3>@{{$onsale->user->name}}</h3></a>
                            </div>
                            <span><span class="g-text"><i class="fa fa-heart-o">Bids:</span> {{$onsale->bid->count()}} </span>
                            <!-- Countdown  -->
                            <div class="count-down titled circled text-center">
                                <div class="time-container">
                                <div class="count-box">
                                    <p class="time"><span id="day"></span></p>
                                    <p class="meter">days</p>
                                </div>
                                <div class="count-box">
                                    <p class="time"><span id="hour"></span></p>
                                    <p  class="meter">hours</p>
                                </div>
                                <div class="count-box">
                                    <p class="time"><span id="min"></span></p>
                                    <p class="meter">mins</p>
                                </div>
                                <div class="count-box">
                                    <p class="time"><span id="sec"></span></p>
                                    <p class="meter">sec</p>
                                </div>
                            </div>
                            </div>

                            <div class="admire">
                                <a class="btn more-btn width-100" href="#">Place Bid</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="pricing-item ">
                        <div class="wraper">
                            <a href="{{ url('/item-details') }}"><img src="img/art-work/1.png" alt=""></a>
                            <a href="{{ url('/item-details') }}"><h4>After Snow: Attraction</h4></a>
                            <div class="owner-info">
                                <img src="img/authors/3.png" width="40" alt="">
                                <a href="{{ url('/profile') }}"><h3>@Johan Done</h3></a>
                            </div>
                            <span><span class="g-text">Price</span> 0.081 ETH <span class="g-text ml-15">1 of 10</span></span>
                            <!-- Countdown  -->
                            <div class="count-down titled circled text-center">
                                <div class="simple_timer"></div>
                            </div>

                            <div class="admire">
                               <a class="btn more-btn width-100" href="#">Place Bid</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="pricing-item ">
                        <div class="wraper">
                            <a href="{{ url('/item-details') }}"><img src="img/art-work/11.png" alt=""></a>
                            <a href="{{ url('/item-details') }}"><h4>Mortimer Crypto Mystic</h4></a>
                            <div class="owner-info">
                                <img src="img/authors/8.png" width="40" alt="">
                                <a href="{{ url('/profile') }}"><h3>@LarySmith-3</h3></a>
                            </div>
                            <span><span class="g-text">Price</span> 0.081 ETH <span class="g-text ml-15">1 of 10</span></span>
                            <!-- Countdown  -->
                            <div class="count-down titled circled text-center">
                                <div class="simple_timer"></div>
                            </div>

                            <div class="admire">
                                <a class="btn more-btn width-100" href="#">Place Bid</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="pricing-item ">
                        <div class="wraper">
                            <a href="{{ url('/item-details') }}"><img src="img/art-work/2.png" alt=""></a>
                            <a href="{{ url('/item-details') }}"><h4>People are the pillars</h4></a>
                            <div class="owner-info">
                                <img src="img/authors/6.png" width="40" alt="">
                                <a href="{{ url('/profile') }}"><h3>@SmithWright</h3></a>
                            </div>
                            <span><span class="g-text">Price</span> 0.081 ETH <span class="g-text ml-15">1 of 10</span></span>
                            <!-- Countdown  -->
                            <div class="count-down titled circled text-center">
                                <div class="simple_timer"></div>
                            </div>

                            <div class="admire">
                                <a class="btn more-btn width-100" href="#">Place Bid</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-12 text-center">
                    <a class="btn more-btn fadeInUp" data-wow-delay="0.6s" href="{{ url('/discover') }}">Load More</a>
                </div>
            </div>
        </div>
    </section>
