@extends('theme::layouts.dashboard')

@section('content')
<div class="flex pb-6 justify-between">
    <div>
        <h3 class="pr-5 capitalize" style="color: white; font-size: 24px; fontmy-family: Helvetica Neue; font-weight: 500; word-wrap: break-word">{{$project->name}}</h3>
    </div>
    <div class="flex space-x-4 items-center">
        <h3 class="text-white text-base">{{$project->type}}</h3>
        @if(isset($project->client))
        <button type="button" class="focus:outline-none rounded-lg text-gray-900 bg-[#9BDAB4] hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-base px-2     dark:bg-[#4d5562] dark:hover:bg-green-700 dark:focus:ring-green-800" style="color: {{$project->client->tag_color}};background-color: {{$project->client->tag_bg_color}}">{{$project->client->tag}}</button>
        @endif
    </div>
</div>
<div class="flex justify-end items-center">
    <div class="">
        <button type="button" data-modal-target="download-document-modal" data-modal-toggle="download-document-modal" class="px-5 py-2.5 text-sm font-medium text-white inline-flex items-center bg-wave-500 hover:bg-wave-600 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-brand-800 dark:hover:bg-brand-700 dark:focus:ring-brand-700 brandDark2">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M16.707 9.793C16.5195 9.60553 16.2652 9.50021 16 9.50021C15.7348 9.50021 15.4805 9.60553 15.293 9.793L13 12.086V3.5C13 3.23478 12.8946 2.98043 12.7071 2.79289C12.5196 2.60536 12.2652 2.5 12 2.5C11.7348 2.5 11.4804 2.60536 11.2929 2.79289C11.1054 2.98043 11 3.23478 11 3.5V12.086L8.707 9.793C8.61475 9.69749 8.50441 9.62131 8.3824 9.5689C8.2604 9.51649 8.12918 9.4889 7.9964 9.48775C7.86362 9.4866 7.73194 9.5119 7.60905 9.56218C7.48615 9.61246 7.3745 9.68671 7.2806 9.78061C7.18671 9.8745 7.11246 9.98615 7.06218 10.109C7.0119 10.2319 6.9866 10.3636 6.98775 10.4964C6.9889 10.6292 7.01649 10.7604 7.0689 10.8824C7.12131 11.0044 7.19749 11.1148 7.293 11.207L11.293 15.207C11.3859 15.3001 11.4962 15.374 11.6177 15.4244C11.7392 15.4748 11.8695 15.5008 12.001 15.5008C12.1325 15.5008 12.2628 15.4748 12.3843 15.4244C12.5058 15.374 12.6161 15.3001 12.709 15.207L16.709 11.207C16.8962 11.0192 17.0012 10.7648 17.0008 10.4996C17.0004 10.2344 16.8947 9.98026 16.707 9.793Z" fill="#ffffff" />
                <path d="M20 14H17.45L14.475 16.975C14.15 17.3 13.7641 17.5579 13.3395 17.7338C12.9148 17.9097 12.4597 18.0003 12 18.0003C11.5403 18.0003 11.0852 17.9097 10.6605 17.7338C10.2359 17.5579 9.85001 17.3 9.525 16.975L6.55 14H4C3.46957 14 2.96086 14.2107 2.58579 14.5858C2.21071 14.9609 2 15.4696 2 16V20C2 20.5304 2.21071 21.0391 2.58579 21.4142C2.96086 21.7893 3.46957 22 4 22H20C20.5304 22 21.0391 21.7893 21.4142 21.4142C21.7893 21.0391 22 20.5304 22 20V16C22 15.4696 21.7893 14.9609 21.4142 14.5858C21.0391 14.2107 20.5304 14 20 14ZM17 19C16.8022 19 16.6089 18.9414 16.4444 18.8315C16.28 18.7216 16.1518 18.5654 16.0761 18.3827C16.0004 18.2 15.9806 17.9989 16.0192 17.8049C16.0578 17.6109 16.153 17.4327 16.2929 17.2929C16.4327 17.153 16.6109 17.0578 16.8049 17.0192C16.9989 16.9806 17.2 17.0004 17.3827 17.0761C17.5654 17.1518 17.7216 17.28 17.8315 17.4444C17.9414 17.6089 18 17.8022 18 18C18 18.2652 17.8946 18.5196 17.7071 18.7071C17.5196 18.8946 17.2652 19 17 19Z" fill="#ffffff" />
            </svg>
            &nbsp;Download
        </button>
    </div>

