<section class="section-padding-100">
    <div class="container">

        <div class="row">
            <div class="col-12 col-lg-5">
                <div class="detailed-img text-center">
                    <img src="/items/{{$item->img_1}}" alt="">
                </div>
            </div>

            <div class="col-12 col-lg-4 mt-s">
                <div class="sidebar-area">
                    <div class="donnot-miss-widget">
                        <div class="who-we-contant">
                            <h4 class="fadeInUp" data-wow-delay="0.3s" style="margin-top:20px">{{$item->item_name}}</h4>
                        </div>
                        @if($item->status == 6)
                        <span class="tag">{{number_format($purchase->final_price)}} yen</span>
                        <div class="mb-15 gray-text"><a href="{{ url('/user/'.$purchase->purchaser_id) }}"><span class="w-text mr-15">Supporter: </span><span class="gray-text mr-15">{{$purchase->user->name}}</span></a></div>
                        @else
                        <div class="mb-15 gray-text"><span class="w-text mr-15">Current Bids: </span><span class="gray-text mr-15">{{$bid_count}} Bids</span></div>
                        @endif
                        <div class="details-list">
                            <p>Created : <span>{{$item->published}}</span></p>
                            <p>End Time : <span>{{$item->endtime}}</span></p>
                            
                        </div>
                        <div class="highest-bid">
                            <h5 class="w-text mb-15">Item Description</h5>
                            <div class="w-text">    
                                {{$item->item_desc}}
                            </div>
                        </div>

                        <div class="author-item mb-30"> 
                            <!-- 画像変える -->
                        
                            <div class="author-img ml-0">
                                @if($item->user->prof_img)
                                <img src="/users/{{$item->user->prof_img}}" class="prof_img" style="width:70px; height:70px;" alt="">
                                @else
                                <img src="{{ asset('img/authors/2.png') }}" class="prof_img" style="width:70px; height:70px;" alt="">
                                @endif
                            </div>
                            <div class="author-info">
                                <a href="{{ url('/user/'.$item->user->id) }}"><h5 class="author-name">{{$item->user->name}}</h5></a>
                                <p class="author-earn mb-0">Owner</p>
                            </div>
                        </div>
                        <div class="highest-bid">
                            <h5 class="w-text mb-15">Who I am</h5>
                            <div class="w-text">    
                                {{$item->user->user_desc}}
                            </div>
                        </div>
                        @if(Auth::id() == $item->user_id)
                        <!-- 出品者のパターン -->
                            @if($item->status == 1)
                            <a href="{{ url('/itemedit/'.$item->id) }}" class="open-popup-link more-btn width-100 mt-30">Edit</a>
                            @elseif($item->status == 6)
                            <a href="{{ url('/transaction/'.$item->purchaser->id) }}" class="open-popup-link more-btn width-100 mt-30">取引画面へ</a>
                            @else
                            <a href="{{ url('/discover') }}" class="open-popup-link more-btn width-100 mt-30">出品期間は終了しました</a>
                            @endif
                        @else
                        <!-- 出品者ではないパターン -->
                            @if($purchase) 
                            <!-- 募集期間後で購入者がいる場合の商品 -->
                                @if(Auth::id() == $purchase->purchaser_id)
                                <!-- その人が購入者のパターン -->
                                <a href="{{ url('/transaction/'.$item->purchaser->id) }}" class="open-popup-link more-btn width-100 mt-30">取引画面へ</a>
                                @else
                                <!-- それ以外 -->
                                <a href="{{ url('/discover') }}" class="open-popup-link more-btn width-100 mt-30">出品期間は終了しました (他の商品を探す)</a>
                                @endif
                            @elseif($item->status == 1)
                            <!-- 募集中 -->
                                @if(isset($your_bid))
                                <a href="{{ url('/purchaseedit/'.$your_bid->id) }}" class="open-popup-link more-btn width-100 mt-30">Edit Your Bid</a>    
                                @else
                                <a href="{{ url('/purchase/'.$item->id) }}" class="open-popup-link more-btn width-100 mt-30">Place Bid</a>
                                @endif
                            @else
                            <!-- 募集も終わり、取引も成立しなかった -->
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
                        <div class="author-img ml-0">
                        @if($bid->user->prof_img)
                            <img src="/users/{{$bid->user->prof_img}}" class="prof_img" style="width:40px; height:40px;" alt="">
                        @else
                            <img src="{{ asset('img/authors/2.png') }}" class="prof_img" style="width:40px; height:40px;" alt="">
                        @endif
                        </div>
                        
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
                            <p>Price:<span class="w-text mr-15"> {{number_format($your_bid->max_price)}}円 </span><span><i class="fa fa-clock-o mr-5p"></i>01:36 AM</span></p>
                        </div>
                    </div>
                    @else
                    <div class="author-item mb-0" style="margin-top:0;">
                        <div class="author-img ml-0"><img src="img/authors/1.png" width="40" alt=""></div>
                        <div class="author-info">
                            <p>まだ入札はありません</p>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="biding-end">
                    <h4 class="mb-15">Bidding Ends In :</h4>
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
                        
                        
                        <script>
                            const day = document.getElementById("day");
                            const hour = document.getElementById("hour");
                            const min = document.getElementById("min");
                            const sec = document.getElementById("sec");

                            function countdown(){
                                const now = new Date(); //現在時刻を取得
                                const endtime = Date.parse('<?php echo $item->endtime ?>');
                                const diff = endtime - now.getTime();
                                if (diff > 0) {
                                    const calcDay = Math.floor(diff / 1000 / 60 / 60 / 24 );
                                    const calcHour = Math.floor(diff / 1000 / 60 / 60 ) % 24;
                                    const calcMin = Math.floor(diff / 1000 / 60) % 60;
                                    const calcSec = Math.floor(diff / 1000) % 60;
                                    //取得した時間を表示（2桁表示）
                                    day.innerHTML = calcDay < 10 ? '0' + calcDay : calcDay;
                                    hour.innerHTML = calcHour < 10 ? '0' + calcHour : calcHour;
                                    min.innerHTML = calcMin < 10 ? '0' + calcMin : calcMin;
                                    sec.innerHTML = calcSec < 10 ? '0' + calcSec : calcSec;
                                }else {
                                    day.innerHTML = 0;
                                    hour.innerHTML = 0;
                                    min.innerHTML = 0;
                                    sec.innerHTML = 0;
                                }
                                
                            }
                            countdown();
                            setInterval(countdown,1000);

                        </script>

                    </div>
                </div>

            </div>
        </div>
    </div>
    @if(Auth::id() == $item->user_id)
    <div class="section-heading text-center" style="margin-top:20px">
        <!-- Dream Dots -->
        <h2 class="fadeInUp" data-wow-delay="0.3s">Messages<img src="img/art-work/fire.png" width="20" alt=""></h2>
        <div class="dream-dots justify-content-center fadeInUp cv" data-wow-delay="0.2s">
                <span>サポーターから届いたメッセージ <br>（他の方には非公開です）</span>  
        </div>
    </div>
    <div class="timelineBox">
        <ul class="timeline">
        @foreach($bids as $bid)
            <li>
                <div class="chat-container">
                    <div class="sup-icon"><a href="{{ url('/user/'.$bid->user->id) }}">
                        <span class="aut-info-chat">
                            @if($bid->user->prof_img)
                            <img src="/users/{{$bid->user->prof_img}}" width="50" alt="">
                            @else
                            <img src="{{asset('img/authors/2.png')}}" width="50" alt="">
                            @endif
                        </span>
                        <p class="msg-name">{{$bid->user->name}}</p></a>
                    </div>
                    <div class="chat-info">
                        <div class="arrow">
                            <p class="reply-content"> {{$bid->message}} </p>
                        </div>
                        <div class="reply-date">
                                <p class="chat-date"><i class="fa fa-clock-o mr-5p"></i>{{ date('Y/m/d H:i', strtotime($bid->created_at) )}}</p>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
        </ui>
    </div>
    @endif
