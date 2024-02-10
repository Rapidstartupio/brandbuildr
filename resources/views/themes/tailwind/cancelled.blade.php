@extends('theme::layouts.app')

@section('content')

	<div class="dark:text-white pt-20 mx-auto text-center max-w-7xl">
		<h2 class="text-2xl">You no longer have an active subscription</h2>
		<p>Please <a href="{{ route('settings.billing') }}">Subscribe to a Plan</a> to continue using {{ setting('site.title') }}. Thanks!</p>
		<a href="{{ route('settings.billing') }}">View Plans</a>
	</div>

@endsection
