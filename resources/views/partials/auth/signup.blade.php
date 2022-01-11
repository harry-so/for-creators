<section class="section-padding-100 contact_us_area" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <div class="dream-dots justify-content-center fadeInUp" data-wow-delay="0.2s">
                            <span>Signup Now!</span>
                        </div>
                        <h2>Create New Account</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis accumsan nisi Ut ut felis congue nisl hendrerit commodo.</p>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8">
                    <div class="contact_form">
                        <form action="{{ route('register') }}" method="post" id="main_contact_form" novalidate>
                          @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div id="success_fail_info"></div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="group wow fadeInUp" data-wow-delay="0.3s">
                                        <input type="text" name="name" id="name" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Name</label>
                                    </div>
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
                                    <div class="group wow fadeInUp" data-wow-delay="0.4s">
                                        <input type="password" name="password_confirmation" id="password_confirmation" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Confirm Password</label>
                                    </div>
                                </div>
                                <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.6s">
                                    <button type="submit" class="more-btn">Sign Up</button>
                                </div>
                                <div class="col-12">
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                        {{ __('Already registered?') }}
                                    </a>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
