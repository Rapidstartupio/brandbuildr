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

@endsection