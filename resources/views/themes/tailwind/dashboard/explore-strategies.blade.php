@extends('theme::layouts.dashboard')


@section('content')

<h3 style="color: white; font-size: 24px; fontmy-family: Helvetica Neue; font-weight: 500; word-wrap: break-word">Dashboard</h3>
<div class="grid md:grid-cols-4 md:gap-6 mt-12">
    <div class="mb-12">
        @include('theme::dashboard.strategy-hub-nav')
    </div>
    <div class="md:col-span-3 md:border-l border-gray-400 md:pl-6 md:pl-12">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4  dark:text-white my-5">
            @foreach($projectType as $type)
            <div class="p-4 rounded relative h-60 @if($type->status == 'disable') bg-brand-500 disable-type  cursor-not-allowed  @else brandDark3  @endif hover:hover-type  border-2  border-transparent">
                <!-- cursor-not-allowed  -->
                <div class="text-xl capitalize w-min">{{$type->name}}</div>
                <div class="icon dark:text-gray-400 text-sm absolute bottom-2 right-2" width="48" height="48" style="width: 48px;height: 48px;">
                    @if($type->svg)
                    {!! $type->svg !!}
                    @else
                    <svg class="w-auto" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none">
                        <path d="{{$type->icon_svg_path_d}}" fill="white" />
                    </svg>
                    @endif
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
</div>

@endsection