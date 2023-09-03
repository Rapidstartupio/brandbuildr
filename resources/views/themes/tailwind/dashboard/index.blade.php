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
				<a href="#" class="inline-block  py-2 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Completed Projects</a>
			</li>
		</ul>
		@if(true)
		<div class="text-left md:flex-auto mt-5 md:mt-0">
			<a href="{{route('projects.create')}}">
				<button type="button" class=" md:float-right text-white bg-blue-700  hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-[#570AFF] dark:hover:bg-[#4E09E6] focus:outline-none dark:focus:ring-blue-800"><span class="md:px-4 font-bold">+</span> New Project</button>
			</a>
		</div>
		@endif
	</div>
</div>

@if($projects)
<div id="filters" class="lg:flex space-y-2 lg:space-y-0">
	<div class="dates mr-4">
		<div class="relative max-w-sm">
			<div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
				<svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
					<path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
				</svg>
			</div>
			<input datepicker type="text" class="  text-gray-900 text-sm rounded  block  pl-10 p-2.5   dark:placeholder-gray-400 dark:text-white  border-0 brandDark2" placeholder="Select dates">
		</div>
	</div>
	<div class="client mr-4">

		<div class="relative max-w-sm">
			<div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
				<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
					<path d="M9.99992 3.33301C10.884 3.33301 11.7318 3.6842 12.3569 4.30932C12.9821 4.93444 13.3333 5.78229 13.3333 6.66634C13.3333 7.5504 12.9821 8.39824 12.3569 9.02336C11.7318 9.64849 10.884 9.99967 9.99992 9.99967C9.11586 9.99967 8.26802 9.64849 7.6429 9.02336C7.01777 8.39824 6.66659 7.5504 6.66659 6.66634C6.66659 5.78229 7.01777 4.93444 7.6429 4.30932C8.26802 3.6842 9.11586 3.33301 9.99992 3.33301ZM9.99992 4.99967C9.55789 4.99967 9.13397 5.17527 8.82141 5.48783C8.50885 5.80039 8.33325 6.22431 8.33325 6.66634C8.33325 7.10837 8.50885 7.53229 8.82141 7.84485C9.13397 8.15741 9.55789 8.33301 9.99992 8.33301C10.4419 8.33301 10.8659 8.15741 11.1784 7.84485C11.491 7.53229 11.6666 7.10837 11.6666 6.66634C11.6666 6.22431 11.491 5.80039 11.1784 5.48783C10.8659 5.17527 10.4419 4.99967 9.99992 4.99967ZM9.99992 10.833C12.2249 10.833 16.6666 11.9413 16.6666 14.1663V16.6663H3.33325V14.1663C3.33325 11.9413 7.77492 10.833 9.99992 10.833ZM9.99992 12.4163C7.52492 12.4163 4.91659 13.633 4.91659 14.1663V15.083H15.0833V14.1663C15.0833 13.633 12.4749 12.4163 9.99992 12.4163Z" fill="#B6B6B8" />
				</svg>
			</div>
			<input type="text" class="  text-gray-900 text-sm rounded  block  pl-10 p-2.5   dark:placeholder-gray-400 dark:text-white  border-0 brandDark2" placeholder="Clients">
		</div>
	</div>
	<div class="project-type mr-4">
		<div class="relative max-w-sm">
			<div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
				<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
					<path d="M4.99992 1.66699C4.55789 1.66699 4.13397 1.84259 3.82141 2.15515C3.50885 2.46771 3.33325 2.89163 3.33325 3.33366V16.667C3.33325 17.109 3.50885 17.5329 3.82141 17.8455C4.13397 18.1581 4.55789 18.3337 4.99992 18.3337H14.9999C15.4419 18.3337 15.8659 18.1581 16.1784 17.8455C16.491 17.5329 16.6666 17.109 16.6666 16.667V6.66699L11.6666 1.66699H4.99992ZM4.99992 3.33366H10.8333V7.50033H14.9999V16.667H4.99992V3.33366ZM6.66659 10.0003V11.667H13.3333V10.0003H6.66659ZM6.66659 13.3337V15.0003H10.8333V13.3337H6.66659Z" fill="#B6B6B8" />
				</svg>
			</div>
			<input type="text" class="  text-gray-900 text-sm rounded  block  pl-10 p-2.5   dark:placeholder-gray-400 dark:text-white  border-0 brandDark2" placeholder="Project Type">
		</div>
	</div>

