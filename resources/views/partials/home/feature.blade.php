<section class="features section-padding-0-100 ">

        <div class="container">
            <div class="section-heading text-center">
                <!-- Dream Dots -->
                <div class="dream-dots justify-content-center fadeInUp" data-wow-delay="0.2s">
                     <span>Dicover New Items</span>
                </div>
                <h2 class="fadeInUp" data-wow-delay="0.3s">New Listed Items</h2>
                <p class="fadeInUp" data-wow-delay="0.4s">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis accumsan nisi Ut ut felis congue nisl hendrerit commodo.</p>
            </div>

            <div class="row align-items-center">
                @foreach($items as $item)
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="pricing-item ">
                        <div class="wraper">
                            <a href="{{ url('/item/'.$item->id) }}"><img src="/items/{{$item->img_1}}" alt=""></a>
                            <a href="{{ url('/item/'.$item->id) }}"><h4>{{$item->item_name}}</h4></a>
                            <div class="owner-info">
                                <img src="{{ asset('img/authors/2.png') }}" width="40" alt="">
                                <a href="{{ url('/user/'.$item->user_id) }}"><h3>{{$item->user->name}}</h3></a>
                            </div>
                            <div><span class="g-text">{{$item->item_desc}}</span></div>
                    <!-- 残り時間計算 -->
                        <?php
                        $enddate = strtotime($item->endtime);
                        $startdate = strtotime('now');
                        $diff = $enddate - $startdate;

                        if (0 <= $diff && $diff < 60) {
                            $timeleft = 'あと1分以内に終了';
                        } elseif (61 <= $diff && $diff < 3600) {
                            $timeleft = 'あと' . round($diff / 60) . '分';
                        } elseif (3600 <= $diff && $diff < 24*3600) {
                            $timeleft = 'あと' . round($diff / 3600) . '時間';
                        } elseif (24*3600 <= $diff && $diff < 24*3600*7) {
                            $timeleft= 'あと' . round($diff / (3600*24)) . '日';
                        } elseif ($diff < 0) {
                            $timeleft = '終了！';
                        } else {
                            $timeleft = "あと1週間以上";
                        };
                        
                        ?> 

                            <div class="admire">
                                <div class="adm"><i class="fa fa-clock-o"></i>{{$timeleft}}</div>
                                <div class="adm"><i class="fa fa-heart-o"></i>{{$item->bid->count()}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="row align-items-center">

                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="pricing-item ">
                        <div class="wraper">
                            <a href="{{ url('/item-details') }}"><img src="{{ asset('img/art-work/1.png') }}" alt=""></a>
                            <a href="{{ url('/item-details') }}"><h4>Scarecrow in daylight</h4></a>
                            <div class="owner-info">
                                <img src="{{ asset('img/authors/2.png') }}" width="40" alt="">
                                <a href="{{ url('/profile') }}"><h3>@Smith Wright</h3></a>
                            </div>
                            <span><span class="g-text">Price</span> 0.081 ETH <span class="g-text ml-15">1 of 10</span></span>
                            <div class="pricing">Highest Bid : <span class="ml-15">0.081 ETH</span> </div>
                            <div class="admire">
                                <div class="adm"><i class="fa fa-clock-o"></i>6 Hours Ago</div>
                                <div class="adm"><i class="fa fa-heart-o"></i>134 Like</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="pricing-item ">
                        <div class="wraper">
                            <a href="{{ url('/item-details') }}"><img src="{{ asset('img/art-work/2.png') }}" alt=""></a>
                            <a href="{{ url('/item-details') }}"><h4>Darklight Angel 01</h4></a>
                            <div class="owner-info">
                                <img src="{{ asset('img/authors/3.png') }}" width="40" alt="">
                                <a href="{{ url('/profile') }}"><h3>@Smith Wright</h3></a>
                            </div>
                            <span><span class="g-text">Price</span> 0.081 ETH <span class="g-text ml-15">1 of 10</span></span>
                            <div class="pricing">Highest Bid : <span class="ml-15">0.081 ETH</span> </div>
                            <div class="admire">
                                <div class="adm"><i class="fa fa-clock-o"></i>6 Hours Ago</div>
                                <div class="adm"><i class="fa fa-heart-o"></i>134 Like</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="pricing-item ">
                        <div class="wraper">
                            <a href="{{ url('/item-details') }}"><img src="{{ asset('img/art-work/3.png') }}" alt=""></a>
                            <a href="{{ url('/item-details') }}"><h4>Becoming one with Nature</h4></a>
                            <div class="owner-info">
                                <img src="{{ asset('img/authors/8.png') }}" width="40" alt="">
                                <a href="{{ url('/profile') }}"><h3>@Smith Wright</h3></a>
                            </div>
                            <span><span class="g-text">Price</span> 0.081 ETH <span class="g-text ml-15">1 of 10</span></span>
                            <div class="pricing">Highest Bid : <span class="ml-15">0.081 ETH</span> </div>
                            <div class="admire">
                                <div class="adm"><i class="fa fa-clock-o"></i>6 Hours Ago</div>
                                <div class="adm"><i class="fa fa-heart-o"></i>134 Like</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="pricing-item ">
                        <div class="wraper">
                            <a href="{{ url('/item-details') }}"><img src="{{ asset('img/art-work/4.png') }}" alt=""></a>
                            <a href="{{ url('/item-details') }}"><h4>Twilight Fracture City</h4></a>
                            <div class="owner-info">
                                <img src="{{ asset('img/authors/6.png') }}" width="40" alt="">
                                <a href="{{ url('/profile') }}"><h3>@Smith Wright</h3></a>
                            </div>
                            <span><span class="g-text">Price</span> 0.081 ETH <span class="g-text ml-15">1 of 10</span></span>
                            <div class="pricing">Highest Bid : <span class="ml-15">0.081 ETH</span> </div>
                            <div class="admire">
                                <div class="adm"><i class="fa fa-clock-o"></i>6 Hours Ago</div>
                                <div class="adm"><i class="fa fa-heart-o"></i>134 Like</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="pricing-item ">
                        <div class="wraper">
                            <a href="{{ url('/item-details') }}"><img src="{{ asset('img/art-work/5.png') }}" alt=""></a>
                            <a href="{{ url('/item-details') }}"><h4>Resonate Sanctuary II</h4></a>
                            <div class="owner-info">
                                <img src="{{ asset('img/authors/2.png') }}" width="40" alt="">
                                <a href="{{ url('/profile') }}"><h3>@Smith Wright</h3></a>
                            </div>
                            <span><span class="g-text">Price</span> 0.081 ETH <span class="g-text ml-15">1 of 10</span></span>
                            <div class="pricing">Highest Bid : <span class="ml-15">0.081 ETH</span> </div>
                            <div class="admire">
                                <div class="adm"><i class="fa fa-clock-o"></i>6 Hours Ago</div>
                                <div class="adm"><i class="fa fa-heart-o"></i>134 Like</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="pricing-item ">
                        <div class="wraper">
                            <a href="{{ url('/item-details') }}"><img src="{{ asset('img/art-work/6.png') }}" alt=""></a>
                            <a href="{{ url('/item-details') }}"><h4>Analogue refraction #3</h4></a>
                            <div class="owner-info">
                                <img src="{{ asset('img/authors/3.png') }}" width="40" alt="">
                                <a href="{{ url('/profile') }}"><h3>@Smith Wright</h3></a>
                            </div>
                            <span><span class="g-text">Price</span> 0.081 ETH <span class="g-text ml-15">1 of 10</span></span>
                            <div class="pricing">Highest Bid : <span class="ml-15">0.081 ETH</span> </div>
                            <div class="admire">
                                <div class="adm"><i class="fa fa-clock-o"></i>6 Hours Ago</div>
                                <div class="adm"><i class="fa fa-heart-o"></i>134 Like</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="pricing-item ">
                        <div class="wraper">
                            <a href="{{ url('/item-details') }}"><img src="{{ asset('img/art-work/7.png') }}" alt=""></a>
                            <a href="{{ url('/item-details') }}"><h4>Super-Neumorphism #7</h4></a>
                            <div class="owner-info">
                                <img src="{{ asset('img/authors/8.png') }}" width="40" alt="">
                                <a href="{{ url('/profile') }}"><h3>@Smith Wright</h3></a>
                            </div>
                            <span><span class="g-text">Price</span> 0.081 ETH <span class="g-text ml-15">1 of 10</span></span>
                            <div class="pricing">Highest Bid : <span class="ml-15">0.081 ETH</span> </div>
                            <div class="admire">
                                <div class="adm"><i class="fa fa-clock-o"></i>6 Hours Ago</div>
                                <div class="adm"><i class="fa fa-heart-o"></i>134 Like</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="pricing-item ">
                        <div class="wraper">
                            <a href="{{ url('/item-details') }}"><img src="{{ asset('img/art-work/8.png') }}" alt=""></a>
                            <a href="{{ url('/item-details') }}"><h4>Exe Dream Sequence </h4></a>
                            <div class="owner-info">
                                <img src="{{ asset('img/authors/6.png') }}" width="40" alt="">
                                <a href="{{ url('/profile') }}"><h3>@Smith Wright</h3></a>
                            </div>
                            <span><span class="g-text">Price</span> 0.081 ETH <span class="g-text ml-15">1 of 10</span></span>
                            <div class="pricing">Highest Bid : <span class="ml-15">0.081 ETH</span> </div>
                            <div class="admire">
                                <div class="adm"><i class="fa fa-clock-o"></i>6 Hours Ago</div>
                                <div class="adm"><i class="fa fa-heart-o"></i>134 Like</div>
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
