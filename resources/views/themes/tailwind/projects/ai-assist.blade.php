@extends('theme::layouts.dashboard')

@section('custom_header_code')
<style type="text/css">
    .project-sections .section-title,
    .project-sections span {
        display: none;
    }

    .project-sections .active-section {
        color: white;
        display: block;
    }

    .project-sections .active-section+span,
    .project-sections .active-section+span+.section-title,
    .project-sections .active-section+span+.section-title+span,
    .project-sections .active-section+span+.section-title+span+.section-title {
        display: block;
    }

    .project-sections .active-section:before {
        display: block;
    }

    .project-sections .section-title:last-of-type+.section-title {
        background: linear-gradient(90deg, #B6B6B8 0%, rgba(182, 182, 184, 0.00) 119.02%);
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;

    }

    .project-sections span:last-child {
        display: none;
    }

    /* .project-sections .section-title:first-of-type {
        background: linear-gradient(90deg, rgba(182, 182, 184, 0.00) 0%, #B6B6B8 119.02%);
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;

    } */
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
    <div class="w-full">
        <div class="project-sections flex text-center space-x-4 items-center justify-center pt-6 whitespace-nowrap truncate" style="color: #B6B6B8;">
            @foreach($project->type->sections as $section)
            <div class="section-title @if($section->name == 'Positioning') active-section @endif" style="font-size: 20px;font-family: Helvetica Neue;font-weight: 500;word-wrap: break-word">{{$section->name}}</div> <span class="text-sm">></span>
            @endforeach
            @foreach($project->type->sections as $section)
            <div class="section-title" style="font-size: 20px;font-family: Helvetica Neue;font-weight: 500;word-wrap: break-word">{{$section->name}}</div> <span class="text-sm">></span>
            @endforeach


        </div>
    </div>
</div>

@endsection