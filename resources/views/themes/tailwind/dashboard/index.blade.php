@extends('theme::layouts.dashboard')


@section('content')

<h3 style="color: white; font-size: 24px; fontmy-family: Helvetica Neue; font-weight: 500; word-wrap: break-word">Dashboard</h3>

<div class="grid md:grid-cols-4 md:gap-6 mt-12">
	<div class="mb-12">
		@include('theme::dashboard.strategy-hub-nav')
	</div>
	<div class="md:col-span-3 md:border-l border-gray-400 pl-6 md:pl-12">
		<div class="grid sm:grid-cols-2 gap-8">
			<div class="text-white border-dashed border border-wave-500 py-12 text-center rounded-xl">
				<div class="">
					<a href="/projects/create" class="">
						<div class="bg-wave-500 w-min p-3  rounded-lg inline-flex flex-col items-center">

							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" data-slot="icon" class="w-6 h-6">
								<path stroke-linecap=" round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
							</svg>

						</div>
					</a>
				</div>
				<div>
					<span class="text-xl">Strategy</span>
				</div>
			</div>
			<div class="text-white border-dashed border border-gray-500 py-12 text-center rounded-xl	">
				<div class="">
					<a href="/projects/clients/create" class="">
						<div class="bg-gray-500 w-min p-3  rounded-lg inline-flex flex-col items-center">

							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" data-slot="icon" class="w-6 h-6">
								<path stroke-linecap=" round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
							</svg>

						</div>
					</a>
				</div>
				<div>
					<span class="text-xl">Client</span>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection