<section class="blog-area section-padding-100">
        <div class="container">

            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="creator-sec dd-bg">
                        <div class="who-we-contant">
                            <div class="dream-dots text-left fadeInUp" data-wow-delay="0.2s">
                                <span class="gradient-text ">ユーザー情報編集</span>
                            </div>
                            <h4 class="fadeInUp" data-wow-delay="0.3s">Talk about yourself!</h4>
                        </div>
                        <div class="contact_form">
                            <form action="{{ url('user/update') }}" method="post" id="main_contact_form" enctype='multipart/form-data'>
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
                                            <label for="upload-btn" class="new_Btn more-btn" style="display:inline-block;">Upload File<br>
                                            <input type="file" name="prof_img" id="upload-btn" class="form-control" accept='image/' enctype="multipart/form-data" multiple="multiple" autofocus>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="group">
                                            <input type="text" name="name" id="name" required value="{{$user->name}}">
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Your Name: こちらのお名前が表示されます!
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-12">
                                        <div class="group">
                                            <input type="text" name="title" id="name" required value="{{$user->title}}">
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Your Title: あなたを一言で表すキャッチフレーズをつけてください!
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="group">
                                            <textarea name="user_desc" id="Description">{{$user->user_desc}}</textarea>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Profile Description: あなたことを詳しく聞かせてください!</label>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="group">
                                            <input type="year" name="birth_year" required value="{{$user->birth_year}}">
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Birth Year</label>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="group">
                                            <input type="number" name="birth_month" required value="{{$user->birth_month}}" autocomplete>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Birth Month</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="group">
                                            <input type="url" name="twitter" value="{{$user->twitter}}" placeholder="https://twitter.com/XXXXX">
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Twitterアカウント登録 (入力形式: https://twitter.com/XXXXX)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="group">
                                            <input type="url" name="instagram" value="{{$user->instagram}}" placeholder="https://www.instagram.com/XXXXXX/">
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Instagramアカウント登録 (入力形式: https://www.instagram.com/XXXXXX/)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="group">
                                            <input type="url" name="website" value="{{$user->website}}" placeholder="https://example.com">
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>その他Website登録 (URL)
                                            </label>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id" value="{{$user->id}}" /> <!--/ id 値を送信 -->
                                    <div class="col-12 text-center">
                                        <button type="submit" class="more-btn mb-15">登録</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
