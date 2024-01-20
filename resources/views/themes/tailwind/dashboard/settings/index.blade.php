@extends('theme::layouts.dashboard')


@section('content')
<h3 class=" pb-6" style="color: white; font-size: 24px; fontmy-family: Helvetica Neue; font-weight: 500; word-wrap: break-word">Settings</h3>
<div class="grid md:grid-cols-4">
    <div class="settings-nav md:border-r md:border-gray-500 md:pr-8">
        @include('theme::dashboard.settings.nav')
    </div>
    <div class="settings-content md:col-span-3 dark:text-white md:px-8">
        @include("theme::dashboard.settings.partials.$section")
    </div>
</div>
@endsection