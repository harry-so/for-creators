<section class="section-padding-100 contact_us_area" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <div class="dream-dots justify-content-center fadeInUp" data-wow-delay="0.2s">
                            <span>Login Now!</span>
                        </div>
                        <h2>Login to Account</h2>
                        <p>出品や注文などができるようになります！</p>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8">
                    <div class="contact_form">
                        <form action="{{ route('login') }}" method="post" id="main_contact_form" novalidate>
                          @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div id="success_fail_info"></div>
                                </div>

                                <div class="col-12 col-md-12">
                                    <div class="group wow fadeInUp" data-wow-delay="0.3s">
                                        <input type="text" name="email" id="email" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group wow fadeInUp" data-wow-delay="0.4s">
                                        <input type="password" name="password" id="password" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Password</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="remember_me" class="inline-flex items-center">
                                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                        <span class="ml-2 text-sm" style="color:white;">{{ __('Remember me') }} (チェック忘れずに)</span>
                                    </label>
                                </div>

                                <div class="col-12">
                                    @if (Route::has('password.request'))
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                            {{ __('Forgot your password?') }}
                                        </a>
                                    @endif
                                </div>

                                <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.6s">
                                    <button type="submit" class="more-btn">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="text-center" style="padding:30px 0 0 0">
                        <p>アカウント作成はこちら</p>
                    </div>
                    <form action="{{ route('register')}}" method="get" id="main_contact_form" novalidate>
                        <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.6s">
                            <button type="submit" class="more-btn">SignUp</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
