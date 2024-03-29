<section class="features section-padding-100-70 ">

        <div class="container">
            <div class="section-heading text-center">
                <!-- Dream Dots -->
                <div class="dream-dots justify-content-center fadeInUp" data-wow-delay="0.2s">
                     <span>Dicover Items</span>
                </div>
                <h2 class="fadeInUp" data-wow-delay="0.3s">Listed Items</h2>
                <p class="fadeInUp" data-wow-delay="0.4s">いろんなアイテムを見てみましょう！<br> 気になったアイテムにはMake a Bid!</p>
            </div>
            <!-- <div class="dream-projects-menu mb-50">
                <div class="text-center portfolio-menu">
                    <button class="btn active" data-filter="*">All</button>
                    <button class="btn" data-filter=".onsale">On Sale</button>
                    <button class="btn" data-filter=".sold">Sold</button>
                    <button class="btn" data-filter=".unsold">Unsold</button>
                    <button class="btn" data-filter=".development">On Auction</button>
                </div>
            </div> -->
            <div class="row align-items-center">
                @foreach($items as $item)
                @if($item->status == 1)
                <div class="col-lg-3 col-sm-6 col-xs-12 onsale">
                    <div class="pricing-item ">
                        <div class="wraper">
                            <div class="pricing-img-wrapper">
                            <a href="{{ url('/item/'.$item->id) }}"><img src="/items/{{$item->img_1}}" alt="" class="pricing-img"></a>
                            </div>
                            <div class="owner-info">
                                @if($item->user->prof_img)
                                <img src="/users/{{$item->user->prof_img}}" alt="" class="prof_img" style="width:40px; height:40px;">
                                @else
                                <img src="{{ asset('img/authors/2.png') }}" alt="" class="prof_img" style="width:40px; height:40px;">
                                @endif
                                <a href="{{ url('/user/'.$item->user_id) }}"><h3>{{$item->user->name}}</h3></a>
                            </div>
                            <div>
                                <a href="{{ url('/item/'.$item->id) }}"><h4>{{$item->item_name}}</h4></a>
                            </div>
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
                                <div class="adm"><i class="fa fa-heart-o"></i>{{$item->bid->count()}} Bids</div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                @elseif($item->status == 6)
                <div class="col-lg-3 col-sm-6 col-xs-12 sold">
                
                    <div class="pricing-item ">
                        <div class="wraper">
                            <div class="pricing-img-wrapper">
                            <a href="{{ url('/item/'.$item->id) }}"><img src="/items/{{$item->img_1}}" alt="" class="pricing-img"></a>
                            </div>
                            <div class="owner-info">
                                @if($item->user->prof_img)
                                <img src="/users/{{$item->user->prof_img}}" alt="" class="prof_img" style="width:40px; height:40px;">
                                @else
                                <img src="{{ asset('img/authors/2.png') }}" alt="" class="prof_img" style="width:40px; height:40px;">
                                @endif
                                <a href="{{ url('/user/'.$item->user_id) }}"><h3>{{$item->user->name}}</h3></a>
                            </div>
                                <div>
                                    <a href="{{ url('/item/'.$item->id) }}"><h4>{{$item->item_name}}</h4></a>
                                </div>
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
                                <div class="adm"><i class="fa fa-heart-o"></i>{{$item->bid->count()}} Bids</div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                @else
                <div class="col-lg-3 col-sm-6 col-xs-12 unsold">
                    <div class="pricing-item ">
                        <div class="wraper">
                            <div class="pricing-img-wrapper">
                            <a href="{{ url('/item/'.$item->id) }}"><img src="/items/{{$item->img_1}}" alt="" class="pricing-img"></a>
                            </div>
                            <div class="owner-info">
                                @if($item->user->prof_img)
                                <img src="/users/{{$item->user->prof_img}}" alt="" class="prof_img" style="width:40px; height:40px;">
                                @else
                                <img src="{{ asset('img/authors/2.png') }}" alt="" class="prof_img" style="width:40px; height:40px;">
                                @endif
                                <a href="{{ url('/user/'.$item->user_id) }}"><h3>{{$item->user->name}}</h3></a>
                            </div>
                                <div>
                                    <a href="{{ url('/item/'.$item->id) }}"><h4>{{$item->item_name}}</h4></a>
                                </div>
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
                                <div class="adm"><i class="fa fa-heart-o"></i>{{$item->bid->count()}} Bids</div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>

            <!-- <div class="row align-items-center">

                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="pricing-item ">
                        <div class="wraper">
                            <a href="{{ url('/item-details') }}"><img src="{{ asset('img/art-work/1.png') }}" alt=""></a>
                            
                            <div class="owner-info">
                                <img src="{{ asset('img/authors/2.png') }}" width="40" alt="">
                                <a href="{{ url('/profile') }}"><h3>@Smith Wright</h3></a>
                            </div>
                            <a href="{{ url('/item-details') }}"><h4>Scarecrow in daylight</h4></a>
                            
                            <div class="admire">
                                <div class="adm"><i class="fa fa-clock-o"></i>あと6時間</div>
                                <div class="adm"><i class="fa fa-heart-o"></i>25 Bids </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="pricing-item ">
                        <div class="wraper">
                            <a href="{{ url('/item-details') }}"><img src="{{ asset('img/art-work/2.png') }}" alt=""></a>
                            
                            <div class="owner-info">
                                <img src="{{ asset('img/authors/3.png') }}" width="40" alt="">
                                <a href="{{ url('/profile') }}"><h3>@Smith Wright</h3></a>
                            </div>
                            <a href="{{ url('/item-details') }}"><h4>Darklight Angel 01</h4></a>

                            <div class="admire">
                                <div class="adm"><i class="fa fa-clock-o"></i>あと6時間</div>
                                <div class="adm"><i class="fa fa-heart-o"></i>25 Bids </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="pricing-item ">
                        <div class="wraper">
                            <a href="{{ url('/item-details') }}"><img src="{{ asset('img/art-work/3.png') }}" alt=""></a>
                            
                            <div class="owner-info">
                                <img src="{{ asset('img/authors/8.png') }}" width="40" alt="">
                                <a href="{{ url('/profile') }}"><h3>@Smith Wright</h3></a>
                            </div>
                            <a href="{{ url('/item-details') }}"><h4>Becoming one with Nature</h4></a>
                            
                            <div class="admire">
                                <div class="adm"><i class="fa fa-clock-o"></i>あと6時間</div>
                                <div class="adm"><i class="fa fa-heart-o"></i>25 Bids </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="pricing-item ">
                        <div class="wraper">
                            <a href="{{ url('/item-details') }}"><img src="{{ asset('img/art-work/4.png') }}" alt="" ></a>
                            
                            <div class="owner-info">
                                <img src="{{ asset('img/authors/6.png') }}" width="40" alt="">
                                <a href="{{ url('/profile') }}"><h3>@Smith Wright</h3></a>
                            </div>
                            <a href="{{ url('/item-details') }}"><h4>Twilight Fracture City</h4></a>

                            <div class="admire">
                                <div class="adm"><i class="fa fa-clock-o"></i>あと6時間</div>
                                <div class="adm"><i class="fa fa-heart-o"></i>25 Bids </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="pricing-item ">
                        <div class="wraper">
                        <div class="pricing-img-wrapper">
                            <a href="{{ url('/item-details') }}"><img src="{{ asset('img/art-work/5.png') }}" alt="" class="pricing-img"></a>
                        </div>
                            <div class="owner-info">
                                <img src="{{ asset('img/authors/2.png') }}" width="40" alt="">
                                <a href="{{ url('/discover') }}"><h3>@Smith Wright</h3></a>
                            </div>
                            <a href="{{ url('/item-details') }}"><h4>Resonate Sanctuary II</h4></a>

                            <div class="admire">
                                <div class="adm"><i class="fa fa-clock-o"></i>あと6時間</div>
                                <div class="adm"><i class="fa fa-heart-o"></i>25 Bids </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="pricing-item ">
                        <div class="wraper">
                        <div class="pricing-img-wrapper">
                            <a href="{{ url('/item-details') }}"><img src="{{ asset('img/art-work/6.png') }}" alt="" class="pricing-img"></a>
                            </div>
                            <div class="owner-info">
                                <img src="{{ asset('img/authors/3.png') }}" width="40" alt="">
                                <a href="{{ url('/discover') }}"><h3>@Smith Wright</h3></a>
                            </div>
                            <a href="{{ url('/item-details') }}"><h4>Analogue refraction #3</h4></a>
                            
                            <div class="admire">
                                <div class="adm"><i class="fa fa-clock-o"></i>あと6時間</div>
                                <div class="adm"><i class="fa fa-heart-o"></i>25 Bids </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="pricing-item ">
                        <div class="wraper">
                        <div class="pricing-img-wrapper">
                            <a href="{{ url('/item-details') }}"><img src="{{ asset('img/art-work/7.png') }}" alt="" class="pricing-img"></a>
                            </div>
                            <div class="owner-info">
                                <img src="{{ asset('img/authors/8.png') }}" width="40" alt="">
                                <a href="{{ url('/discover') }}"><h3>@Smith Wright</h3></a>
                            </div>
                            <a href="{{ url('/item-details') }}"><h4>Super-Neumorphism #7</h4></a>
                            
                            <div class="admire">
                                <div class="adm"><i class="fa fa-clock-o"></i>あと6時間</div>
                                <div class="adm"><i class="fa fa-heart-o"></i>25 Bids </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="pricing-item ">
                        <div class="wraper">
                        <div class="pricing-img-wrapper">
                            <a href="{{ url('/item-details') }}"><img src="{{ asset('img/art-work/8.png') }}" alt="" class="pricing-img"></a>
                            </div>
                            <div class="owner-info">
                                <img src="{{ asset('img/authors/6.png') }}" width="40" alt="">
                                <a href="{{ url('/discover') }}"><h3>@Smith Wright</h3></a>
                            </div>
                            <a href="{{ url('/item-details') }}"><h4>Exe Dream Sequence </h4></a>
                            
                            <div class="admire">
                                <div class="adm"><i class="fa fa-clock-o"></i>あと6時間</div>
                                <div class="adm"><i class="fa fa-heart-o"></i>25 Bids </div>
                            </div>
                        </div>
                    </div>
                </div>            
                <div class="col-12 col-lg-12 text-center">
                            {{$items->onEachSide(2)->links()}}
                </div>
            </div> -->
            

        </div>
