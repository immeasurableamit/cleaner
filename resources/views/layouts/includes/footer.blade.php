<footer id="footer">
        <div class="container">
            <div class="footer-logo">
                <a href="{{ route('index') }}"><img src="{{asset('assets/images/logo/footer-logo.svg')}}"></a>
            </div>
            <div class="footer-flex">
                <div class="footer-widget footer-widget-first">
                    <div class="join-news-letter">
                        <h2>join our newsletter</h2>
                        <div class="newsletter-form">
                            <form>
                                <div class="position-relative newsletter-frm-div">
                                    <input type="email" placeholder="Enter your email address">
                                    <button type="submit" class="subscrie-btn">Subscribe</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="footer-widget footer-widget-second">
                    <div class="quick-links">
                        <h5>Quick Links</h5>
                        <ul class="list-unstyled">
                            <li><a href="{{route('index')}}">Home</a></li>
                            <li><a href="{{route('signup-cleaner')}}">Become a Cleaner</a></li>
                            <li><a href="{{route('search-result')}}">Browse Cleaners</a></li>
                            <li><a href="{{route('help-center')}}">Help</a></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-widget footer-widget-third">
                    <div class="folow-us">
                        <ul class="list-unstyled d-flex">
                            <li><span>Follow Us</span></li>
                            <li><a href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook"></i></a></li>
                            <li><a href="https://twitter.com/" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
                            <li><a href="https://www.instagram.com/" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                            <li><a href="https://in.linkedin.com/" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right-sec text-center">
            <div class="container">
                <p>Copyright © Canary Clean 2022 all rights reserved</p>
            </div>
        </div>
    </footer>
