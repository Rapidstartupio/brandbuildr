@extends('theme::layouts.dashboard')

@section('content')
<div class="flex pb-6">
    <h3 class="pr-5" style="color: white; font-size: 24px; fontmy-family: Helvetica Neue; font-weight: 500; word-wrap: break-word">{{$project->name}}</h3>
    <div>
        <button type="button" class="focus:outline-none rounded-lg text-gray-900 bg-[#9BDAB4] hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-2     dark:bg-[#9BDAB4] dark:hover:bg-green-700 dark:focus:ring-green-800">RedBull</button>
    </div>
</div>
<h3 class="text-white text-xl">{{$project->type->name}}</h3>

<div id="sections-list">
    <div class="grid md:grid-cols-3 lg:grid-cols-4 2xl:grid-cols-5 gap-6 dark:text-white my-5">
        @foreach($project->type->sections as $section)
        <div class="brandDark2 p-4 rounded space-y-5">
            <div class="md:flex justify-between">
                <div class="">{{$section->order}}. {{$section->name}}</div>
            </div>
            <div>
                <button type="button" class="focus:outline-none rounded-lg text-gray-300 bg-gray-600   focus:ring-4  font-medium rounded-lg text-sm px-2     dark:bg-gray-600 ">In Progress</button>
            </div>
            <div>
                <p class="text-xs font-light">0% Questions Completed</p>
            </div>
            <div class="w-full bg-[#838396] rounded-full h-1.5 dark:bg-[#838396]">
                <div class="bg-[#570AFF] h-1.5 rounded-full dark:bg-[#570AFF]" style="width: 0%"></div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="text-center">
    <a href="">
        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-lg px-16 py-3 dark:bg-brandPrimary dark:hover:bg-[#4E09E6] focus:outline-none dark:focus:ring-blue-800">Let`s Build</button>
    </a>
</div>
@endsection