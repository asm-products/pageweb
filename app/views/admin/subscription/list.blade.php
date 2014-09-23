@extends('layouts.admin-dashboard')
@section('title', 'Admin Subscription Manager')

@section('content')
<h2>Subscription Pages </h2>

<table class="table-bordered table">
    <thead>
        <tr>
            <th style="width: 20%;text-align: left">PageTitle</th>
            <th style="width: 30%;text-align: left">About</th>
            <th style="width: 20%;text-align: left">Plan On</th>
            <th style="width: 20%;text-align: left">isPublish</th>
            <th style="width: 20%;text-align: left">SubscriptionIsActive</th>
        </tr>
    </thead>
    <tbody>
    @foreach($list as $subscription)

        <tr>
            <td>{{$subscription->page->title}}</td>
            <td>{{$subscription->page->about}}</td>
            <td>{{$subscription->plan->title}}</td>
            <td>{{ ($subscription->page->is_publish == 1) ? 'True' : 'False' }}</td>
            <td>{{ ($subscription->stripe_active == 1) ? 'True' : 'False' }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

{{$list->links()}}

@stop
