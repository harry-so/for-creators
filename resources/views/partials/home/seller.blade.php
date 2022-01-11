<section class="about-us-area section-padding-100 clearfix">

    <div class="container">
        <div class="row align-items-center">


            <div class="col-12 col-lg-12">
                <div class="who-we-contant">
                    <div class="dream-dots text-left fadeInUp" data-wow-delay="0.2s" >
                        <span class="gradient-text ">Creative Creators</span>
                    </div>
                    <h4 class="fadeInUp" data-wow-delay="0.3s">Top Sellers This Month</h4>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="creator-sec dd-bg">
                    <div class="author-item">
                        <div class="author-rank">01</div>
                        <div class="author-img"><img src="users/{{$top_sales[0]->item->user->prof_img}}" width="70" alt=""></div>
                        <div class="author-info">
                            <a href="{{ url('/user/'.$top_sales[0]->item->user->id) }}"><h5 class="author-name">{{$top_sales[0]->item->user->name}}</h5></a>
                            <p class="author-earn mb-0">{{number_format($top_sales[0]->final_price)}} 円</p>
                        </div>
                    </div>
                    <div class="author-item">
                        <div class="author-rank">02</div>
                        <div class="author-img"><img src="users/{{$top_sales[1]->item->user->prof_img}}" width="70" alt=""></div>
                        <div class="author-info">
                            <a href="{{ url('/user/'.$top_sales[1]->item->user->id) }}"><h5 class="author-name">{{$top_sales[1]->item->user->name}}</h5></a>
                            <p class="author-earn mb-0">{{number_format($top_sales[1]->final_price)}} 円</p>
                        </div>
                    </div>
                    <div class="author-item">
                        <div class="author-rank">03</div>
                        <div class="author-img"><img src="users/{{$top_sales[2]->item->user->prof_img}}" width="70" alt=""></div>
                        <div class="author-info">
                            <a href="{{ url('/user/'.$top_sales[2]->item->user->id) }}"><h5 class="author-name">{{$top_sales[2]->item->user->name}}</h5></a>
                            <p class="author-earn mb-0">{{number_format($top_sales[2]->final_price)}} 円</p>
                        </div>
                    </div>
                    <div class="author-item">
                        <div class="author-rank">04</div>
                        <div class="author-img"><img src="users/{{$top_sales[3]->item->user->prof_img}}" width="70" alt=""></div>
                        <div class="author-info">
                            <a href="{{ url('/user/'.$top_sales[3]->item->user->id) }}"><h5 class="author-name">{{$top_sales[3]->item->user->name}}</h5></a>
                            <p class="author-earn mb-0">{{number_format($top_sales[3]->final_price)}} 円</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 mt-s">
                <div class="creator-sec dd-bg">
                    <div class="author-item">
                        <div class="author-rank">05</div>
                        <div class="author-img"><img src="users/{{$top_sales[4]->item->user->prof_img}}" width="70" alt=""></div>
                        <div class="author-info">
                            <a href="{{ url('/user/'.$top_sales[4]->item->user->id) }}"><h5 class="author-name">{{$top_sales[4]->item->user->name}}</h5></a>
                            <p class="author-earn mb-0">{{number_format($top_sales[4]->final_price)}} 円</p>
                        </div>
                    </div>
                    <div class="author-item">
                        <div class="author-rank">06</div>
                        <div class="author-img"><img src="users/{{$top_sales[5]->item->user->prof_img}}" width="70" alt=""></div>
                        <div class="author-info">
                            <a href="{{ url('/user/'.$top_sales[5]->item->user->id) }}"><h5 class="author-name">{{$top_sales[5]->item->user->name}}</h5></a>
                            <p class="author-earn mb-0">{{number_format($top_sales[5]->final_price)}} 円</p>
                        </div>
                    </div>
                    <div class="author-item">
                        <div class="author-rank">07</div>
                        <div class="author-img"><img src="users/{{$top_sales[6]->item->user->prof_img}}" width="70" alt=""></div>
                        <div class="author-info">
                            <a href="{{ url('/user/'.$top_sales[6]->item->user->id) }}"><h5 class="author-name">{{$top_sales[6]->item->user->name}}</h5></a>
                            <p class="author-earn mb-0">{{number_format($top_sales[6]->final_price)}} 円</p>
                        </div>
                    </div>
                    <div class="author-item">
                        <div class="author-rank">08</div>
                        <div class="author-img"><img src="users/{{$top_sales[7]->item->user->prof_img}}" width="70" alt=""></div>
                        <div class="author-info">
                            <a href="{{ url('/user/'.$top_sales[7]->item->user->id) }}"><h5 class="author-name">{{$top_sales[7]->item->user->name}}</h5></a>
                            <p class="author-earn mb-0">{{number_format($top_sales[7]->final_price)}} 円</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 mt-s">
                <div class="creator-sec dd-bg">
                    <div class="author-item">
                        <div class="author-rank">09</div>
                        <div class="author-img"><img src="{{ asset('img/authors/9.png') }}" width="70" alt=""></div>
                        <div class="author-info">
                            <a href="{{ url('/profile') }}"><h5 class="author-name">LarySmith-30</h5></a>
                            <p class="author-earn mb-0">647.34 ETH</p>
                        </div>
                    </div>
                    <div class="author-item">
                        <div class="author-rank">10</div>
                        <div class="author-img"><img src="{{ asset('img/authors/10.png') }}" width="70" alt=""></div>
                        <div class="author-info">
                            <a href="{{ url('/profile') }}"><h5 class="author-name">Amillia Nnor</h5></a>
                            <p class="author-earn mb-0">521.85 ETH</p>
                        </div>
                    </div>
                    <div class="author-item">
                        <div class="author-rank">11</div>
                        <div class="author-img"><img src="{{ asset('img/authors/11.png') }}" width="70" alt=""></div>
                        <div class="author-info">
                            <a href="{{ url('/profile') }}"><h5 class="author-name">Naretor-Nole</h5></a>
                            <p class="author-earn mb-0">511.45 ETH</p>
                        </div>
                    </div>
                    <div class="author-item">
                        <div class="author-rank">12</div>
                        <div class="author-img"><img src="{{ asset('img/authors/12.png') }}" width="70" alt=""></div>
                        <div class="author-info">
                            <a href="{{ url('/profile') }}"><h5 class="author-name">Johan Donem</h5></a>
                            <p class="author-earn mb-0">499.11 ETH</p>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>
