<section class="blog-area section-padding-100">
        <div class="container">

            <div class="row">
                <div class="col-12 col-lg-3">

                   <div class="service_single_content collection-item">
                        <!-- Icon -->
                        <div class="collection_icon">
                            <img src="{{asset('img/art-work/profile-header.jpg')}}" class="center-block" alt="">
                        </div>
                        <span class="aut-info">
                            @if($user->prof_img)
                            <img src="/users/{{$user->prof_img}}" >
                            @else
                            <img src="{{ asset('img/authors/2.png') }}" >
                            @endif
                        </span>
                        <div class="collection_info text-center">
                            <h6>{{$user->name}}</h6>
                            <p class="w-text mr-5p">{{$user->title}} <img src="img/art-work/fire.png" width="20" alt=""></p>
                            <p class="mt-15">{{$user->user_desc}}</p>

                            <div class="text-center">
                                <div class="pricing" style="color:white">合計支援額 : <span class="ml-15" style="color:aquamarine">¥ {{number_format($sum)}} </span></div>
                            </div>

                            <ul class="social-links mt-15">
                              <li><a href="{{$user->website}}"><span class="fa fa-laptop"></span></a></li>
                              <li><a href="{{$user->twitter}}"><span class="fa fa-twitter"></span></a></li>
                              <li><a href="{{$user->instagram}}"><span class="fa fa-instagram"></span></a></li>
                            </ul>

                            @if($user->id == Auth::id())
                            <a href="{{ url('/useredit/'.$user->id) }}" class="more-btn mt-15">Edit</a>
                            @endif
                        </div>

                    </div>


                </div>
                <div class="col-12 col-md-9">
                    <!-- Projects Menu -->
                    <div class="dream-projects-menu mb-50">
                        <div class="text-center portfolio-menu">
                            <button class="btn active" data-filter="*">All</button>
                            <button class="btn" data-filter=".creation">Created</button>
                            <button class="btn" data-filter=".support">Supported</button>
                            <!-- <button class="btn" data-filter=".development">On Auction</button> -->
                        </div>
                    </div>
                    <div class="container">
                        <div class="row dream-portfolio">
                            <!-- Single gallery Item -->
                            @foreach($items as $item)
                            <div class="col-12 col-md-6 col-lg-4 single_gallery_item creation">
                                <div class="pricing-item">
                                    <div class="wraper">
                                        <div class="pricing-img-wrapper">
                                            <a href="{{ url('/item/'.$item->id) }}"><img src="/items/{{$item->img_1}}" alt="" class="pricing-img"></a>
                                        </div>
                                        <div class="owner-info">
                                            <img src="/users/{{$item->user->prof_img}}" alt="" class="prof_img" style="width:40px; height:40px;">
                                            <a href="{{ url('/user/'.$item->user_id) }}"><h3>{{$item->user->name}}</h3></a>
                                        </div>
                                        <div>
                                            <a href="{{ url('/item/'.$item->id) }}"><h4>{{$item->item_name}}</h4></a>
                                            <div><span class="g-text"> {!! nl2br($item->item_desc) !!}</span></div>
                                        </div>

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
                            @endforeach

                            @foreach($purchases as $purchase)
                            <div class="col-12 col-md-6 col-lg-4 single_gallery_item support">
                                <div class="pricing-item ">
                                    <div class="wraper">
                                        <div class="pricing-img-wrapper">
                                            <a href="{{ url('/item/'.$purchase->item_id) }}"><img src="/items/{{$purchase->item->img_1}}" class="pricing-img" alt=""></a>
                                        </div>
                                        <div class="owner-info">
                                            <img src="{{asset('img/authors/2.png')}}" width="40" alt="">
                                            <a href="{{ url('/user/'.$purchase->item->user->id) }}"><h3>@ {{$purchase->item->user->name}}</h3></a>
                                        </div>
                                        <div>
                                            <a href="{{ url('/item/'.$purchase->item_id) }}"><h4>{{$purchase->item->item_name}}</h4></a>
                                            
                                        </div>
                                        <span><span class="g-text">Published: </span> {{$purchase->item->published}} </span>
                                        <div class="pricing"> Price: <span class="ml-15"> {{number_format($purchase->final_price)}} </span> </div>
                                        
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <div class="col-12 col-lg-12 text-center">
                                <a class="btn more-btn fadeInUp" data-wow-delay="0.6s" href="{{ url('/discover') }}">Load More</a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
