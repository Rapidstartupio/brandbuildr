@extends('theme::layouts.dashboard')


@section('content')

<h3 style="color: white; font-size: 24px; fontmy-family: Helvetica Neue; font-weight: 500; word-wrap: break-word">Projects</h3>
<div class="dark:text-white my-6">
    <div class="text-sm font-medium text-center text-gray-500 dark:text-gray-400 md:flex">
        @include('theme::projects.partials.projects-menu')
        <div class="text-left md:flex-auto mt-5 md:mt-0">
            <a href="{{route('clients.create')}}">
                <button type="button" class=" md:float-right text-white bg-blue-700  hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-[#570AFF] dark:hover:bg-[#4E09E6] focus:outline-none dark:focus:ring-blue-800"><span class="md:px-4 font-bold">+</span> New Client</button>
            </a>
        </div>
    </div>
</div>

@if($clients)
<div id="filters" class="lg:flex space-y-2 lg:space-y-0">
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
    <div class="status mr-4">
        <div class="relative max-w-sm">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75" />
                </svg>
            </div>
            <input datepicker type="text" class="  text-gray-900 text-sm rounded  block  pl-10 p-2.5   dark:placeholder-gray-400 dark:text-white  border-0 brandDark2" placeholder="Status">
        </div>
    </div>
    <div class="dates mr-4">
        <div class="relative max-w-sm">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                </svg>
            </div>
            <input datepicker type="text" class="  text-gray-900 text-sm rounded  block  pl-10 p-2.5   dark:placeholder-gray-400 dark:text-white  border-0 brandDark2" placeholder="Date">
        </div>
    </div>
</div>
<div id="clients-list">
    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 dark:text-white my-5">
        @foreach($clients as $client)
        <div class="brandDark2 p-4 rounded space-y-6 h-64">
            <div class="md:flex justify-between items-center ">
                <div class="space-y-2">
                    <div class="text-lg capitalize">{{$client->company_name}}</div>
                    <div>
                        <button type="button" class="focus:outline-none rounded-lg text-gray-900 bg-[#9BDAB4] hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-light rounded-lg text-base px-2     dark:bg-[#9BDAB4] dark:hover:bg-green-700 dark:focus:ring-green-800" style="color: {{$client->tag_color}};background-color: {{$client->tag_bg_color}}">{{$client->tag}}</button>
                    </div>
                </div>
                <div class="">

                </div>
            </div>
            <div class="flex justify-between text-sm">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                    </svg>
                    <div>Projects: <span>{{$client->nbProjects()}}</span></div>
                </div>
                <div class="">
                    <button type="button" class="rounded-lg px-2 inline-flex items-center text-sm font-light text-center text-white rounded dark:border-2 dark:border-white">
                        Active
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@else

<div class="flex justify-center text-white text-center md:mt-10">
    <div class="max-w-xl space-y-2 md:space-y-8">
        <div class="">
            <a href="{{route('clients.create')}}">
                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800   font-medium rounded-lg text-lg px-10 py-4 dark:bg-brandPrimary dark:hover:bg-[#4E09E6] focus:outline-none dark:focus:ring-blue-800">Create New Client</button>
            </a>
        </div>
    </div>
</div>

@endif


@endsection