<style>
.time-container {
  display: flex;
}
.count-box {
    width: 25% ;
    color:white;
}
.cv span {
    display:block;
}
.sup-icon {
    display:flex;
    align-items:center;
}
.time {
    font-size: 10px;
    margin: .2rem;
    background: #290571;
    color:white;
    border-radius: .1rem;
    padding: .2rem;
}
.meter {
    color:white;
}

#day,#hour,#min,#sec {
  font-size: 2rem;
  /* margin-right:; */
}

.fa-user-circle {
    height:25px;
    width:25px;
}
.reply-content {
    text-align:left;
    margin: 3px 0;
    color:#333333
}
.msg-name {
    text-align:center;
    color:darkgray;
    margin: 2px 0;
    font-size:12px;
}
.reply-date {
    text-align:right;
    color:darkgray;
    margin: 1px 0;
    font-size:10px;
}

.reply-comment {
    display:flex;
    
}
.arrow{
    position:relative;
    width:60vw;
    background:#E6E6E6;
    padding:10px;
    text-align:left;
    color:#333333;
    font-size:14px;
    font-weight:bold;
    border-radius:15px;
    -webkit-border-radius:15px;
    -moz-border-radius:15px;
    margin:5px 0 5px 45px;
}

.arrow:after{
    border: solid transparent;
    content:'';
    height:0;
    width:0;
    pointer-events:none;
    position:absolute;
    border-color: rgba(230, 230, 230, 0);
    border-top-width:10px;
    border-bottom-width:10px;
    border-left-width:20px;
    border-right-width:20px;
    margin-top: -10px;
    border-right-color:#E6E6E6;
    right:100%;
    top:50%;
}
.chat-container {
    display:flex;
    justify-content:center;
    margin: auto;
}
.chat-input {
    display:flex;
    justify-content:center;
    margin: 5px 0 5px 0;
}

.chat-info {
    display:flex;
    flex-direction: column;
    align-items: flex-end;
}
.chat-date {
    padding: 0 0 0 0;
    margin: 0 0 0 0;
}

</style>
</section>
