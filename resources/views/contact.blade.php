@extends('layouts.app')
@section('title', $title)
@section('meta-title', $metaTitle)
@section('meta-description', $metaDescription)
@section('meta-keywords', $metaKeywords)

@section('og-locale', $ogLocale ?? 'en_US')
@section('og-type', $ogType ?? 'website')
@section('og-site-name', $ogSiteName ?? 'BriskBrain')
@section('og-url', $ogUrl ?? url()->current())
@section('og-title', $ogTitle ?? $metaTitle)
@section('og-description', $ogDescription ?? $metaDescription)

@section('content')
    <section class="banner-section contact-banner">
        <div class="container">
            <div class="contents">
                <h1>Contact Us</h1>
                <p>Do you want to discuss your project with us? Well, give us a call, send us an email or fill out below
                    form.</p>
            </div>
        </div>
    </section>
    <section class="contact-wrapper-outer">
        <div class="container">
            <div class="row">
                <div class="col-md-8 form-area">
                    <div class="contact-form-wrapper padding-lg">
                        <form name="contact-form" id="ContactForm" action="{{ route('contact.submit') }}"
                            enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Your Name</label>
                                        <input name="name" class="form-control" placeholder="" type="text" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input name="email" class="form-control" placeholder="" type="email" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Contact No</label>
                                        <input name="contact" class="form-control" placeholder="" type="text" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Subject</label>
                                        <input name="subject" class="form-control" placeholder="" type="text" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Message</label>
                                        <textarea name="message" class="form-control" placeholder=""></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group captchasection">
                                        <div class="my_captcha"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button class="btn submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-info-wrapper padding-lg">
                        <div class="contact-info">
                            <h3>Contact Info</h3>
                            <ul class="info-contact-box">
                                <li>
                                    <p>E-1205, Ganesh Glory 11,</p>
                                    <p>Jagatpur Road,</p>
                                    <p>Off S. G. Highway,</p>
                                    <p>Ahmedabad,
                                    <p>
                                    <p>Gujarat - 382470</p>
                                </li>
                                <li>
                                    <p>+91 942 888 9935</p>
                                </li>
                                <li>
                                    <a href="mailto:devanshu.briskbrain@gmail.com">hello@briskbraintech.com</a>
                                </li>
                            </ul>
                        </div>
                        <div class="social-media-box">
                            <h6><span>Connect with</span></h6>
                            <ul>
                                <li><a href="https://www.facebook.com/BriskBrainTechnologies/" target="_blank"><i
                                            class="fa fa-facebook"></i></a></li>
                                <li><a href="https://twitter.com/BriskBrain2" target="_blank"><i
                                            class="fa fa-twitter"></i></a></li>
                                <li><a href="https://www.linkedin.com/company/briskbrain/" target="_blank"><i
                                            class="fa fa-linkedin"></i></a></li>
                                <li>
                                    <a href="https://www.instagram.com/briskbrain_technologies" target="_blank">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="contact-map">
        <div class="msg-box">
            <p><i class="fa fa-mouse-pointer" aria-hidden="true"></i> click and scroll to zoom the map</p>
        </div>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14678.165092320489!2d72.5412793!3d23.1138826!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xde25685d973da59f!2sBriskBrain%20Technologies!5e0!3m2!1sen!2sin!4v1641182474649!5m2!1sen!2sin"
            style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById("ContactForm");
            const loader = document.getElementById("loader1");
            const submitBtn = document.querySelector('.submit');

            function checkForm() {
                const inputs = form.querySelectorAll('input');
                let isFilled = true;

                inputs.forEach(input => {
                    if (input.type !== 'submit' && input.value.trim() === '') {
                        isFilled = false;
                    }
                });

                if (isFilled) {
                    submitBtn.disabled = false;
                } else {
                    submitBtn.disabled = true;
                }
            }

            // Check form on input change
            form.addEventListener('input', checkForm);

            // Check form on page load
            checkForm();

            form.addEventListener("submit", function(event) {
                loader.style.display = "block";
            });
        });
    </script>

@endsection
