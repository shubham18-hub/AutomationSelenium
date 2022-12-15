<?php include('user\includes\header.php'); ?>

    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Contact Us</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Contact Us</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_phone"></span>
                        <h4>Phone</h4>
                        <p>+91 8171143302</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_pin_alt"></span>
                        <h4>Address</h4>
                        <p>Anandpur, Haldwani, Nainital
                            Uttarakhand, India
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_clock_alt"></span>
                        <h4>Open time</h4>
                        <p>24x7</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_mail_alt"></span>
                        <h4>Email</h4>
                        <p>bakhali@proton.me</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="map">
        <iframe
            src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA-KgwHNdNWAXfedd2MlUuWhDON4jx1JGw &q=place_id:GhIJkqmCUUkrPUARbQ22InvdU0A"
            height="500" style="border:0;" allowfullscreen="" referrerpolicy="no-referrer-when-downgrade" aria-hidden="false" tabindex="0"></iframe>
        <div class="map-inside">
            <div class="inside-widget">
                <h4>Haldwani</h4>
                <ul>
                    <li>Phone: +91 8171143302</li>
                    <li>Add: P.O. + Village Anandpur, Haldwani</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>Leave Message</h2>
                    </div>
                </div>
            </div>
            <form action="#">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <input type="text" placeholder="Your name">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="text" placeholder="Your Email">
                    </div>
                    <div class="col-lg-12 text-center">
                        <textarea placeholder="Your message"></textarea>
                        <button type="submit" class="site-btn">SEND MESSAGE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php
    include('user\includes\footer.php');
    ?>