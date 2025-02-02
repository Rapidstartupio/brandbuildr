@extends('theme::layouts.app')

@section('content')

<div class="py-20 pricing-page">
    <div class="sm:mx-auto sm:w-full sm:max-w-5xl">

        <h1 class="max-w-md text-xl font-normal text-white mx-auto lg:max-w-none lg:text-2xl text-center">Ready to Get Started?</h1>
        <p class="max-w-md mx-auto mt-4 text-lg text-gray-500 lg:max-w-none lg:text-xl text-center">Choose a plan tailored to your needs</p>
        <p class="max-w-md mx-auto mt-4 text-lg text-gray-500 lg:max-w-none lg:text-xl text-center wp-plan-page"><a href="https://brandbuildr.ai/pricing"><< Back to Pricing Options</a></p>

    </div>

    @include('theme::partials.plans')
</div>


@endsection
