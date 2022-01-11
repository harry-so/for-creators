<section class="section-padding-100 contact_us_area" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <div class="dream-dots justify-content-center fadeInUp" data-wow-delay="0.2s">
                            <span>Password Reset</span>
                        </div>
                        <h2>Password Reset</h2>
                        <p>パスワードをリセットするメールをお送りいたしますので、<br> アカウントに使ったメールアドレスをご入力ください。</p>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8">
                    <div class="contact_form">
                        <form action="{{ route('password.email') }}" method="post" id="main_contact_form" novalidate>
                          @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div id="success_fail_info"></div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="group wow fadeInUp" data-wow-delay="0.3s">
                                        <input type="email" name="email" :value="old('email')" id="emial" required autofocus>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Email</label>
                                    </div>
                                </div>
                               
                                <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.6s">
                                    <button type="submit" class="more-btn">Passwordリセットメールを送る</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
