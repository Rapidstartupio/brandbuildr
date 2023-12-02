@extends('theme::layouts.dashboard')

@section('content')
<div class="text-white">
    <div class="flex">
        <a href="/projects/clients">
            <svg class="w-min" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M8.57143 7.42849L4 11.9999M4 11.9999L8.57143 16.6045M4 11.9999H18.8571" stroke="#B6B6B8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </a>
        <div class="dark:text-gray-400 text-sm">Search</div>
    </div>
    <div class="grid sm:grid-cols-6 pt-6">
        <div class="sm:border-r border-gray-600 pr-3 col-span-2 lg:col-span-1">
            <div class="flex space-x-4 items-center pb-6">
                @if($client->company_logo)
                <div>
                    <img src="{{asset('storage/upload/projects/clients/'.$client->company_logo)}}" alt="{{$client->company_name}}" class="w-16 h-16">
                </div>
                @endif
                <div class="text-xl capitalize ">{{$client->company_name}}</div>
            </div>
            <div class="border-t border-gray-600  py-6">
                <div class="text-lg">Company Information</div>
                <ol class="text-base py-6 space-y-4">
                    <li>
                        <div class="flex font-light space-x-3">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#B6B6B8" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                </svg>
                            </div>
                            <div>{{$client->phone_number}}</div>
                        </div>
                    </li>
                    <li>
                        <div class="flex font-light space-x-3">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#B6B6B8" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                </svg>

                            </div>
                            <div>{{$client->email}}</div>
                        </div>
                    </li>
                    <li>
                        <div class="flex font-light space-x-3">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#B6B6B8" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
                                </svg>
                            </div>
                            <div>{{$client->key_contact}}</div>
                        </div>
                    </li>
                </ol>
            </div>
            <div class="border-t border-gray-600  py-6">
                <div class="text-lg">Projects Overview</div>
                <ol class="text-base py-6 space-y-4">
                    <li>
                        <div class="flex font-light justify-between">
                            <div class="text-[#B6B6B8]">
                                Total
                            </div>
                            <div>0</div>
                        </div>
                    </li>
                    <li>
                        <div class="flex font-light justify-between">
                            <div class="text-[#B6B6B8]">
                                In Progress
                            </div>
                            <div>0</div>
                        </div>
                    </li>
                    <li>
                        <div class="flex font-light justify-between">
                            <div class="text-[#B6B6B8]">
                                Completed
                            </div>
                            <div>0</div>
                        </div>
                    </li>
                </ol>
            </div>
            <div class="border-t border-gray-600  py-6">
                <div class="text-lg">Documents</div>
            </div>
        </div>
        <div class="col-span-4 lg:col-span-5 sm:pl-4">
            <div class="flex justify-between items-center">
                <div class="text-xl capitalize ">Projects</div>
                <div class="">
                    <a href="{{route('projects.create')}}">
                        <button type="button" class=" md:float-right text-white bg-blue-700  hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-[#570AFF] dark:hover:bg-[#4E09E6] focus:outline-none dark:focus:ring-blue-800"><span class="md:px-4 font-bold">+</span> New Project</button>
                    </a>
                </div>
            </div>

            @if($projects)
            <div id="filters" class="lg:flex space-y-2 lg:space-y-0 pt-6">
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
                <div class="dates mr-4">
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

            <div id="projects-list">
                <div class="grid lg:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-6 dark:text-white my-5">
                    @foreach($projects as $project)
                    <div class="brandDark2 p-4 rounded space-y-3">
                        <div class="md:flex justify-between items-center ">
                            <div class="text-lg capitalize">{{$project->name}}</div>
                            <div class="dark:text-gray-400 text-sm">
                                <svg class="w-auto" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none">
                                    <path d="{{$project->type_icon_svg_path_d}}" fill="white" />
                                </svg>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <div class="space-x-2">
                                @if(isset($project->client))
                                <button type="button" class="focus:outline-none rounded-lg text-gray-900 bg-[#9BDAB4] hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-light rounded-lg text-base px-2     dark:bg-[#9BDAB4] dark:hover:bg-green-700 dark:focus:ring-green-800">{{$project->client->company_name}}</button>
                                @endif
                                <button type="button" class="focus:outline-none rounded-lg text-white bg-wave-500 hover:bg-wave-700 focus:ring-4 focus:ring-wave-700 font-light rounded-lg text-base px-2  dark:hover:bg-wave-700 dark:focus:ring-wave-700">{{$project->type}}</button>
                            </div>
                            <div class="dark:text-white flex items-center space-x-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class=" w-fit" viewBox="0 0 20 20" fill="none">
                                    <path d="M15.8333 2.49967H15V0.833008H13.3333V2.49967H6.66667V0.833008H5V2.49967H4.16667C3.72464 2.49967 3.30072 2.67527 2.98816 2.98783C2.67559 3.30039 2.5 3.72431 2.5 4.16634V15.833C2.5 16.275 2.67559 16.699 2.98816 17.0115C3.30072 17.3241 3.72464 17.4997 4.16667 17.4997H15.8333C16.7583 17.4997 17.5 16.758 17.5 15.833V4.16634C17.5 3.72431 17.3244 3.30039 17.0118 2.98783C16.6993 2.67527 16.2754 2.49967 15.8333 2.49967ZM15.8333 15.833H4.16667V7.49967H15.8333V15.833ZM15.8333 5.83301H4.16667V4.16634H15.8333V5.83301Z" fill="#ffffff" />
                                </svg>
                                <span>{{$project->created_at->format('d M')}}</span>
                            </div>
                        </div>
                        <div class="space-y-2 pt-20">
                            <div class="flex justify-between">
                                <div>
                                    <p class="dark:text-gray-400">{{$project->progress}}%</p>
                                </div>
                                <a class="bg-wave-500" href="{{route('project.details',$project->id )}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 m-1">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.348a1.125 1.125 0 010 1.971l-11.54 6.347a1.125 1.125 0 01-1.667-.985V5.653z" />
                                    </svg>
                                </a>
                            </div>
                            <div class="w-full bg-[#838396] rounded-full h-2 dark:bg-[#838396]">
                                <div class="bg-wave-500 h-2 rounded-full" style="width: {{$project->progress}}%"></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection