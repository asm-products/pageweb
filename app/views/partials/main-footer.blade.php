<footer id="footer">
    <section class="section top">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <h4>Company</h4>
                    <ul class="footer-link pull-left">
                        <li><a href="{{ url('about') }}">About Us</a></li>
                        <li><a href="#">Partners</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms &amp; Conditions</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h4>Product</h4>
                    <ul class="footer-link pull-left">
                        <li><a href="#">Features</a></li>
                        <li><a href="{{ url('faq') }}">FAQ</a></li>
                        <li><a href="{{ url('pricing') }}">Pricing</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h4>Participate</h4>
                    <ul class="footer-link pull-left">
                        <li><a href="#">Suggest a Feature</a></li>
                        <li><a href="#">Report a Bug</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Developers API</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h4>Get Social</h4>
                    <ul class="footer-link pull-left">
                        <li><a href="http://facebook.com/pagewebapp"><i class="fa fa-facebook-square"></i> Facebook</a></li>
                        <li><a href="http://twitter.com/pagewebapp"><i class="fa fa-twitter-square"></i> Twitter</a></li>
                        <li><a href="#"><i class="fa fa-google-plus-square"></i> Google+</a></li>
                        <li><a href="#"><i class="fa fa-youtube-square"></i> Youtube</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <div class="widget">
                        <div class="contacts">
                            <div class="contacts-item"> 
                                <span class="contacts-item-value">
                                    <a href="{{ URL::route('login', ['provider' => 'facebook']) }}"><button class="btn btn-lg btn-primary"><strong>Start Now, Free</strong><br>(upgrade anytime you want)</button></a>
                                </span> 
                            </div>
                            <div class="contacts-item">
                                <span class="contacts-item-value">
                                    <div class="copyright">&copy; 2014 All rights reserved. <a href="http://pageweb.co/">PageWeb</a></div>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</footer>