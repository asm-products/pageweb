@extends('layouts.main')
@section('title', 'Welcome')
@section('content')

<section class="section bg-primary-darken overflow bg-overlay">
    <div class="container">
        <div class="row">
            <div class="col-md-6  col-md-offset-3 topindex">
                <h2 class="text-center"><strong>PageWeb</strong></h2>
                <h3 class="sub-title text-center">Create Amazing & Self-Updating Websites from your Facebook Page & other Social Networks Instantly</h3><br>
                <form action="{{ URL::route('sites.create.preview') }}" method="post">
                    <div class="input-group">
                        <span class="input-group-btn">
                            <button class="btn btn-lg btn-facebook" type="button"><i class="fa fa-facebook"></i></button>
                        </span>
                        <input  type="text" name="url" placeholder="Enter Your Facebook Page URL" class="form-control input-lg bg-white" />
                        <span class="input-group-btn">
                            <button class="btn btn-lg btn-danger" type="submit">Preview</button>
                        </span>
                    </div>	
                </form>
            </div>
            <div class="col-md-12">
                <div class="img-stack" style="display:block">
                    <img alt="" src="{{ URL::asset('asset/img/front/st1.png') }}" class="img-responsive animated" data-effect="fadeInUp">
                    <img alt="" src="{{ URL::asset('asset/img/front/st2.png') }}" class="img-responsive img-bottom animated" data-effect="fadeInUp" data-start="300">
                    <img alt="" src="{{ URL::asset('asset/img/front/st3.png') }}" class="img-responsive img-bottom animated" data-effect="fadeInUp" data-start="1200">
                    <img alt="" src="{{ URL::asset('asset/img/front/st4.png') }}" class="img-responsive img-bottom animated" data-effect="fadeInUp" data-start="900">
                    <img alt="" src="{{ URL::asset('asset/img/front/st5.png') }}" class="img-responsive img-bottom animated" data-effect="fadeInUp" data-start="600">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section bg-gray-lighter-lighten">
    <div class="container">
        <div class="col-md-12 text-center animated" data-effect="fadeInUp">
            <h2>What <strong>You Get</strong></h2>
            <h3 class="sub-title">We have done a lot of things, and put them inside squared boxes for you</h3>
        </div>
        <div class="col-md-6">
            <br>
            <div class="service-item  animated" data-effect="fadeInDown">
                <span class="fa-stack fa-3x">
                    <i class="fa fa-circle fa-stack-2x color-theme"></i>
                    <i class="fa fa-cog fa-stack-1x color-white"></i>
                </span>
                <h4>Self-updating Website</h4>
                <p>Save yourself hours. Every update your make on your Facebook Page automatically updates your website</p>
            </div>
            <div class="service-item  animated" data-effect="fadeInUp">
                <span class="fa-stack fa-3x">
                    <i class="fa fa-circle fa-stack-2x color-purple"></i>
                    <i class="fa fa-users fa-stack-1x color-white"></i>
                </span>
                <h4>Get More Traffic</h4>
                <p>Give people another options to find out what you are doing. Appear high in search engines</p>
            </div>
            <div class="service-item  animated" data-effect="fadeInRight"> 
                <span class="fa-stack fa-3x">
                    <i class="fa fa-circle  fa-stack-2x  color-inverse"></i>
                    <i class="fa fa-dashboard fa-stack-1x color-white"></i>
                </span>
                <h4>Custom Domains</h4>
                <p>Give your readers something short and easy to remember with a .com, .net, .org., .me, or .co domain name.</p>
            </div>
        </div>
        <div class="col-md-6">
            <br>
            <div class="service-item  animated" data-effect="fadeInRight"> 
                <span class="fa-stack fa-3x">
                    <i class="fa fa-circle  fa-stack-2x  color-primary"></i>
                    <i class="fa fa-money fa-stack-1x color-white"></i>
                </span>
                <h4>Save Money</h4>
                <p>Starting with just $8 a month, you can save a lot from a website that you barely visit and update.</p>
            </div>
            <div class="service-item  animated" data-effect="fadeInLeft">
                <span class="fa-stack fa-3x">
                    <i class="fa fa-circle  fa-stack-2x color-darkorange"></i>
                    <i class="fa fa-mobile-phone fa-stack-1x color-white"></i>
                </span>
                <h4>Go Mobile</h4>
                <p>Today everything is mobile - now you can be too! Once you create a website, a matching mobile site will automatically be generated.</p>
            </div>
            <div class="service-item  animated" data-effect="fadeInUp">
                <span class="fa-stack fa-3x">
                    <i class="fa fa-circle  fa-stack-2x color-theme"></i>
                    <i class="fa fa-lock fa-stack-1x color-white"></i>
                </span>
                <h4>Safe and Secure </h4>
                <p>Your site is hosted on our servers spread across multiple data centers. That way, it’s super fast and always available.</p>
            </div>
        </div>
    </div>
</section>
@stop