</div>

<div id="projects-list">
	<div class="grid md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-6 dark:text-white my-5">
		@foreach($projects as $project)
		<div class="brandDark2 p-4 rounded space-y-5">
			<div class="md:flex justify-between">
				<div class="">{{$project->name}}</div>
				<div class="dark:text-gray-400 text-sm">{{$project->type->name}}</div>
			</div>
			<div>
				<p class="text-xs font-light">0% Completed</p>
			</div>
			<div class="w-full bg-[#838396] rounded-full h-1.5 dark:bg-[#838396]">
				<div class="bg-[#570AFF] h-1.5 rounded-full dark:bg-[#570AFF]" style="width: 0%"></div>
			</div>
			<div>
				<p class="text-xs font-light">{{$project->description}}</p>
			</div>
			<div class="flex justify-between">
				<div>
					<button type="button" class="focus:outline-none rounded-lg text-gray-900 bg-[#9BDAB4] hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-2     dark:bg-[#9BDAB4] dark:hover:bg-green-700 dark:focus:ring-green-800">RedBull</button>
				</div>
				<div class="dark:text-gray-400 flex items-center">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
						<path d="M15.8333 2.49967H15V0.833008H13.3333V2.49967H6.66667V0.833008H5V2.49967H4.16667C3.72464 2.49967 3.30072 2.67527 2.98816 2.98783C2.67559 3.30039 2.5 3.72431 2.5 4.16634V15.833C2.5 16.275 2.67559 16.699 2.98816 17.0115C3.30072 17.3241 3.72464 17.4997 4.16667 17.4997H15.8333C16.7583 17.4997 17.5 16.758 17.5 15.833V4.16634C17.5 3.72431 17.3244 3.30039 17.0118 2.98783C16.6993 2.67527 16.2754 2.49967 15.8333 2.49967ZM15.8333 15.833H4.16667V7.49967H15.8333V15.833ZM15.8333 5.83301H4.16667V4.16634H15.8333V5.83301Z" fill="#838396" />
					</svg>
					<span>{{$project->created_at->format('d/m/Y')}}</span>
				</div>
			</div>
			<div class="flex justify-end">
				<a href="{{route('project.details',$project->id )}}" class=" md:float-right text-white bg-blue-700 hover:bg-blue-800    font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-gray-600 dark:hover:bg-[#570AFF] focus:outline-none dark:text-gray-300">Edit Project</a>
			</div>
		</div>
		@endforeach

		<!-- <div class="brandDark2 p-4 rounded space-y-5">
			<div class="md:flex justify-between">
				<div class="">RedBull Project</div>
				<div class="dark:text-gray-400 text-sm">Brand Strategy</div>
			</div>
			<div>
				<p class="text-xs font-light">67% Completed</p>
			</div>
			<div class="w-full bg-[#838396] rounded-full h-1.5 dark:bg-[#838396]">
				<div class="bg-[#570AFF] h-1.5 rounded-full dark:bg-[#570AFF]" style="width: 67%"></div>
			</div>
			<div>
				<p class="text-xs font-light">Lorem ipsum dolor sit amet consectetur. Nunc dictum justo vulputate vitae quis lacinia platea...</p>
			</div>
			<div class="flex justify-between">
				<div>
					<button type="button" class="focus:outline-none rounded-lg text-gray-900 bg-[#9BDAB4] hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-2     dark:bg-[#9BDAB4] dark:hover:bg-green-700 dark:focus:ring-green-800">RedBull</button>
				</div>
				<div class="dark:text-gray-400 flex items-center">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
						<path d="M15.8333 2.49967H15V0.833008H13.3333V2.49967H6.66667V0.833008H5V2.49967H4.16667C3.72464 2.49967 3.30072 2.67527 2.98816 2.98783C2.67559 3.30039 2.5 3.72431 2.5 4.16634V15.833C2.5 16.275 2.67559 16.699 2.98816 17.0115C3.30072 17.3241 3.72464 17.4997 4.16667 17.4997H15.8333C16.7583 17.4997 17.5 16.758 17.5 15.833V4.16634C17.5 3.72431 17.3244 3.30039 17.0118 2.98783C16.6993 2.67527 16.2754 2.49967 15.8333 2.49967ZM15.8333 15.833H4.16667V7.49967H15.8333V15.833ZM15.8333 5.83301H4.16667V4.16634H15.8333V5.83301Z" fill="#838396" />
					</svg>
					<span>12/01/2023</span>
				</div>
			</div>
			<div class="flex justify-end">
				<button type="button" class=" md:float-right text-white bg-blue-700 hover:bg-blue-800    font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-gray-600 dark:hover:bg-[#570AFF] focus:outline-none dark:text-gray-300">Edit Project</button>
			</div>
		</div> -->
	</div>
