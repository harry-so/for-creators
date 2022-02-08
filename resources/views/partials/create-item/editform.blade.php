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
                            <img src="/users/{{$item->user->prof_img}}" width="65" alt="">
                        </span>
                        <div class="collection_info text-center">
                            <h6>{{$item->user->name}}</h6>
                            <p class="w-text mr-5p"> {{$item->user->title}}<img src="img/art-work/fire.png" width="20" alt=""></p>
                            <p class="mt-15">{{Auth::user()->user_desc}}</p>

                            <ul class="social-links mt-30 mb-30">
                                <li><a href="{{Auth::user()->twitter}}"><span class="fa fa-twitter"></span></a></li>
                                <li><a href="{{Auth::user()->instagram}}"><span class="fa fa-instagram"></span></a></li>
                                <li><a href="{{Auth::user()->website}}"><span class="fa fa-laptop"></span></a></li>
                           </ul>
                        </div>

                    </div>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="creator-sec dd-bg">
                        <div class="who-we-contant">
                            <div class="dream-dots text-left fadeInUp" data-wow-delay="0.2s">
                                <span class="gradient-text ">Edit Your Item</span>
                            </div>
                            <h4 class="fadeInUp" data-wow-delay="0.3s">Edit Your Item: 編集</h4>
                        </div>
                        <div class="contact_form">
                            <form action="{{ url('item/update') }}" method="post" id="main_contact_form" enctype='multipart/form-data'>
                            @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div id="success_fail_info"></div>
                                    </div>

                                    <div class="col-12 col-md-12">
                                        <p class="w-text">Upload Item File : 画像を変える場合のみアップロードしてください</p>
                                        <div class="group-file">
                                            <p class="g-text">PNG, JPG, JPEG</p>
                                            <img id="uploaded" style="margin-bottom:10px">
                                            <!-- <img src="/items/{{$item->img_1}}" style="margin-bottom:10px"> -->
                                            <label for="upload-btn" class="new_Btn more-btn" style="display:inline-block;">Upload File<br>
                                            <input type="file" name="img_1" id="upload-btn" class="form-control" accept='image/' enctype="multipart/form-data" multiple="multiple" autofocus>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="group">
                                            <input type="text" name="item_name" id="name" required value="{{$item->item_name}}">
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Item name : あなたの商品を一番よく表す名前をつけましょう</label>
                                        </div>
                                    </div>
                                    <!-- <div class="col-12 col-md-12">
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
                                    </div> -->
                                    <div class="col-12">
                                        <div class="group">
                                            <textarea name="item_desc" id="Description" required>{{$item->item_desc}}</textarea>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Item Description : 詳しく商品について熱く語ってください！</label>
                                        </div>
                                    </div>
                                    <!-- <div class="col-12 col-md-12">
                                        <div class="group">
                                            <input type="text" name="min_price" id="Price" required value="{{$item->min_price}}">
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Min Price you can't sell : これ以下では売りたくないという最低価格を入力してください（他の方には公開されません。）</label>
                                        </div>
                                    </div> -->
                                    <!-- <div class="col-12 col-md-6">
                                        <div class="group">
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
                                    </div> -->
                                    <input type="hidden" name="id" value="{{$item->id}}" /> <!--/ id 値を送信 -->
                                    <div class="col-12 text-center">
                                        <button type="submit" class="more-btn mb-15">Update</button>
                                    </div>
                                </div>
                            </form>
                            <hr>
                            <div class="text-center">
                                <p class="w-text mr-5p">アイテムを削除したい場合は... </p>
                                <form action="{{ url('/itemdelete/'.$item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="more-btn mb-15">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
