<section class="blog-area section-padding-100">
        <div class="container">

            <div class="row">
                <div class="col-12 col-lg-3">

                   <div class="service_single_content collection-item">
                        <!-- Icon -->
                        <div class="collection_icon">
                            <img src="img/art-work/profile-header.jpg" class="center-block" alt="">
                        </div>
                        <span class="aut-info">
                            <img src="img/authors/2.png" width="50" alt="">
                        </span>
                        <div class="collection_info text-center">
                            <h6>{{$item->user->name}}</h6>
                            <p class="w-text mr-5p">Creative NFTs Designer <img src="img/art-work/fire.png" width="20" alt=""></p>
                            <p class="mt-15">{{Auth::user()->user_desc}}</p>

                            <div class="search-widget-area mt-15">
                                <form action="#" method="post">
                                    <input type="text" name="wallet" id="wallet" value="Xjo03s-osi6732...">
                                    <button class="btn"><i class="fa fa-copy"></i></button>
                                </form>
                            </div>

                            <ul class="social-links mt-30 mb-30">
                              <li><a href="#"><span class="fa fa-facebook-f"></span></a></li>
                              <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                              <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                              <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
                              <li><a href="#"><span class="fa fa-instagram"></span></a></li>
                           </ul>
                        </div>

                    </div>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="creator-sec dd-bg">
                        <div class="who-we-contant">
                            <div class="dream-dots text-left fadeInUp" data-wow-delay="0.2s">
                                <span class="gradient-text ">Create New Item</span>
                            </div>
                            <h4 class="fadeInUp" data-wow-delay="0.3s">Create Item</h4>
                        </div>
                        <div class="contact_form">
                            <form action="{{ url('item/update') }}" method="post" id="main_contact_form" enctype='multipart/form-data'>
                            @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div id="success_fail_info"></div>
                                    </div>

                                    <div class="col-12 col-md-12">
                                        <p class="w-text">Upload Item File</p>
                                        <div class="group-file">
                                            <p class="g-text">PNG, GIF, WEBP, MP4 or MP3. Max 100mb</p>
                                            <img src="/items/{{$item->img_1}}">
                                            <div class="new_Btn more-btn">Upload File</div><br>
                                            <input type="file" name="img_1" class="form-control" accept='image/' value = "{{$item->img_1}}" enctype="multipart/form-data" multiple="multiple" autofocus>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="group">
                                            <input type="text" name="item_name" id="name" required value="{{$item->item_name}}">
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Item name</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="mb-15">
                                            <p>Choose item Category</p>
                                            <<div class="filers-list ">
                                                <a href="" class="filter-item">
                                                    <img src="img/icons/f1.png" alt="">Art
                                                </a>
                                                <a href="" class="filter-item">
                                                    <img src="img/icons/f5.png" alt="">Skill Share
                                                </a>
                                                <a href="" class="filter-item">
                                                    <img src="img/icons/f2.png" alt="">Music
                                                </a>
                                                <a href="" class="filter-item">
                                                    <img src="img/icons/f3.png" alt="">Shout-Out
                                                </a>
                                                <a href="" class="filter-item">
                                                    <img src="img/icons/f4.png" alt="">Physical Goods
                                                </a>
                                                <a href="" class="filter-item">
                                                    <img src="img/icons/f6.png" alt="">Others
                                                </a>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="group">
                                            <textarea name="item_desc" id="Description" required>{{$item->item_desc}}</textarea>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Item Description</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="group">
                                            <input type="text" name="min_price" id="Price" required value="{{$item->min_price}}">
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Min Price you can't sell</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="group">
                                            <!-- <input type="text" name="duration" id="Royalties" required> -->
                                            <!-- <span class="highlight"></span> -->
                                            <!-- <span class="bar"></span> -->
                                            <label>Selling period</label>
                                            <select name="duration" required class="highlight bar" style="background-color:red" value="{{$item->duration}}">
                                                <option value="1">1時間</option>
                                                <option value="2">1日 (24時間)</option>
                                                <option value="3">3日間</option>
                                                <option value="4">1週間</option>
                                                <option value="5">3分間</option>
                                            </select>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id" value="{{$item->id}}" /> <!--/ id 値を送信 -->
                                    <div class="col-12 text-center">
                                        <button type="submit" class="more-btn mb-15">Update</button>
                                    </div>
                                </div>
                            </form>
                            <hr>
                            <div class="text-center">
                                <p class="w-text mr-5p">アイテムを削除したい場合は... </p>
                                <a href="{{ url('/itemdelete/'.$item->id) }}" class="open-popup-link more-btn col-6">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