</div>

<div id="sections-list">
    <div class="grid md:grid-cols-3 lg:grid-cols-4 2xl:grid-cols-5 gap-6 dark:text-white my-5">
        @foreach($project->sections as $section)
        <a href="{{route('project.ai-assist',[$project->id,$section->id,$section->cBlock])}}">
            <div class="p-4 rounded space-y-5 section-item @if($section->progress == 100) bg-card-completed done @else brandDark2 @endif" data-section-id="{{$section->id}}">
                <div class="md:flex justify-between">
                    <div class="">{{$section->order}}. {{$section->name}}</div>
                </div>
                <div class="flex justify-between  pt-20">
                    <div>
                        <p class="">{{$section->progress}}%</p>
                    </div>
                    <div>
                        @if($section->progress == 100)
                        <div class="bg-wave-500 p-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>
                        @else
                        <div class="bg-brand-600 p-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                        </div>

                        @endif
                    </div>
                </div>
                <div class="w-full  rounded-full h-1.5  @if($section->progress == 100) dark:bg-brandPrimary @else bg-[#838396] dark:bg-[#838396] @endif">
                    <div class="bg-[#570AFF] h-1.5 rounded-full dark:bg-[#570AFF]" style="width: {{$section->progress}}%"></div>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>
@if($project->cSection && $project->cBlock)
<div class="text-center">
    <a href="{{route('project.ai-assist',[$project->id,$project->cSection,$project->cBlock])}}">
        <button type="button" class="text-white bg-wave-500 hover:bg-wave-600 font-medium rounded-lg text-lg px-16 py-3 dark:bg-brandPrimary dark:hover:bg-[#4E09E6] focus:outline-none dark:focus:ring-blue-800">Let`s Build</button>
    </a>
</div>
@endif

<!-- Main modal -->
<div id="download-document-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full" style="z-index: 39">
    <div class="relative w-full max-w-lg max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow brandDark3">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="download-document-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <!-- <form class="px-6 py-10 lg:px-8" method="POST" action="{{route('download-project-document')}}">
                @csrf -->
            <div class="px-6 py-10 lg:px-8">
                <div class="space-y-6">
                    @if($project->progress == 100)
                    <div class="dark:text-white text-center">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" viewBox="0 0 24 24" fill="none">
                                <path d="M9.66705 17.875H9.65205C9.51807 17.8732 9.38582 17.8444 9.26317 17.7905C9.14051 17.7366 9.02995 17.6585 8.93805 17.561L4.27205 12.6C4.18196 12.5044 4.11158 12.392 4.06494 12.2692C4.0183 12.1464 3.9963 12.0156 4.0002 11.8843C4.00807 11.6191 4.12097 11.368 4.31405 11.186C4.50712 11.0041 4.76457 10.9063 5.02974 10.9142C5.16105 10.9181 5.29029 10.9478 5.41011 11.0016C5.52992 11.0555 5.63796 11.1324 5.72805 11.228L9.68705 15.435L18.287 6.79202C18.379 6.69629 18.4892 6.61983 18.611 6.5671C18.7329 6.51438 18.864 6.48644 18.9967 6.48493C19.1295 6.48341 19.2612 6.50835 19.3842 6.55828C19.5073 6.60822 19.6191 6.68215 19.7132 6.77576C19.8074 6.86937 19.8819 6.98079 19.9326 7.10353C19.9832 7.22626 20.0089 7.35785 20.0081 7.49061C20.0074 7.62337 19.9802 7.75465 19.9281 7.8768C19.8761 7.99894 19.8003 8.1095 19.705 8.20202L10.375 17.58C10.2825 17.6737 10.1722 17.748 10.0507 17.7986C9.92913 17.8493 9.79872 17.8752 9.66705 17.875Z" fill="#570AFF" />
                            </svg>
                        </div>
                        <h3 class="my-5 dark:text-white text-black" style="font-size: 24px; font-weight: 500; overflow-wrap: break-word;"> Your project is Completed </h3>
                        <p class="text-gray-400">download your project document</p>
                    </div>
                    @else
                    <div class="dark:text-white text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" viewBox="0 0 24 24" fill="white" stroke="currentColor" stroke-width="1">
                            <path d="M12 2.5C10.1211 2.5 8.28435 3.05717 6.72209 4.10104C5.15982 5.14491 3.94218 6.62861 3.22315 8.36451C2.50412 10.1004 2.31598 12.0105 2.68254 13.8534C3.0491 15.6962 3.95389 17.3889 5.28249 18.7175C6.61109 20.0461 8.30383 20.9509 10.1466 21.3175C11.9895 21.684 13.8996 21.4959 15.6355 20.7769C17.3714 20.0578 18.8551 18.8402 19.899 17.2779C20.9428 15.7157 21.5 13.8789 21.5 12C21.4971 9.48134 20.4953 7.06667 18.7143 5.2857C16.9333 3.50474 14.5187 2.50291 12 2.5ZM12 17C11.8022 17 11.6089 16.9414 11.4444 16.8315C11.28 16.7216 11.1518 16.5654 11.0761 16.3827C11.0004 16.2 10.9806 15.9989 11.0192 15.8049C11.0578 15.6109 11.153 15.4327 11.2929 15.2929C11.4327 15.153 11.6109 15.0578 11.8049 15.0192C11.9989 14.9806 12.2 15.0004 12.3827 15.0761C12.5654 15.1518 12.7216 15.28 12.8315 15.4444C12.9414 15.6089 13 15.8022 13 16C13 16.2652 12.8946 16.5196 12.7071 16.7071C12.5196 16.8946 12.2652 17 12 17ZM13 13C13 13.2652 12.8946 13.5196 12.7071 13.7071C12.5196 13.8946 12.2652 14 12 14C11.7348 14 11.4804 13.8946 11.2929 13.7071C11.1054 13.5196 11 13.2652 11 13V8C11 7.73478 11.1054 7.48043 11.2929 7.29289C11.4804 7.10536 11.7348 7 12 7C12.2652 7 12.5196 7.10536 12.7071 7.29289C12.8946 7.48043 13 7.73478 13 8V13Z" fill="#570AFF" />
                        </svg>
                        <h3 class="my-5 dark:text-white text-black" style="font-size: 24px; font-weight: 500; overflow-wrap: break-word;"> Your project is incomplete </h3>
                        <p class="text-gray-400">We recommend reviewing your project and completing every section before downloading your project document</p>
                    </div>
                    @endif
                    <div class="flex space-x-3">
                        <button type="button" data-modal-hide="download-document-modal" class="w-full px-8 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white rounded dark:border-2 dark:border-gray-400">
                            Review Project
                        </button>
                        <!-- onclick="downloadDocument()"  -->
                        <a href="/project/{{$project->id}}/documents" class="w-full px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded hover:bg-primary-800 dark:bg-brandPrimary whitespace-nowrap">
                            Download
                        </a>
                        <!--  -->
                    </div>
                    <!--  -->
                    <!-- <form id="project-document-form" method="post" action="{{ route('download-project-document') }}">
                        @csrf
                        <input type="hidden" name="projectId" value="{}}">

                    </form> -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection