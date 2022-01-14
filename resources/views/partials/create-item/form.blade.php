<section class="blog-area section-padding-100">
        <div class="container">

            <div class="row">
                <div class="col-12 col-lg-3">
                    @if(Auth::check())
                   <div class="service_single_content collection-item">
                        <!-- Icon -->
                        <div class="collection_icon">
                            <img src="{{asset('img/art-work/profile-header.jpg')}}" class="center-block" alt="">
                        </div>
                        <span class="aut-info">
                            @if(Auth::user()->prof_img)
                            <img src="/users/{{Auth::user()->prof_img}}" >
                            @else
                            <img src="{{ asset('img/authors/2.png') }}" >
                            @endif
                        </span>
                        <div class="collection_info text-center">
                            <h6>{{Auth::user()->name}}</h6>
                            <p class="w-text mr-5p">{{Auth::user()->title}} <img src="img/art-work/fire.png" width="20" alt=""></p>
                            <p class="mt-15">{{Auth::user()->user_desc}}</p>

                            <ul class="social-links mt-30 mb-30">
                              
                              <li><a href="{{Auth::user()->twitter}}"><span class="fa fa-twitter"></span></a></li>
                              <li><a href="{{Auth::user()->instagram}}"><span class="fa fa-instagram"></span></a></li>
                              <li><a href="{{Auth::user()->website}}"><span class="fa fa-laptop"></span></a></li>
                           </ul>
                            <a href="{{ url('/useredit/'.Auth::id()) }}" class="more-btn mt-15">Edit</a>

                        </div>

                    </div>
                    @else
                    <div class="service_single_content collection-item">
                        <div class="collection_icon">
                            <img src="img/art-work/profile-header.jpg" class="center-block" alt="">
                        </div>
                        <span class="aut-info">
                            <img src="img/authors/2.png" width="50" alt="">
                        </span>
                        <form action="{{ url('/login')}}" method="get" id="main_contact_form" novalidate style="margin:10px 0 10px 0">
                            <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.6s">
                                <button type="submit" class="more-btn">Log In</button>
                            </div>
                        </form>
                    </div>
                    @endif
                </div>
                <div class="col-12 col-lg-8">
                    <div class="creator-sec dd-bg">
                        <div class="who-we-contant">
                            <div class="dream-dots text-left fadeInUp" data-wow-delay="0.2s">
                                <span class="gradient-text ">Create New Item</span>
                            </div>
                            <h4 class="fadeInUp" data-wow-delay="0.3s">Create Item: 出品</h4>
                        </div>
                        <div class="contact_form">
                            <form action="{{ url('list') }}" method="post" id="main_contact_form" enctype='multipart/form-data'>
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div id="success_fail_info"></div>
                                    </div>

                                    <div class="col-12 col-md-12">
                                        <p class="w-text">Upload Item File : あなたの商品を一番よく表している写真をアップロードしてください</p>
                                        <div class="group-file">
                                            <p class="g-text">PNG, JPG, JPEG</p>
                                            <!-- <div class="new_Btn more-btn">Upload File</div><br>
                                            <input type="file" name="img_1" class="form-control" accept='image/' enctype="multipart/form-data" multiple="multiple" required autofocus> -->
                                            <!-- 元々 -->
                                            <img id="uploaded" style="margin-bottom:10px">
                                            <label for="upload-btn" class="new_Btn more-btn" style="display:inline-block;">Upload File<br>
                                            <input type="file" name="img_1" id="upload-btn" class="form-control" accept='image/' enctype="multipart/form-data" multiple="multiple" required autofocus>
                                            </label>

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="group">
                                            <input type="text" name="item_name" id="name" required>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Item name : あなたの商品を一番よく表す名前をつけましょう</label>
                                        </div>
                                    </div>
                                    <!-- <div class="col-12 col-md-12">
                                        <div class="mb-15">
                                            <p>Choose item Category</p>
                                            <div class="filers-list ">
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
                                    </div> -->
                                    <div class="col-12">
                                        <div class="group">
                                            <textarea name="item_desc" id="Description" required></textarea>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Item Description : 詳しく商品について熱く語ってください！</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="group">
                                            <input type="number" name="min_price" id="Price" required>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Min Price you wanna sell : これ以下では売りたくないという最低価格を入力してください（他の方には公開されません。）</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="group">
                                            <!-- <input type="text" name="duration" id="Royalties" required> -->
                                            <!-- <span class="highlight"></span> -->
                                            <!-- <span class="bar"></span> -->
                                            <div class="cp_ipselect">

                                                <select name="duration" required class="cp_sl06">
                                                    <option disabled>Selling Period: 商品の募集期間を選んでください</option>
                                                    <option value="1">1時間</option>
                                                    <option value="2">1日 (24時間)</option>
                                                    <option value="3">3日間</option>
                                                    <option value="4">1週間</option>
                                                    <option value="5">3分間</option>
                                                </select>
                                                <span class="cp_sl06_highlight"></span>
                                                <span class="cp_sl06_selectbar"></span>
                                                <label class="cp_sl06_selectlabel">Selling Period: 商品の募集期間を選んでください</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-12 col-md-6">
                                        <div class="group">
                                            <input type="text" name="Size" id="Size" required>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Sales methods</label>
                                        </div>
                                    </div> -->
                                    <!-- <div class="col-12">
                                        <div class="group">
                                            <input type="text" name="copies" id="copies" required>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Number of copies</label>
                                        </div>
                                    </div> -->

                                    <div class="col-12 text-center">
                                        <p class="w-text mr-5p">最低価格と販売期間は編集できません、最後にもう一度確認ください! </p>
                                        <button type="submit" class="more-btn mb-15">出品する</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
