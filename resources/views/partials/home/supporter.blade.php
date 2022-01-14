<section class="about-us-area section-padding-100 clearfix">

    <div class="container">
        <div class="row align-items-center">


            <div class="col-12 col-lg-12">
                <div class="who-we-contant">
                    <div class="dream-dots text-left fadeInUp" data-wow-delay="0.2s" >
                        <span class="gradient-text ">Great Patrons for Creators</span>
                    </div>
                    <h4 class="fadeInUp" data-wow-delay="0.3s">Top Supporters</h4>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="creator-sec dd-bg">
                    <div class="author-item">
                        <div class="author-rank">01</div>
                        <div class="author-img"><img src="users/{{$top_supporters[0]->prof_img}}" class="prof_img" style="width:70px; height:70px;" alt=""></div>
                        <div class="author-info">
                            <a href="{{ url('/user/'.$top_supporters[0]->id) }}"><h5 class="author-name">{{$top_supporters[0]->name}}</h5></a>
                            <p class="author-earn mb-0">Total: {{number_format($top_supporters[0]->sum)}} 円</p>
                        </div>
                    </div>
                    <div class="author-item">
                        <div class="author-rank">02</div>
                        <div class="author-img"><img src="users/{{$top_supporters[1]->prof_img}}" class="prof_img" style="width:70px; height:70px;"></div>
                        <div class="author-info">
                            <a href="{{ url('/user/'.$top_supporters[1]->id) }}"><h5 class="author-name">{{$top_supporters[1]->name}}</h5></a>
                            <p class="author-earn mb-0">Total: {{number_format($top_supporters[1]->sum)}} 円</p>
                        </div>
                    </div>
                    <div class="author-item">
                        <div class="author-rank">03</div>
                        <div class="author-img"><img src="users/{{$top_supporters[2]->prof_img}}" class="prof_img" style="width:70px; height:70px;"></div>
                        <div class="author-info">
                            <a href="{{ url('/user/'.$top_supporters[2]->id) }}"><h5 class="author-name">{{$top_supporters[2]->name}}</h5></a>
                            <p class="author-earn mb-0">Total: {{number_format($top_supporters[2]->sum)}} 円</p>
                        </div>
                    </div>
                    <div class="author-item">
                        <div class="author-rank">04</div>
                        <div class="author-img"><img src="users/{{$top_supporters[3]->prof_img}}" class="prof_img" style="width:70px; height:70px;"></div>
                        <div class="author-info">
                            <a href="{{ url('/user/'.$top_supporters[3]->id) }}"><h5 class="author-name">{{$top_supporters[3]->name}}</h5></a>
                            <p class="author-earn mb-0">Total: {{number_format($top_supporters[3]->sum)}} 円</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 mt-s">
                <div class="creator-sec dd-bg">
                    <div class="author-item">
                        <div class="author-rank">05</div>
                        <div class="author-img"><img src="users/{{$top_supporters[4]->prof_img}}" class="prof_img" style="width:70px; height:70px;"></div>
                        <div class="author-info">
                            <a href="{{ url('/user/'.$top_supporters[4]->id) }}"><h5 class="author-name">{{$top_supporters[4]->name}}</h5></a>
                            <p class="author-earn mb-0">Total: {{number_format($top_supporters[4]->sum)}} 円</p>
                        </div>
                    </div>
                    <div class="author-item">
                        <div class="author-rank">06</div>
                        <div class="author-img"><img src="users/{{$top_supporters[5]->prof_img}}" class="prof_img" style="width:70px; height:70px;"></div>
                        <div class="author-info">
                            <a href="{{ url('/user/'.$top_supporters[5]->id) }}"><h5 class="author-name">{{$top_supporters[5]->name}}</h5></a>
                            <p class="author-earn mb-0">Total: {{number_format($top_supporters[5]->sum)}} 円</p>
                        </div>
                    </div>
                    <div class="author-item">
                        <div class="author-rank">07</div>
                        <div class="author-img"><img src="users/{{$top_supporters[6]->prof_img}}" class="prof_img" style="width:70px; height:70px;"></div>
                        <div class="author-info">
                            <a href="{{ url('/user/'.$top_supporters[6]->id) }}"><h5 class="author-name">{{$top_supporters[6]->name}}</h5></a>
                            <p class="author-earn mb-0">Total: {{number_format($top_supporters[6]->sum)}} 円</p>
                        </div>
                    </div>
                    <div class="author-item">
                        <div class="author-rank">08</div>
                        <div class="author-img"><img src="users/{{$top_supporters[7]->prof_img}}" class="prof_img" style="width:70px; height:70px;"></div>
                        <div class="author-info">
                            <a href="{{ url('/user/'.$top_supporters[7]->id) }}"><h5 class="author-name">{{$top_supporters[7]->name}}</h5></a>
                            <p class="author-earn mb-0">Total: {{number_format($top_supporters[7]->sum)}} 円</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 mt-s">
                <div class="creator-sec dd-bg">
                <div class="author-item">
                        <div class="author-rank">09</div>
                        <div class="author-img"><img src="users/{{$top_supporters[8]->prof_img}}" class="prof_img" style="width:70px; height:70px;"></div>
                        <div class="author-info">
                            <a href="{{ url('/user/'.$top_supporters[8]->id) }}"><h5 class="author-name">{{$top_supporters[8]->name}}</h5></a>
                            <p class="author-earn mb-0">Total: {{number_format($top_supporters[8]->sum)}} 円</p>
                        </div>
                    </div>
                    <div class="author-item">
                        <div class="author-rank">10</div>
                        <div class="author-img"><img src="users/{{$top_supporters[9]->prof_img}}" class="prof_img" style="width:70px; height:70px;"></div>
                        <div class="author-info">
                            <a href="{{ url('/user/'.$top_supporters[9]->id) }}"><h5 class="author-name">{{$top_supporters[9]->name}}</h5></a>
                            <p class="author-earn mb-0">Total: {{number_format($top_supporters[9]->sum)}} 円</p>
                        </div>
                    </div>
                    <div class="author-item">
                        <div class="author-rank">11</div>
                        <div class="author-img"><img src="users/{{$top_supporters[10]->prof_img}}" class="prof_img" style="width:70px; height:70px;"></div>
                        <div class="author-info">
                            <a href="{{ url('/user/'.$top_supporters[10]->id) }}"><h5 class="author-name">{{$top_supporters[10]->name}}</h5></a>
                            <p class="author-earn mb-0">Total: {{number_format($top_supporters[10]->sum)}} 円</p>
                        </div>
                    </div>
                    <div class="author-item">
                        <div class="author-rank">12</div>
                        <div class="author-img"><img src="users/{{$top_supporters[11]->prof_img}}" class="prof_img" style="width:70px; height:70px;"></div>
                        <div class="author-info">
                            <a href="{{ url('/user/'.$top_supporters[11]->id) }}"><h5 class="author-name">{{$top_supporters[11]->name}}</h5></a>
                            <p class="author-earn mb-0">Total: {{number_format($top_supporters[11]->sum)}} 円</p>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>
