<?php $site = Theme::get('site'); ?>
<!-- Footer -->
<footer id="footer">
    <ul class="actions">
        <li><a href="#" class="fa solo fa-twitter"><span>Twitter</span></a></li>
        <li><a href="#" class="fa solo fa-facebook"><span>Facebook</span></a></li>
        <li><a href="#" class="fa solo fa-google-plus"><span>Google+</span></a></li>
    </ul>
    <!-- Menu -->
    <ul class="menu">
        <li>&copy; Untitled</li>
        <li>Design: <a href="http://html5up.net/">HTML5 UP</a></li>
    </ul>
</footer>
@if (!$site->inEditMode())
{{Theme::asset()->scripts();}}
@endif
@yield('scripts')
<script type="text/javascript" src="{{ $site->urlTo('assets/js/jquery.poptrox.min.js') }}"></script>
<script type="text/javascript" src="{{ $site->urlTo('assets/js/skel.min.js') }}"></script>
<script type="text/javascript" src="{{ $site->urlTo('assets/js/init.js') }}"></script>
