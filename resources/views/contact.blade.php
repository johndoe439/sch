<x-guest-layout>



    <main>
        <!-- Start main-content -->
        <section class="page-title" style="background-image: url(images/background/4.jpg)">
            <div class="auto-container">
                <div class="title-outer">
                    <h1 class="title">Contact</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="{{ route('welcome') }}">Home</a></li>
                        <li><a href="#">Pages</a></li>
                        <li>Contact</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- end main-content -->

        <!--Contact Details Start-->
        <section class="contact-details">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-6">
                        <div class="contact-details__right">
                            <div class="sec-title">
                                <span class="sub-title">Need any help?</span>
                                <h2>Get in touch with us</h2>
                                <div class="text">We are always ready to answer your questions and provide expert
                                    guidance on all your logistics needs. Whether you want more information about our
                                    services, need a quote, or wish to discuss a specific project, our experienced team
                                    is here to assist you. Reach out to us by phone, email, or via our website. We look
                                    forward to connecting with you and delivering the best logistics solutions for your
                                    business.</div>
                            </div>
                            <ul class="list-unstyled contact-details__info">
                                <li>
                                    <div class="icon">
                                        <span class="lnr-icon-phone-plus"></span>
                                    </div>
                                    <div class="text">
                                        <h6>Have any question?</h6>
                                        <a href="tel:+14433472146"><span>Free</span>+14433472146</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <span class="lnr-icon-envelope1"></span>
                                    </div>
                                    <div class="text">
                                        <h6>Write email</h6>
                                        <a
                                            href="mailto:support@planlogicssolutions.com">support@planlogicssolutions.com</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <span class="lnr-icon-location"></span>
                                    </div>
                                    <div class="text">
                                        <h6>Visit anytime</h6>
                                        <span>4200 Regent St Suite 200, Columbus, OH 43219, United States</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-6">
                        <div class="sec-title">
                            <span class="sub-title">Send us email</span>
                            <h2>Feel free to write</h2>
                        </div>
                        <!-- Contact Form -->
                        <form id="contact_form" name="contact_form" class="" method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label>Name <small>*</small></label>
                                        <input name="form_name" class="form-control" type="text"
                                            placeholder="Enter Name" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label>Email <small>*</small></label>
                                        <input name="form_email" class="form-control required email" type="email"
                                            placeholder="Enter Email" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label>Subject <small>*</small></label>
                                        <input name="form_subject" class="form-control required" type="text"
                                            placeholder="Enter Subject" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label>Phone</label>
                                        <input name="form_phone" class="form-control" type="text"
                                            placeholder="Enter Phone" />
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label>Message</label>
                                <textarea name="form_message" class="form-control required" rows="5" placeholder="Enter Message"></textarea>
                            </div>
                            <div class="mb-3">
                                <input name="form_botcheck" class="form-control" type="hidden" value="" />
                                <button type="submit" class="theme-btn btn-style-one"
                                    data-loading-text="Please wait..."><span class="btn-title">Send
                                        message</span></button>
                                <button type="reset" class="theme-btn btn-style-one"><span
                                        class="btn-title">Reset</span></button>
                            </div>
                        </form>
                        <!-- Contact Form Validation-->
                    </div>
                </div>
            </div>
        </section>
        <!--Contact Details End-->

        <!-- Divider: Google Map -->
    </main>

</x-guest-layout>
