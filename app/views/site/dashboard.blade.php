@extends ('layouts/dashboard')

@section ('content')
<div class="page-header">
    <h3>{{ $site->name }} :Dashboard</h3>
</div>

<div class="list-group">
    <a class="list-group-item" href="{{ URL::route('sites.editor', ['site_id' => $site->getId()]) }}">Editor</a>
    <a class="list-group-item" href="{{ URL::route('sites.subscription.plans', ['site_id' => $site->getId()]) }}">Subscribe</a>
    <a class="list-group-item" href="{{ URL::route('sites.subscription.upgrade', ['site_id' => $site->getId()]) }}">Upgrade Subscription</a>
    <a class="list-group-item" href="{{ URL::route('sites.subscription.cancel', ['site_id' => $site->getId()]) }}">Cancel Subscription</a>
</div>
@stop