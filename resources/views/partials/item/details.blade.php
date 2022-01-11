<section class="section-padding-100">
    <div class="container">

        <div class="row">
            <div class="col-12 col-lg-5">
                <div class="detailed-img">
                    <img src="/items/{{$item->img_1}}" alt="">
                </div>
            </div>

            <div class="col-12 col-lg-4 mt-s">
                <div class="sidebar-area">
                    <div class="donnot-miss-widget">
                        <div class="who-we-contant">
                            <div class="filers-list">
                                <a href="{{ url('/discover') }}" class="filter-item">
                                    <img src="{{asset('public/img/icons/f1.png')}}" alt="">{{$item->user->name}}
                                </a>
                            </div>
                            <h4 class="fadeInUp" data-wow-delay="0.3s">{{$item->item_name}}</h4>
                        </div>
                        <div class="mb-15 gray-text"><span class="w-text mr-15">Current Bids: </span><span class="gray-text mr-15">{{$bid_count}} </span></div>
                        <div class="details-list">
                            <p>Created : <span>{{$item->published}}</span></p>
                            <p>End Time : <span>{{$item->endtime}}</span></p>
                            
                        </div>
                        <div class="highest-bid">
                            <h5 class="w-text mb-15">Item Description</h5>
                            <div class="admire w-text">    
                                {{$item->item_desc}}
                            </div>
                        </div>

                        <div class="author-item mb-30"> 
                            <!-- 画像変える -->
                            <div class="author-img ml-0"><img src="/users/{{$item->user->prof_img}}" width="70" alt=""></div>
                            <div class="author-info">
                                <a href="{{ url('/profile') }}"><h5 class="author-name">{{$item->user->name}}</h5></a>
                                <p class="author-earn mb-0">Owner</p>
                            </div>
                        </div>
                        <div class="highest-bid">
                            <h5 class="w-text mb-15">Who I am</h5>
                            <div class="admire w-text">    
                                {{$item->user->user_desc}}
                            </div>
                        </div>
                        @if(Auth::id() == $item->user_id)
                            @if($item->status == 1)
                            <a href="{{ url('/itemedit/'.$item->id) }}" class="open-popup-link more-btn width-100 mt-30">Edit</a>
                            @elseif($item->status == 6)
                            <a href="{{ url('/transaction/'.$item->purchaser->id) }}" class="open-popup-link more-btn width-100 mt-30">取引画面へ</a>
                            @else
                            <a href="{{ url('/discover') }}" class="open-popup-link more-btn width-100 mt-30">出品期間は終了しました</a>
                            @endif
                        @else
                            @if($item->status == 1)
                                @if(isset($your_bid))
                                <a href="{{ url('/purchaseedit/'.$your_bid->id) }}" class="open-popup-link more-btn width-100 mt-30">Edit Your Bid</a>    
                                @else
                                <a href="{{ url('/purchase/'.$item->id) }}" class="open-popup-link more-btn width-100 mt-30">Place Bid</a>
                                @endif
                            @else
                            <a href="{{ url('/discover') }}" class="open-popup-link more-btn width-100 mt-30">出品期間は終了しました (他の商品を探す)</a>
                            @endif
                        @endif
                        
                        
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3 mt-s">
                <h4 class="mb-15">Latest Bids</h4>
                <div class="highest-bid bid-item">
                @foreach($bids as $bid)
                    <div class="author-item">
                        <div class="author-img ml-0"><img src="/users/{{$bid->user->prof_img}}" width="40" alt=""></div>
                        
                        <div class="author-info">
                            <p>by :<span class="w-text">{{$bid->user->name}}</span></p>
                            <p>Bid at: <span class="w-text">{{$bid->bid_time}}</span></p>
                        </div>
                    </div>
                @endforeach
                    <!-- <div class="author-item">
                        <div class="author-img ml-0"><img src="img/authors/3.png" width="40" alt=""></div>
                        <div class="author-info">
                            <p>by<span class="w-text"> Johan Donem</span></p>
                            <p>Bid at<span class="w-text"> 0.321 ETH</span></p>
                        </div>
                        <div class="bid-price">
                            <p>$346.38</p>
                            <p><i class="fa fa-clock-o mr-5p"></i>11:39 AM</p>
                        </div>
                    </div>
                    <div class="author-item">
                        <div class="author-img ml-0"><img src="img/authors/4.png" width="40" alt=""></div>
                        <div class="author-info">
                            <p>by<span class="w-text"> Morgan Wright</span></p>
                            <p>Bid at<span class="w-text"> 0.215 ETH</span></p>
                        </div>
                        <div class="bid-price">
                            <p>$346.38</p>
                            <p><i class="fa fa-clock-o mr-5p"></i>11:34 AM</p>
                        </div>
                    </div>
                    <div class="author-item mb-0">
                        <div class="author-img ml-0"><img src="img/authors/5.png" width="40" alt=""></div>
                        <div class="author-info">
                            <p>by<span class="w-text"> Amillia Nnor</span></p>
                            <p>Bid at<span class="w-text"> 0.118 ETH</span></p>
                        </div>
                        <div class="bid-price">
                            <p>$346.38</p>
                            <p><i class="fa fa-clock-o mr-5p"></i>10:55 AM</p>
                        </div>
                    </div> -->
                </div>
                <h4 class="mb-15 mt-30">Your Bid</h4>
    
                <div class="highest-bid bid-item">
                    @if($your_bid)
                    <div class="author-item mb-0">
                        <div class="author-img ml-0"><img src="img/authors/1.png" width="40" alt=""></div>
                        <div class="author-info">
                            <p>Bid at: <span><i class="fa fa-clock-o mr-5p"></i></span><span class="w-text"> {{$your_bid -> bid_time}}</span></p>
                            <p>Price:<span class="w-text mr-15"> {{$your_bid->max_price}} </span><span><i class="fa fa-clock-o mr-5p"></i>01:36 AM</span></p>
                        </div>
                    </div>
                    @else
                    <div class="author-item mb-0">
                        <div class="author-img ml-0"><img src="img/authors/1.png" width="40" alt=""></div>
                        <div class="author-info">
                            <p>まだ入札はありません</p>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="biding-end">
                    <h4 class="mb-15">Biding Ends In :</h4>
                    <!-- Countdown  -->
                    <div class="count-down titled circled text-center">
                        <div class="simple_timer"></div>
                        <?php
                        $date = array(
                            "year" => date('Y',strtotime($item->endtime)),
                            "month" => date('m',strtotime($item->endtime)),
                            "day" => date('d',strtotime($item->endtime)),
                            "hour" => date('h',strtotime($item->endtime)),
                            "min" => date('i',strtotime($item->endtime))
                        );
                        $date_json = json_encode($date);
                        ?>
                        
                        <script>
                            var d = JSON.parse('<?php echo $date_json; ?>');
                            $('.simple_timer').syotimer({
                                date:new Date(d.year, d.month, d.day, d.hour, d.min)
                            });
                        </script>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
