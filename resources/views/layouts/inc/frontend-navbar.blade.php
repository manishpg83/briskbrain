<body>
    <div id="loader">
        <div id="element">
            <div class="circ-one"></div>
            <div class="circ-two"></div>
        </div>
    </div>
    <div id="loader1">
        <div id="element1">
            <div class="circ-one1"></div>
            <div class="circ-two1"></div>
        </div>
    </div>
    <header>
        @php
            $setting = App\Models\Settings::find(1);
        @endphp
        <div class="header-top">
            <div class="container clearfix">
                <div class="lang-wrapper">
                    <ul class="phoneiconsec">
                        @if (optional($setting)->mobile)
                            <li><a href="tel:+91{{ $setting->mobile }}"><i class="fa fa-mobile-phone phoneicon"></i>+91
                                    {{ $setting->mobile }}</a></li>
                        @endif

                        @if (optional($setting)->email)
                            <li><a href="mailto:{{ $setting->email }}"><i class="fa fa-envelope mailicon"
                                        aria-hidden="true"></i>{{ $setting->email }}</a></li>
                        @endif
                    </ul>
                </div>

                <div class="clearfix right-block">
                    <ul class="follow-us">
                        <li><a href="https://www.facebook.com/BriskBrainTechnologies" target="_blank"><i
                                    class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li>
                            <a href="https://teams.microsoft.com/l/chat/0/0?users=manish.bhuvait@gmail.com" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-microsoft-teams" viewBox="0 0 16 16" style="margin-bottom: -3px;">
                                    <path
                                        d="M9.186 4.797a2.42 2.42 0 1 0-2.86-2.448h1.178c.929 0 1.682.753 1.682 1.682zm-4.295 7.738h2.613c.929 0 1.682-.753 1.682-1.682V5.58h2.783a.7.7 0 0 1 .682.716v4.294a4.197 4.197 0 0 1-4.093 4.293c-1.618-.04-3-.99-3.667-2.35Zm10.737-9.372a1.674 1.674 0 1 1-3.349 0 1.674 1.674 0 0 1 3.349 0m-2.238 9.488-.12-.002a5.2 5.2 0 0 0 .381-2.07V6.306a1.7 1.7 0 0 0-.15-.725h1.792c.39 0 .707.317.707.707v3.765a2.6 2.6 0 0 1-2.598 2.598z" />
                                    <path
                                        d="M.682 3.349h6.822c.377 0 .682.305.682.682v6.822a.68.68 0 0 1-.682.682H.682A.68.68 0 0 1 0 10.853V4.03c0-.377.305-.682.682-.682Zm5.206 2.596v-.72h-3.59v.72h1.357V9.66h.87V5.945z" />
                                </svg>
                            </a>
                        </li>
                        <li><a href="https://www.linkedin.com/company/briskbrain/" target="_blank"><i
                                    class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        <li><a href="https://twitter.com/BriskBrain2" target="_blank"><i class="fa fa-twitter"
                                    aria-hidden="true"></i></a></li>
                        <li><a href="https://www.instagram.com/briskbrain_technologies" target="_blank"><i class="fa fa-instagram"
                                    aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <nav class="navbar main-header navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    @if (optional($setting)->logo)
                        <img src="{{ optional($setting)->logo }}" class="img-logo" alt="">
                    @endif
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false"
                    aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                    <ul class="mr-auto navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/about') }}">About</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="{{ url('services') }}" class="nav-link dropdown-toggle">Services</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown2">
                                <div class="inner">
                                    <a class="dropdown-item" href="{{ url('laravel-development') }}"><i
                                            class="fa fa-angle-right" aria-hidden="true"></i>Laravel Development</a>
                                    <a class="dropdown-item" href="{{ url('yii-yii2-development') }}"><i
                                            class="fa fa-angle-right" aria-hidden="true"></i>Yii/Yii2 Framework
                                        Development</a>
                                    <a class="dropdown-item" href="{{ url('codeigniter-development') }}"><i
                                            class="fa fa-angle-right" aria-hidden="true"></i>CodeIgniter Development</a>
                                    <a class="dropdown-item" href="{{ url('python-development') }}"><i
                                            class="fa fa-angle-right" aria-hidden="true"></i>Python Development</a>
                                    <a class="dropdown-item" href="{{ url('magento-development') }}"><i
                                            class="fa fa-angle-right" aria-hidden="true"></i>Magento e-Commerce
                                        Development</a>
                                    <a class="dropdown-item" href="{{ url('wordpress-development') }}"><i
                                            class="fa fa-angle-right" aria-hidden="true"></i>WordPress Development</a>
                                    <a class="dropdown-item" href="{{ url('custom-php-development') }}"><i
                                            class="fa fa-angle-right" aria-hidden="true"></i>Custom PHP Development</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('portfolio') }}">Portfolio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('blog') }}">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('contact') }}">Contacts</a>
                        </li>
                    </ul>
                    <ul class="navbar-right d-flex">
                        <li><a href="#myModal" data-toggle="modal">Request an Enquiry</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        @if (session('message'))
            <div class="alert alert-danger">
                {{ session('message') }}
            </div>
        @endif
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <form action="{{ route('submit.form') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header request-header">
                            <button type="button" class="close btnclose" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title request-title text-align: center">Request an Enquiry</h4>
                        </div>
                        <div class="modal-body form-group row">
                            <div class="mb-3 col-md-6">
                                <label for="name">Your Name</label>
                                <input name="name" id="name" class="form-control" placeholder="Your Name"
                                    type="text" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email">Your Email Address</label>
                                <input name="email" id="email" placeholder="Email Address"
                                    class="form-control" type="email" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="designation">Your Designation</label>
                                <input name="designation" id="designation" class="form-control"
                                    placeholder="Your Designation" type="text" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="number">Your Contact Number</label>
                                <input name="number" id="number" class="form-control"
                                    placeholder="Your Contact Number" type="text" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="country">Your Country</label>
                                <input name="country" id="country" class="form-control" placeholder="Your Country"
                                    type="text" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="company">Your Company Name</label>
                                <input name="company" id="company" class="form-control"
                                    placeholder="Your Company Name" type="text" required>
                            </div>
                            <div class="mb-3 col-12">
                                <label for="requirement">Requirement Type</label>
                                <input name="requirement" id="requirement" placeholder="Requirement Type"
                                    class="form-control" type="text" required>
                            </div>
                            <div class="col-12">
                                <label for="description">Your Detail Requirements</label>
                                <textarea name="description" id="description" placeholder="Your Message" class="form-control"></textarea>
                            </div>
                            <div style="display: none;">
                                <input type="text" name="honeypot" id="honeypot" value="">
                            </div>
                            <div class="form-group" style="display: none;">
                                <label for="faxonly">Fax Only
                                    <input type="checkbox" name="faxonly" id="faxonly" />
                                </label>
                            </div>
                            <input type="hidden" id="foo" name="foo" value="1">
                            <input type="hidden" id="timestamp" name="timestamp" value="{{ time() }}">
                            <input type="hidden" name="recaptcha" id="recaptcha">
                            {{-- <div class="g-recaptcha" data-sitekey="{{config('services.recaptcha.sitekey')}}">
                            </div> --}}
                            {{-- <div class="g-recaptcha" data-sitekey="6Le-mhUpAAAAAFH6LsrK5EhxJt5PxtPnsUCvgX5t"></div>
                            --}}
                        </div>
                        <div class="modal-footer request-footer">
                            <button type="submit" id="submitBtn" class="btn btn-save">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>



    </header>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("foo").value = "2";
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("submitBtn").addEventListener("click", function(event) {
                if (!validateForm()) {
                    event.preventDefault();
                    return;
                }

                document.getElementById("loader1").style.display = "block";
            });

            function validateForm() {
                const inputs = document.querySelectorAll("#myModal input[required], #myModal textarea[required]");
                let isValid = true;

                for (let i = 0; i < inputs.length; i++) {
                    if (!inputs[i].value.trim()) {
                        inputs[i].reportValidity();
                        isValid = false;
                    }
                }

                const emailInput = document.getElementById('email');
                if (!emailInput.value.includes("@")) {
                    emailInput.setCustomValidity("Please enter a valid email address");
                    emailInput.reportValidity();
                    isValid = false;
                } else {
                    emailInput.setCustomValidity("");
                }

                return isValid;
            }
        });
    </script>
