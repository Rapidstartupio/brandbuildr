@extends('theme::layouts.dashboard')


@section('content')
	<h3 style="color: white; font-size: 24px; fontmy-family: Helvetica Neue; font-weight: 500; word-wrap: break-word">Dashboard</h3>
	<div class="dark:text-white my-6">
		<div class="text-sm font-medium text-center text-gray-500 dark:text-gray-400 md:flex">
			<ul class="flex flex-wrap -mb-px text-lg">
				<li class="mr-10">
					<a href="#" class="inline-block   py-2 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Strategy Hub</a>
				</li>
				<li class="mr-10">
					<a href="#" class="inline-block  py-2 text-blue-600 border-b-2 border-white rounded-t-lg active dark:text-white dark:border-white" aria-current="page">In Progress</a>
				</li>
				<li class="mr-10">
					<a href="#" class="inline-block  py-2 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Completed</a>
				</li>
			</ul>
			<div class="md:flex-auto mt-5 md:mt-0">
				<button type="button" class=" md:float-right text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-[#570AFF] dark:hover:bg-[#4E09E6] focus:outline-none dark:focus:ring-blue-800"><span class="md:px-4 font-bold">+</span> New Project</button>
			</div>
		</div>
	</div>
	
	<div id="filters" class="md:flex">
		<div class="dates mr-4">
			<div class="relative max-w-sm">
				<div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
					<svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
					<path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
					</svg>
				</div>
				<input datepicker type="text" class="  text-gray-900 text-sm rounded  block  pl-10 p-2.5   dark:placeholder-gray-400 dark:text-white  border-0 brandDark2" placeholder="Select dates">
			</div>
		</div>
		<div class="client mr-4">
			
			<div class="relative max-w-sm">
				<div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
					<path d="M9.99992 3.33301C10.884 3.33301 11.7318 3.6842 12.3569 4.30932C12.9821 4.93444 13.3333 5.78229 13.3333 6.66634C13.3333 7.5504 12.9821 8.39824 12.3569 9.02336C11.7318 9.64849 10.884 9.99967 9.99992 9.99967C9.11586 9.99967 8.26802 9.64849 7.6429 9.02336C7.01777 8.39824 6.66659 7.5504 6.66659 6.66634C6.66659 5.78229 7.01777 4.93444 7.6429 4.30932C8.26802 3.6842 9.11586 3.33301 9.99992 3.33301ZM9.99992 4.99967C9.55789 4.99967 9.13397 5.17527 8.82141 5.48783C8.50885 5.80039 8.33325 6.22431 8.33325 6.66634C8.33325 7.10837 8.50885 7.53229 8.82141 7.84485C9.13397 8.15741 9.55789 8.33301 9.99992 8.33301C10.4419 8.33301 10.8659 8.15741 11.1784 7.84485C11.491 7.53229 11.6666 7.10837 11.6666 6.66634C11.6666 6.22431 11.491 5.80039 11.1784 5.48783C10.8659 5.17527 10.4419 4.99967 9.99992 4.99967ZM9.99992 10.833C12.2249 10.833 16.6666 11.9413 16.6666 14.1663V16.6663H3.33325V14.1663C3.33325 11.9413 7.77492 10.833 9.99992 10.833ZM9.99992 12.4163C7.52492 12.4163 4.91659 13.633 4.91659 14.1663V15.083H15.0833V14.1663C15.0833 13.633 12.4749 12.4163 9.99992 12.4163Z" fill="#B6B6B8"/>
					</svg>
				</div>
				<input type="text" class="  text-gray-900 text-sm rounded  block  pl-10 p-2.5   dark:placeholder-gray-400 dark:text-white  border-0 brandDark2" placeholder="Clients">
			</div>
		</div>
		<div class="project-type mr-4">
			<div class="relative max-w-sm">
				<div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
					<path d="M4.99992 1.66699C4.55789 1.66699 4.13397 1.84259 3.82141 2.15515C3.50885 2.46771 3.33325 2.89163 3.33325 3.33366V16.667C3.33325 17.109 3.50885 17.5329 3.82141 17.8455C4.13397 18.1581 4.55789 18.3337 4.99992 18.3337H14.9999C15.4419 18.3337 15.8659 18.1581 16.1784 17.8455C16.491 17.5329 16.6666 17.109 16.6666 16.667V6.66699L11.6666 1.66699H4.99992ZM4.99992 3.33366H10.8333V7.50033H14.9999V16.667H4.99992V3.33366ZM6.66659 10.0003V11.667H13.3333V10.0003H6.66659ZM6.66659 13.3337V15.0003H10.8333V13.3337H6.66659Z" fill="#B6B6B8"/>
					</svg>
				</div>
				<input type="text" class="  text-gray-900 text-sm rounded  block  pl-10 p-2.5   dark:placeholder-gray-400 dark:text-white  border-0 brandDark2" placeholder="Project Type">
			</div>
		</div>

	</div>

	<div id="projects-list">
		<div class="grid grid-cols-3  dark:text-white my-5 space-x-4">
			<div class="brandDark2 p-4 rounded">
				RedBull Project
			</div>
			<div class="brandDark2 p-4 rounded">
				RedBull Project
			</div>
			<div class="brandDark2 p-4 rounded">
				RedBull Project
			</div>
		</div>
	</div>

@endsection
