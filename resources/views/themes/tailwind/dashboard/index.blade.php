@extends('theme::layouts.dashboard')


@section('content')

<h3 style="color: white; font-size: 24px; fontmy-family: Helvetica Neue; font-weight: 500; word-wrap: break-word">Dashboard</h3>
@include('theme::dashboard.nav')

<div class="grid md:grid-cols-4 md:gap-6 mt-12">
	<div class="mb-12">
		@include('theme::dashboard.strategy-hub-nav')
	</div>
	<div class="md:col-span-3 md:border-l border-gray-400 pl-6 md:pl-12">
		<ol class="relative text-gray-500 border-s border-gray-200 dark:border-gray-700 dark:text-gray-400 hidden">
			<li class="pb-10 border-l border-wave-500 text-white">
				<div class="ms-6 md:ms-10">
					<span class="absolute flex items-center justify-center w-8 h-8 bg-wave-500 -start-4 ring-white dark:ring-wave-600 dark:bg-wave-500">
						<svg class="w-3.5 h-3.5 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
							<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
						</svg>
					</span>
					<h3 class="font-medium leading-tight">{{setting('onboard.step1_title')}}</h3>
					<p class="text-sm"></p>
					@if(setting('onboard.step1_video_link'))
					<div class="py-2 md:py-8">
						<video class="w-full h-auto max-w-full md:w-1/2" controls="true">
							<source src="{{setting('onboard.step1_video_link')}}">
							Your browser does not support the video tag.
						</video>
					</div>
					@endif
				</div>
			</li>
			<li class="pb-10 border-l border-white text-white">
				<div class="ms-6 md:ms-10">
					<span class="absolute flex items-center justify-center w-8 h-8 -start-4 border border-white bg-black">

					</span>
					<div class="flex space-x-6">
						<div>
							<h3 class="font-medium leading-tight">{{setting('onboard.step2_title')}}</h3>
							<p class="text-sm">{{setting('onboard.step2_description')}}</p>
						</div>
						<div>
							@if(setting('onboard.step2_cta'))
							<a href="{{setting('onboard.step2_cta')}}">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 bg-wave-500 p-1">
									<path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
								</svg>
							</a>
							@endif
						</div>
					</div>
				</div>
			</li>
			<li class="pb-10 border-l border-gray-400">
				<div class="ms-6 md:ms-10">
					<span class="absolute flex items-center justify-center w-8 h-8  -start-4 border border-gray-400 bg-black">

					</span>
					<div class="flex space-x-6">
						<div>
							<h3 class="font-medium leading-tight">{{setting('onboard.step3_title')}}</h3>
							<p class="text-sm">{{setting('onboard.step3_description')}}</p>
						</div>
						<div>
							@if(setting('onboard.step3_cta'))
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white p-1">
								<path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
							</svg>
							@endif
						</div>
					</div>
				</div>
			</li>
			<li class="pb-10 border-l border-gray-400">
				<div class="ms-6 md:ms-10">
					<span class="absolute flex items-center justify-center w-8 h-8  -start-4 border border-gray-400 bg-black">

					</span>
					<div class="flex space-x-6">
						<div>
							<h3 class="font-medium leading-tight">{{setting('onboard.step4_title')}}</h3>
							<p class="text-sm">{{setting('onboard.step4_description')}}</p>
						</div>
						<div>
							@if(setting('onboard.step4_cta'))
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white p-1">
								<path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
							</svg>
							@endif
						</div>
					</div>
				</div>
			</li>
			<li class="border-0 border-gray-400">
				<div class="ms-6 md:ms-10">
					<span class="absolute flex items-center justify-center w-8 h-8    -start-4 border border-gray-400 bg-black">

					</span>
					<div class="flex space-x-6">
						<div>
							<h3 class="font-medium leading-tight">{{setting('onboard.step5_title')}}</h3>
							<p class="text-sm">{{setting('onboard.step5_description')}}</p>
						</div>
						<div>
							@if(setting('onboard.step5_cta'))
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white p-1">
								<path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
							</svg>
							@endif
						</div>
					</div>
				</div>
			</li>
		</ol>
		<div class="text-end py-4">
			<button type="button" class="inline-flex items-center p-2 px-4 text-sm font-medium text-center text-white rounded dark:border-2 dark:border-gray-400 whitespace-nowrap h-full">
				Skip Launch
			</button>
		</div>
	</div>
</div>

@endsection
