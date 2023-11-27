@extends('theme::layouts.dashboard')


@section('content')

<h3 style="color: white; font-size: 24px; fontmy-family: Helvetica Neue; font-weight: 500; word-wrap: break-word">Dashboard</h3>
<div class="dark:text-white my-6">
	<div class="text-sm font-medium text-center text-gray-500 dark:text-gray-400 md:flex">
		<ul class="flex flex-wrap -mb-px text-lg">
			<li class="mr-10">
				<a href="#" class="inline-block  py-2 text-blue-600 border-b-2 border-white rounded-t-lg active dark:text-white dark:border-white" aria-current="page">Strategy Hub</a>
			</li>
			<li class="mr-10">
				<a href="#" class="inline-block  py-2 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Deadlines</a>
			</li>
		</ul>
	</div>
</div>

<div class="grid md:grid-cols-4 md:gap-6 mt-12">
	<div class="mb-12">
		<ul class="dark:text-gray-400 text-xl">
			<a href="#" class="border-b border-gray-400 py-3 flex justify-between text-white">
				<span>Get Started</span>
				<span>
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 bg-wave-500 p-1">
						<path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
					</svg>
				</span>
			</a>
			<a href="#" class="border-b border-gray-400 py-3 flex justify-between">
				<span>Explore Strategies</span>
				<span>
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 p-1">
						<path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
					</svg>
				</span>
			</a>
		</ul>
	</div>
	<div class="md:col-span-3 md:border-l border-gray-400 pl-6 md:pl-12">
		<ol class="relative text-gray-500 border-s border-gray-200 dark:border-gray-700 dark:text-gray-400">
			<li class="pb-10 border-l border-wave-500">
				<div class="ms-6 md:ms-10">
					<span class="absolute flex items-center justify-center w-8 h-8 bg-wave-500 -start-4 ring-white dark:ring-wave-600 dark:bg-wave-500">
						<svg class="w-3.5 h-3.5 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
							<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
						</svg>
					</span>
					<h3 class="font-medium leading-tight">Watch Video</h3>
					<p class="text-sm"></p>
					<div class="py-2 md:py-8">
						<video class="w-full h-auto max-w-full md:w-1/2" controls>
							<source src="https://brandbuildr.rapidexecutive.com/storage/themes/August2023/ymUAl8z6RnA7NejYxRBU.png" type="video/mp4">
							Your browser does not support the video tag.
						</video>
					</div>
				</div>
			</li>
			<li class="pb-10 border-l border-white text-white">
				<div class="ms-6 md:ms-10">
					<span class="absolute flex items-center justify-center w-8 h-8 -start-4 border border-white bg-black">

					</span>
					<div class="flex space-x-6">
						<div>
							<h3 class="font-medium leading-tight">Set up Profile</h3>
							<p class="text-sm">Lorem ipsum dolor sit amet consectetur. Turpis nisl feugiat lectus id neque sapien.</p>
						</div>
						<div>
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 bg-wave-500 p-1">
								<path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
							</svg>

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
							<h3 class="font-medium leading-tight">Add First Client</h3>
							<p class="text-sm">Lorem ipsum dolor sit amet consectetur. Turpis nisl feugiat lectus id neque sapien.</p>
						</div>
						<div>
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white p-1">
								<path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
							</svg>

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
							<h3 class="font-medium leading-tight">Explore Strategies</h3>
							<p class="text-sm">Lorem ipsum dolor sit amet consectetur. Turpis nisl feugiat lectus id neque sapien.</p>
						</div>
						<div>
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white p-1">
								<path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
							</svg>

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
							<h3 class="font-medium leading-tight">Start First Project</h3>
							<p class="text-sm">Lorem ipsum dolor sit amet consectetur. Turpis nisl feugiat lectus id neque sapien.</p>
						</div>
						<div>
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white p-1">
								<path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
							</svg>

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