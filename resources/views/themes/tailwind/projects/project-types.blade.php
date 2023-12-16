@extends('theme::layouts.dashboard')


@section('content')

<h3 style="color: white; font-size: 24px; fontmy-family: Helvetica Neue; font-weight: 500; word-wrap: break-word">Projects</h3>
<div class="dark:text-white my-6">
    <div class="text-sm font-medium text-center text-gray-500 dark:text-gray-400 md:flex">
        @include('theme::projects.partials.projects-menu')
    </div>
</div>

@if($projectTypes)

<div id="project-types-list">
    <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4  dark:text-white my-5">
        @foreach($projectTypes as $type)
        <div class="p-4 rounded relative h-60 @if($type->status == 'disable') bg-brand-500 disable-type  cursor-not-allowed  @else brandDark3  @endif hover:hover-type  border-2  border-transparent">
            <!-- cursor-not-allowed  -->
            <div class="text-xl capitalize w-min">{{$type->name}}</div>
            <div class="icon dark:text-gray-400 text-sm absolute bottom-2 right-2 ">
                <svg class="w-auto border-2 border-white rounded-lg" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none">
                    <path d="{{$type->icon_svg_path_d}}" fill="white" />
                </svg>
            </div>
            <div class="description brandDark2 contrast-50 hidden absolute bottom-0 left-0">
                <p class="p-2 text-sm">
                    {{$type->description}}
                </p>
            </div>
            @if($type->status == 'disable')
            <div class="comming-soon absolute bottom-2 left-2">
                <p>Coming Soon...</p>
            </div>
            @endif
        </div>
        @endforeach
    </div>
</div>
@endif


@endsection