<section class="section-padding-0-70 clearfix">
      <div class="container">

          <div class="section-heading text-center">

              <div class="dream-dots justify-content-center fadeInUp" data-wow-delay="0.2s">
                  <span>Our Top Collections</span>
              </div>
              <h2 class="fadeInUp" data-wow-delay="0.3s">Popular Collections</h2>
              <p class="fadeInUp" data-wow-delay="0.4s">高額取引が生まれた商品や、Bidsが多く集まった商品を紹介します。</p>
          </div>


          <div class="row">
              <div class="col-12 col-md-6 col-lg-3">
                  <!-- Content -->
                  <a href="{{ url('/item/'.$top_sellers[0]->item->id) }}" class="service_single_content collection-item wow fadeInUp" data-wow-delay="0.2s">
                      <!-- Icon -->
                      <div class="pricing-img-wrapper">
                          <img src="/items/{{$top_sellers[0]->item->img_1}}" alt="" class="pricing-img" >
                      </div>
                      <div class="collection_info">
                          <h6>{{$top_sellers[0]->item->item_name}}</h6>
                          <p>Owner : <span class="w-text">{{$top_sellers[0]->item->user->name}}</span></p>
                          <p>Final Price : <span class="w-text">{{number_format($top_sellers[0]->final_price)}}円</span> </p>
                      </div>
                  </a>
              </div>
              <div class="col-12 col-md-6 col-lg-3">
                  <!-- Content -->
                  <a href="{{ url('/item/'.$top_sellers[1]->item->id) }}" class="service_single_content collection-item wow fadeInUp" data-wow-delay="0.2s">
                      <!-- Icon -->
                      <div class="pricing-img-wrapper">
                          <img src="/items/{{$top_sellers[1]->item->img_1}}" alt="" class="pricing-img">
                      </div>
                      <div class="collection_info">
                          <h6>{{$top_sellers[1]->item->item_name}}</h6>
                          <p>Owner : <span class="w-text">{{$top_sellers[1]->item->user->name}}</span></p>
                          <p>Final Price : <span class="w-text">{{number_format($top_sellers[1]->final_price)}}円</span> </p>
                      </div>
                  </a>
              </div>
              <div class="col-12 col-md-6 col-lg-3">
                  <!-- Content -->
                  <a href="{{ url('/item/'.$top_sellers[2]->item->id) }}" class="service_single_content collection-item wow fadeInUp" data-wow-delay="0.2s">
                      <!-- Icon -->
                      <div class="pricing-img-wrapper">
                          <img src="/items/{{$top_sellers[2]->item->img_1}}" alt="" class="pricing-img">
                      </div>
                      <div class="collection_info">
                          <h6>{{$top_sellers[2]->item->item_name}}</h6>
                          <p>Owner : <span class="w-text">{{$top_sellers[2]->item->user->name}}</span></p>
                          <p>Final Price : <span class="w-text">{{number_format($top_sellers[2]->final_price)}}円</span> </p>
                      </div>
                  </a>
              </div>
              <div class="col-12 col-md-6 col-lg-3">
                  <!-- Content -->
                  <a href="{{ url('/item/'.$top_sellers[3]->item->id) }}" class="service_single_content collection-item wow fadeInUp" data-wow-delay="0.2s">
                      <!-- Icon -->
                      <div class="pricing-img-wrapper">
                          <img src="/items/{{$top_sellers[3]->item->img_1}}" alt="" class="pricing-img">
                      </div>
                      <div class="collection_info">
                          <h6>{{$top_sellers[3]->item->item_name}}</h6>
                          <p>Owner : <span class="w-text">{{$top_sellers[3]->item->user->name}}</span></p>
                          <p>Final Price : <span class="w-text">{{number_format($top_sellers[3]->final_price)}}円</span> </p>
                      </div>
                  </a>
              </div>


          </div>
      </div>
  </section>
