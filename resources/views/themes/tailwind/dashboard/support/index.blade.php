@extends('theme::layouts.dashboard')


@section('content')
<h3 class=" pb-6" style="color: white; font-size: 24px; fontmy-family: Helvetica Neue; font-weight: 500; word-wrap: break-word">Support</h3>
<div class="grid md:grid-cols-4">
    <div class="settings-nav md:border-r md:border-gray-500 md:pr-8">
        @include('theme::dashboard.support.nav')
    </div>
    <div class="settings-content md:col-span-3 dark:text-white md:px-8 sm:pt-10 md:pt-0">
        @include("theme::dashboard.support.partials.$section")
    </div>
</div>
@endsection
