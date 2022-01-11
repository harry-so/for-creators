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
                            <img src="/users/{{$user->prof_img}}" width="50" alt="">
                        </span>
                        <div class="collection_info text-center">
                            <h6>{{$user->name}}</h6>
                            <p class="w-text mr-5p">{{$user->title}} <img src="img/art-work/fire.png" width="20" alt=""></p>
                            <p class="mt-15">{{$user->user_desc}}</p>

                            <div class="admire text-center">
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
                            <button class="btn" data-filter=".branding">Collectable</button>
                            <button class="btn" data-filter=".design">Created</button>
                            <button class="btn" data-filter=".development">On Auction</button>
                        </div>
                    </div>
                    <div class="row">

                        <div class="container">
                            <div class="row dream-portfolio">

                                <!-- Single gallery Item -->
                                @foreach($items as $item)
                                <div class="col-12 col-md-6 col-lg-4 single_gallery_item branding">
                                    <div class="pricing-item ">
                                        <div class="wraper">
                                            <a href="{{ url('/item/'.$item->id) }}"><img src="/items/{{$item->img_1}}" alt=""></a>
                                            <a href="{{ url('/item/'.$item->id) }}"><h4>{{$item->item_name}}</h4></a>
                                            <div class="owner-info">
                                                <img src="/users/{{$item->user->prof_img}}" width="40" alt="">
                                                <a href="{{ url('/user/'.$item->user_id) }}"><h3>@ {{$user->name}}</h3></a>
                                            </div>
                                            @if($item->purchaser)
                                            <div class="pricing">Final Price : <span class="ml-15">{{$item->purchaser->final_price}}</span> </div>
                                            @endif
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
                                <div class="col-12 col-md-6 col-lg-4 single_gallery_item design">
                                    <div class="pricing-item ">
                                        <div class="wraper">
                                            <a href="{{ url('/item/'.$purchase->item_id) }}"><img src="{{asset('img/art-work/2.png')}}" alt=""></a>
                                            <a href="{{ url('/item/'.$purchase->item_id) }}"><h4>{{$purchase->item->item_name}}</h4></a>
                                            <div class="owner-info">
                                                <img src="{{asset('img/authors/2.png')}}" width="40" alt="">
                                                <a href="{{ url('/user/'.$purchase->item->user->id) }}"><h3>@ {{$purchase->item->user->name}}</h3></a>
                                            </div>
                                            <span><span class="g-text">Published: </span> {{$purchase->item->published}} </span>
                                            <div class="pricing"> Price: <span class="ml-15"> {{number_format($purchase->final_price)}} </span> </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                @endforeach



                                <!-- Single gallery Item -->
                                <div class="col-12 col-md-6 col-lg-4 single_gallery_item design">
                                    <div class="pricing-item ">
                                        <div class="wraper">
                                            <a href="{{ url('/item-details') }}"><img src="{{asset('img/art-work/2.png')}}" alt=""></a>
                                            <a href="{{ url('/item-details') }}"><h4>Scarecrow in daylight</h4></a>
                                            <div class="owner-info">
                                                <img src="{{asset('img/authors/2.png')}}" width="40" alt="">
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

                                <!-- Single gallery Item -->
                                <div class="col-12 col-md-6 col-lg-4 single_gallery_item development">
                                    <div class="pricing-item ">
                                        <div class="wraper">
                                            <a href="{{ url('/item-details') }}"><img src="{{asset('img/art-work/3.png')}}" alt=""></a>
                                            <a href="{{ url('/item-details') }}"><h4>Scarecrow in daylight</h4></a>
                                            <div class="owner-info">
                                                <img src="img/authors/3.png" width="40" alt="">
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

                                <!-- Single gallery Item -->
                                <div class="col-12 col-md-6 col-lg-4 single_gallery_item design">
                                    <div class="pricing-item ">
                                        <div class="wraper">
                                            <a href="{{ url('/item-details') }}"><img src="{{asset('img/art-work/4.png')}}" alt=""></a>
                                            <a href="{{ url('/item-details') }}"><h4>Scarecrow in daylight</h4></a>
                                            <div class="owner-info">
                                                <img src="img/authors/4.png" width="40" alt="">
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

                                <!-- Single gallery Item -->
                                <div class="col-12 col-md-6 col-lg-4 single_gallery_item branding">
                                    <div class="pricing-item ">
                                        <div class="wraper">
                                            <a href="{{ url('/item-details') }}"><img src="{{asset('img/art-work/5.png')}}" alt=""></a>
                                            <a href="{{ url('/item-details') }}"><h4>Scarecrow in daylight</h4></a>
                                            <div class="owner-info">
                                                <img src="{{asset('img/authors/5.png')}}" width="40" alt="">
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

                                <!-- Single gallery Item -->
                                <div class="col-12 col-md-6 col-lg-4 single_gallery_item development">
                                    <div class="pricing-item ">
                                        <div class="wraper">
                                            <a href="{{ url('/item-details') }}"><img src="{{asset('img/art-work/6.png')}}" alt=""></a>
                                            <a href="{{ url('/item-details') }}"><h4>Scarecrow in daylight</h4></a>
                                            <div class="owner-info">
                                                <img src="img/authors/6.png" width="40" alt="">
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
                            </div>

                            <div class="col-12 col-lg-12 text-center">
                                <a class="btn more-btn fadeInUp" data-wow-delay="0.6s" href="{{ url('/discover') }}">Load More</a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
