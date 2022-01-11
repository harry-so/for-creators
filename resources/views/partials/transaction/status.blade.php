    <div class="timelineBox" style="margin:10px 0 30px 0">
        <div class="timelineHeader">
            <h3>Transaction Log</h3>
            <p>連絡を取り合って気持ちの良い取引をしましょう。<br> 購入者は、納品が確認できましたら取引完了ボタンを押してください。確認出来次第、クリエイター様へご送金させていただきます。</p>
        </div>
        <div class="timelineBody">
            <ul class="timeline">
                <!-- Single Timeline -->
                <li>
                    <div class="timelineDot"></div>
                    <div class="timelineDate">
                        <p><i class="mr-5p"></i>{{ date('Y/m/d', strtotime($purchase->created_at) )}}</p>
                        <p><i class="fa fa-clock-o mr-5p"></i>{{ date('H:i', strtotime($purchase->created_at) )}}</p>
                    </div>
                    <div class="timelineWork">
                        <h6>購入成立！</h6>
                        <span>Creator <a href="{{ url('/user/'.$purchase->item->user_id) }}">＠ {{$purchase->item->user->name}} </a> is suponsord by <a href="{{ url('/user/'.$purchase->user->id) }}">＠ {{$purchase->user->name}} </a> </span>
                        <br>
                        <span>Final Price: {{number_format($purchase->final_price)}} 円 </span>
                    </div>
                </li>
                @if($purchase->item->transaction==3)
                <li>
                    <div class="timelineDot"></div>
                    <div class="timelineDate">
                        <p><i class="fa fa-calendar mr-5p"></i>{{date('Y/m/d', strtotime(\Carbon\Carbon::now())) }}</p>
                        <p><i class="fa fa-clock-o mr-5p"></i>{{date('H:i', strtotime(\Carbon\Carbon::now())) }}</p>
                    </div>
                    <div class="timelineWork">
                        <h6>支払い待ち</h6>
                        <span>{{$purchase->user->name}} さんは、下記ボタンから支払いを進めてください。（支払い確認に時間がかかることがございます）</span>
                    </div>
                </li>
                <div class="col-12 col-lg-12 text-center" style="margin:10px 0 0 0">
                        <a class="btn more-btn fadeInUp" data-wow-delay="0.6s" href="{{ url('/pay/'.$purchase->id) }}">支払いへ</a>
                        <p>外部サイト（Stripe）へ移動します</p>
                </div>
                <!-- Single Timeline -->
                @elseif($purchase->item->transaction!=6)
                <li>
                    <div class="timelineDot"></div>
                    <div class="timelineDate">
                        <p><i class="fa fa-calendar mr-5p"></i>{{date('Y/m/d', strtotime($purchase->paid_time)) }}</p>
                        <p><i class="fa fa-clock-o mr-5p"></i>{{date('H:i', strtotime($purchase->paid_time)) }}</p>
                    </div>
                    <div class="timelineWork">
                        <h6>支払い完了</h6>
                        <span>{{$purchase->user->name}} さん、お支払いありがとうございます！</span>
                    </div>
                    
                </li>
                
                <li>
                    <div class="timelineDot"></div>
                    <div class="timelineDate">
                        <p><i class="fa fa-calendar mr-5p"></i>{{date('Y/m/d', strtotime(\Carbon\Carbon::now())) }}</p>
                        <p><i class="fa fa-clock-o mr-5p"></i>{{date('H:i', strtotime(\Carbon\Carbon::now())) }}</p>
                    </div>
                    <div class="timelineWork">
                        <h6>購入商品の引き渡しを、下のChatで連絡を取り合い行なってください。</h6>
                        <h6>無事にお手元にお望みのものが届きましたら、購入者の方は感謝の気持ちを伝えて、取引終了ボタンを忘れずに!</h6>
                        <span>今後サービス上で匿名で授受ができるよう開発して参りますので、ご理解ご協力をお願いいたします。</span>
                        <span>取引終了後、一定期間が経ちましたらチャットは非開示になります。</span>
                    </div>
                    
                </li>
<!-- 
                <li>
                    <div class="timelineDot"></div>
                    <div class="timelineDate">
                        <p><i class="fa fa-calendar mr-5p"></i>X/Y/Z</p>
                        <p><i class="fa fa-clock-o mr-5p"></i>hh:mm</p>
                    </div>
                    <div class="timelineWork">
                        <h6>無事にお手元にお望みのものが届きましたか? 購入者の方は感謝の気持ちを伝えて、取引終了ボタンを忘れずに!</h6>
                        <span>取引終了後、一定期間が経ちましたらチャットは非開示になります。</span>
                    </div> -->
                </li>
                    <!-- 購入者しかおせないようにする -->
                    <div class="col-12 col-lg-12 text-center" style="margin:10px 0 0 0">
                        <a class="btn more-btn fadeInUp" data-wow-delay="0.6s" href="{{ url('/complete/'.$purchase->id) }}">取引完了</a>
                    </div>
                    

                @else
                <li>
                    <div class="timelineDot"></div>
                    <div class="timelineDate">
                        <p><i class="fa fa-calendar mr-5p"></i>{{date('Y/m/d', strtotime($purchase->paid_time)) }}</p>
                        <p><i class="fa fa-clock-o mr-5p"></i>{{date('H:i', strtotime($purchase->paid_time)) }}</p>
                    </div>
                    <div class="timelineWork">
                        <h6>支払い完了</h6>
                        <span>{{$purchase->user->name}} さん、お支払いありがとうございます！</span>
                    </div>
                    
                </li>
                <li>
                    <div class="timelineDot"></div>
                    <div class="timelineDate">
                        <p><i class="mr-5p"></i>{{ date('Y/m/d', strtotime($purchase->completed_time) )}}</p>
                        <p><i class="fa fa-clock-o mr-5p"></i>{{ date('H:i', strtotime($purchase->completed_time) )}}</p>
                    </div>
                    <div class="timelineWork">
                        <h6>取引完了！</h6>
                        <span>気持ちの良いお取引ありがとうございました！引き続きクリエイターのサポートをお願いします。 </span>
                    </div>
                </li>
                @endif
            </ul>
        </div>
    </div>
