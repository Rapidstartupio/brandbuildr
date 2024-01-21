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
        <div class="sm:border-r border-gray-600 pr-3 col-span-2 lg:col-span-1 break-all">
            <div class="flex space-x-4 items-center pb-6">
                @if($client->company_logo)
                <div style="min-width: 64px;">
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
                            <div>{{$client->nbProjects()}}</div>
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
                    <a href="{{route('clients.edit',$client->id)}}" class="flex md:float-right text-white bg-blue-700  hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-[#570AFF] dark:hover:bg-[#4E09E6] focus:outline-none dark:focus:ring-blue-800 space-x-1">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                                <path fill-rule="evenodd" d="M11.013 2.513a1.75 1.75 0 0 1 2.475 2.474L6.226 12.25a2.751 2.751 0 0 1-.892.596l-2.047.848a.75.75 0 0 1-.98-.98l.848-2.047a2.75 2.75 0 0 1 .596-.892l7.262-7.261Z" clip-rule="evenodd" />
                            </svg>
                        </span>
                        <span>Edit Client</span>
                    </a>
                    <a href="{{route('projects.create')}}" class=" md:float-right text-white bg-blue-700  hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-[#570AFF] dark:hover:bg-[#4E09E6] focus:outline-none dark:focus:ring-blue-800 flex space-x-1">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                                <path d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z" />
                            </svg>
                        </span>
                        <span>New Project</span>
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
                        <select id="project-type" class="text-gray-900 text-sm rounded  block  pl-10 p-2.5   dark:placeholder-gray-400 dark:text-white  border-0 brandDark2" onchange="filterAndNavigate()">
                            <option selected value="">Project Type</option>
                            @if($projectTypes)
                            @foreach($projectTypes as $type)
                            <option value="{{$type->id}}" @if($type->id == $filter->type) selected @endif>{{$type->name}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="dates mr-4">
                    <div class="relative max-w-sm">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75" />
                            </svg>
                        </div>
                        <select id="project-status" class="text-gray-900 text-sm rounded  block  pl-10 p-2.5   dark:placeholder-gray-400 dark:text-white  border-0 brandDark2" onchange="filterAndNavigate()">
                            <option selected value="">Status</option>
                            @if($projectStatus)
                            @foreach($projectStatus as $status)
                            <option value="{{$status}}" @if($status==$filter->status) selected @endif>{{$status}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="dates mr-4">
                    <div class="relative max-w-sm">
                        <div class="absolute inset-y-0 end-2 flex items-center pl-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input datepicker id="project-deadline" value="{{$filter->deadline}}" onchange="filterAndNavigate()" type="date" class="  text-gray-900 text-sm rounded  block  pl-4 p-2.5   dark:placeholder-gray-400 dark:text-white  border-0 brandDark2" placeholder="Date">
                    </div>
                </div>
            </div>

            <div id="projects-list">
                <div class="grid lg:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-6 dark:text-white my-5">
                    @foreach($projects as $project)
                    @include('theme::projects.partials.project-item')
                    @endforeach
                    <div class=" p-4 rounded space-y-3 border-2 border-wave-500 border-dashed flex text-center justify-center items-center">
                        <div>
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
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script>
    function filterAndNavigate() {
        // Get the selected value+
        var projectType = document.getElementById("project-type").value;
        var projectStatus = document.getElementById("project-status").value;
        var projectDeadline = document.getElementById("project-deadline").value;

        var params = "";
        var url = "/projects/clients/{{$client->id}}/"

        if (projectType) {
            if (params != "") {
                params += "&";
            }
            params += "type=" + encodeURIComponent(projectType);
        }

        if (projectStatus) {
            if (params != "") {
                params += "&";
            }
            params += "status=" + encodeURIComponent(projectStatus);
        }

        if (projectDeadline) {
            if (params != "") {
                params += "&";
            }
            params += "deadline=" + encodeURIComponent(projectDeadline);
        }

        if (params) {
            url += "?" + params;
        }

        // Navigate to the constructed URL
        window.location.href = url;
    }
</script>
@endsection