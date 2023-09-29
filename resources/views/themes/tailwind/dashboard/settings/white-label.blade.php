@extends('theme::layouts.dashboard')


@section('content')
<h3 class=" pb-6" style="color: white; font-size: 24px; fontmy-family: Helvetica Neue; font-weight: 500; word-wrap: break-word">Settings</h3>
<div class="grid grid-cols-3 gap-6">
    <div class="settings-nav">
        @include('theme::dashboard.settings.nav')
    </div>
    <div class="settings-content col-span-2 dark:text-white">
        <form action="" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <h3 class="my-5" style="
                color: white;
                font-size: 24px;
                fontmy-family: Helvetica Neue;
                font-weight: 500;
                word-wrap: break-word;
            ">
                White Label
            </h3>
            <p class="text-gray-400 py-4">Give your clients a seamless branded experience</p>
            <hr class="my-6 h-0.5 border-t-0 bg-[#504A6A] opacity-100 dark:opacity-50" />
            <h3 class="my-5" style="
                color: white;
                font-size: 24px;
                fontmy-family: Helvetica Neue;
                font-weight: 500;
                word-wrap: break-word;
            ">
                Your Company Logo
            </h3>
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="w-full">
                    <label for="dark-logo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dark Version</label>
                    <div class="grid grid-cols-3 gap-2">
                        @if(Auth::user()->theme_dark_logo)
                        <div>
                            <img src="{{asset('/storage/logos/'.Auth::user()->theme_dark_logo)}}" alt="user_dark_logo" class="w-40" />
                        </div>
                        @endif
                        <div class="col-span-2">
                            <input type="file" name="dark_logo" id="dark-logo" class="" />
                        </div>
                    </div>

                </div>
                <div class="w-full">
                    <label for="light-logo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Light Version</label>
                    <div class="grid grid-cols-3 gap-2">
                        @if(Auth::user()->theme_light_logo)
                        <div>
                            <img src="{{asset('/storage/logos/'.Auth::user()->theme_light_logo)}}" alt="user_dark_logo" class="w-40" />
                        </div>
                        @endif
                        <div class="col-span-2">
                            <input type="file" name="light_logo" id="light-logo" class="" />
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-6 h-0.5 border-t-0 bg-[#504A6A] opacity-100 dark:opacity-50" />
            <h3 class="my-5" style="
                color: white;
                font-size: 24px;
                fontmy-family: Helvetica Neue;
                font-weight: 500;
                word-wrap: break-word;
            ">
                Select Theme
            </h3>

            <div class="themes text-white">
                <ul class="grid gap-6 grid-cols-1 sm:grid-cols-3">
                    <li class="">
                        <input type="radio" id="dark-theme" name="user_theme" @if(auth()->user()->theme == 'dark') checked @endif value="dark" class="opacity-0 absolute peer" />
                        <label for="dark-theme" class="block cursor-pointer peer-checked:border-2 peer-checked:border-blue-500">
                            <img src="{{ Storage::url('themes/dark-theme.png') }}" class="w-full" alt="dark-theme">
                        </label>
                    </li>
                    <li class="">
                        <input type="radio" id="light-theme" name="user_theme" @if(auth()->user()->theme == 'light') checked @endif value="light" class="opacity-0 absolute peer" />
                        <label for="light-theme" class="block cursor-pointer peer-checked:border-2 peer-checked:border-blue-500">
                            <img src="{{ Storage::url('themes/light-theme.png') }}" class="w-full" alt="dark-theme">
                        </label>
                    </li>
                </ul>
            </div>
            <hr class="my-6 h-0.5 border-t-0 bg-[#504A6A] opacity-100 dark:opacity-50" />

            <div class="md:flex md:space-x-4 justify-between">
                <div>
                    <h3 style="
                        color: white;
                        font-size: 20px;
                        fontmy-family: Helvetica Neue;
                        word-wrap: break-word;
                    ">
                        Custom Colors
                    </h3>
                </div>
                <div class="">
                    <button type="button" class="inline-flex items-center p-2 text-sm font-medium text-center text-white rounded dark:border-2 dark:border-gray-400 whitespace-nowrap">
                        Reset
                    </button>
                </div>
            </div>
            <div class="grid grid-cols-3">
                <div>
                    <label for="button-color">Button Color</label>
                    <div class="space-x-2">
                        <input id="button-color" type="color" value="{{ auth()->user()->theme_button_color ?? '#5000FF' }}" width="42" name="button_color" />
                        <input type="text" value="{{ auth()->user()->theme_button_color ?? '#5000FF' }}" readonly class="dark:bg-gray-500" style="width: 120px;">
                    </div>

                </div>
                <div>
                    <label for="text-color">Text Color</label>
                    <div class="space-x-2">
                        <input id="text-color" type="color" value="{{ auth()->user()->theme_text_color ?? '#FFFFFF' }}" width="42" name="text_color" />
                        <input type="text" value="{{ auth()->user()->theme_text_color ?? '#FFFFFF' }}" readonly class="dark:bg-gray-500" style="width: 120px;">
                    </div>

                </div>
                <div>
                    <label for="line-color">Line Color</label>
                    <div class="space-x-2">
                        <input id="line-color" type="color" value="{{ auth()->user()->theme_line_color ?? '#B6B6B8' }}" width="42" name="line_color" />
                        <input type="text" value="{{ auth()->user()->theme_line_color ?? '#B6B6B8' }}" readonly class="dark:bg-gray-500" style="width: 120px;">
                    </div>

                </div>
            </div>

            <div class="flex justify-end space-x-3">
                <button type="button" class="inline-flex items-center px-8 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white rounded dark:border-2 dark:border-gray-400">
                    Cancel
                </button>
                <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded hover:bg-primary-800 dark:bg-brandPrimary">
                    save
                </button>
            </div>
            <!-- <h3 class="text-white text-xl">White Label</h3>
        <p class="text-gray-400 py-4 border-b border-gray-400">Give your clients a seamless branded experience</p>
        <div>
            <h1>Your Company Logo</h1>
            <div class="upload-logo py-2 border-b border-gray-400">
                <div>Dark Version</div>
                <input type="file" />
            </div>
            <h1>Select Theme</h1>
            <ul class="flex space-x-4 py-6 border-b border-gray-400">
                <li>
                    <img src="{{ Storage::url('themes/dark-theme.png') }}" class="border border-blue-500" width="220" height="150" alt="dark-theme">
                    <div>Dark Mode (Active)</div>
                </li>
                <li>
                    <img src="{{ Storage::url('themes/light-theme.png') }}" width="220" height="150" alt="dark-theme">
                    <div>Light Mode</div>
                </li>
            </ul>
            <div class="py-2">
                <h1>Custom Colors</h1>
            </div>
        </div> -->
        </form>
    </div>
</div>
@endsection