@extends('theme::layouts.dashboard')

@section('custom_header_code')
<style type="text/css">
    .project-sections span:last-child {
        display: none;
    }
</style>
@endsection


@section('content')
<div class="dark:text-white">
    <div>
        <h3 class="pr-5" style="color: white; font-size: 24px; fontmy-family: Helvetica Neue; font-weight: 500; word-wrap: break-word">{{$project->name}} | {{$project->type->name}}</h3>
    </div>
    <div>
        <button type="button" class="focus:outline-none rounded-lg text-gray-900 bg-[#9BDAB4] hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-2     dark:bg-[#9BDAB4] dark:hover:bg-green-700 dark:focus:ring-green-800">RedBull</button>
    </div>
    <div class="project-sections flex text-center space-x-4 items-center justify-center text-gray-500 pt-6">
        @foreach($project->type->sections as $section)
        <div class="text-xl">{{$section->name}}</div> <span class="text-xs">></span>
        @endforeach
    </div>
</div>

@endsection