@if (App::environment('local'))
    <script type="text/javascript" src="{{ URL::asset('asset/js/jquery-1.11.0.min.js') }}"></script>
    <script src="{{ URL::asset('asset/backend/js/jquery-ui-1.10.3.minimal.min.js') }}"></script>
    <script src="{{ URL::asset('asset/backend/js/bootstrap.js') }}"></script>
    <script src="{{ URL::asset('asset/js/angular/angular.js') }}"></script>
    <script src="{{ URL::asset('asset/js/angular/angular-resource.js') }}"></script>
    <script src="{{ URL::asset('asset/js/angular/angular-route.js') }}"></script>

    <script src="{{ URL::asset('asset/js/common/helpers.js') }}"></script>
    <script src="{{ URL::asset('asset/js/common/interceptors.js') }}"></script>
    <script src="{{ URL::asset('asset/js/common/directives.js') }}"></script>
    <script src="{{ URL::asset('asset/js/common/filters.js') }}"></script>
    <script src="{{ URL::asset('asset/js/editor/app.js') }}"></script>
    <script src="{{ URL::asset('asset/js/editor/services.js') }}"></script>
    <script src="{{ URL::asset('asset/js/editor/filters.js') }}"></script>
    <script src="{{ URL::asset('asset/js/editor/controllers.js') }}"></script>
@else
    <script src="{{ URL::asset('asset/js/application/global.min.js') }}"></script>
    <script src="{{ URL::asset('asset/js/application/editor.min.js') }}"></script>
@endif