</div>
@else
<div class="flex justify-center text-white text-center md:mt-10">
	<div class="max-w-xl space-y-2 md:space-y-8">
		<div>
			<div class="rounded-full bg-brandPrimary w-14 px-2 m-auto">
				<svg xmlns="http://www.w3.org/2000/svg" class="bg-brandPrimary rounded-full" width="56" height="56" viewBox="0 0 56 56" fill="none">
					<path d="M30.6367 51.777L26.8333 42.8403C30.4967 41.487 33.9267 39.667 37.1 37.5437L30.6367 51.777ZM13.16 29.167L4.22334 25.3637L18.4567 18.9003C16.3333 22.0737 14.5133 25.5037 13.16 29.167ZM44.8467 9.33366C45.5 9.33366 46.0833 9.33366 46.5733 9.45033C46.97 12.6937 46.5267 19.367 38.8733 27.0203C34.9067 31.0103 30.17 34.067 24.85 36.097L19.8333 31.197C21.98 25.807 25.0367 21.0703 28.98 17.127C35.42 10.687 41.16 9.33366 44.8467 9.33366ZM44.8467 4.66699C40.2267 4.66699 33.2267 6.27699 25.6667 13.837C20.5567 18.947 17.5 24.5703 15.5167 29.4937C14.8633 31.2437 15.3067 33.157 16.59 34.4637L21.56 39.4103C22.4467 40.297 23.6367 40.8337 24.8733 40.8337C25.41 40.8337 25.97 40.6937 26.5067 40.4837C32.3833 38.243 37.7191 34.7838 42.1633 30.3337C55.37 17.127 50.4233 5.57699 50.4233 5.57699C50.4233 5.57699 48.3 4.66699 44.8467 4.66699ZM33.9267 22.0737C32.1067 20.2537 32.1067 17.2903 33.9267 15.4703C35.7467 13.6503 38.71 13.6503 40.53 15.4703C42.3267 17.2903 42.35 20.2537 40.53 22.0737C38.71 23.8937 35.7467 23.8937 33.9267 22.0737ZM14.56 51.3337L23.0533 42.8403C22.26 42.6303 21.49 42.2803 20.79 41.7903L11.27 51.3337H14.56ZM4.66667 51.3337H7.95667L19.0867 40.227L15.7733 36.937L4.66667 48.0437V51.3337ZM4.66667 44.7303L14.21 35.2103C13.72 34.5103 13.37 33.7637 13.16 32.947L4.66667 41.4403V44.7303Z" fill="white" />
				</svg>
			</div>
		</div>
		<h3 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Let's create something impressive together!</h3>

		<p class="mb-3 font-normal text-gray-500 dark:text-gray-400">To get started, simply click the button below. In just a few simple steps, you'll be able to create your first project and customize it to meet your needs.</p>
		<div class="">
			<a href="{{route('projects.create')}}">
				<button type="button" class="text-white bg-blue-700 hover:bg-blue-800   font-medium rounded-lg text-lg px-10 py-4 dark:bg-brandPrimary dark:hover:bg-[#4E09E6] focus:outline-none dark:focus:ring-blue-800">Create New Project</button>
			</a>
		</div>
	</div>
</div>
@endif

@endsection