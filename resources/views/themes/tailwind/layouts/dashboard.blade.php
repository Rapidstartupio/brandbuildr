    <!DOCTYPE html>
    <html lang="{{ app()->getLocale() }}  " class="dark">

    <head>
        <script>
            // On page load or when changing themes, best to add inline in `head` to avoid FOUC
            if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark')
            }
        </script>
        @if(isset($seo->title))
        <title>{{ $seo->title }}</title>
        @else
        <title>{{ setting('site.title', 'Laravel Wave') . ' - ' . setting('site.description', 'The Software as a Service Starter Kit built on Laravel & Voyager') }}</title>
        @endif

        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge"> <!-- † -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="url" content="{{ url('/') }}">

        @if(empty(setting('site.favicon')))
        <link rel="icon" href="/wave/favicon.png" type="image/x-icon">
        @else
        <link rel="icon" href="{{ Voyager::image(setting('site.favicon')) }}" type="image/x-icon">
        @endif

        {{-- Social Share Open Graph Meta Tags --}}
        @if(isset($seo->title) && isset($seo->description) && isset($seo->image))
        <meta property="og:title" content="{{ $seo->title }}">
        <meta property="og:url" content="{{ Request::url() }}">
        <meta property="og:image" content="{{ $seo->image }}">
        <meta property="og:type" content="@if(isset($seo->type)){{ $seo->type }}@else{{ 'article' }}@endif">
        <meta property="og:description" content="{{ $seo->description }}">
        <meta property="og:site_name" content="{{ setting('site.title') }}">

        <meta itemprop="name" content="{{ $seo->title }}">
        <meta itemprop="description" content="{{ $seo->description }}">
        <meta itemprop="image" content="{{ $seo->image }}">

        @if(isset($seo->image_w) && isset($seo->image_h))
        <meta property="og:image:width" content="{{ $seo->image_w }}">
        <meta property="og:image:height" content="{{ $seo->image_h }}">
        @endif
        @endif

        <meta name="robots" content="index,follow">
        <meta name="googlebot" content="index,follow">

        @if(isset($seo->description))
        <meta name="description" content="{{ $seo->description }}">
        @endif

        <!-- Hotjar Tracking Code for my site -->
        <script>
            (function(h, o, t, j, a, r) {
                h.hj = h.hj || function() {
                    (h.hj.q = h.hj.q || []).push(arguments)
                };
                h._hjSettings = {
                    hjid: 3794219,
                    hjsv: 6
                };
                a = o.getElementsByTagName('head')[0];
                r = o.createElement('script');
                r.async = 1;
                r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
                a.appendChild(r);
            })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
        </script>

        <!-- Styles -->
        <link href="{{ mix('css/app.css','themes/' . $theme->folder ) }}" rel="stylesheet">
        <!-- <script src="https://cdn.tailwindcss.com"></script> -->
        @yield('custom_header_code')
        {!! str_replace(array('<p>','</p>'),'',html_entity_decode(setting('site.custom_header_code'))) !!}
        <style>
            .dark .bg-black,
            .bg-black,
            :is(.dark .dark\:bg-black) {
                background: #07072D !important;
            }

            html:not(.dark) .bg-black {
                background: #F6FBFF !important;
            }

            /* Dark mode styles */
            html.dark .brandDark2 {
                background-color: rgba(255, 255, 255, 0.10) !important;
                /* Dark mode background color */
            }

            /* Light mode styles */
            html:not(.dark) .brandDark2 {
                background-color: #FFFFFF !important;
                /* Light mode background color */
            }

            html:not(.dark) .text-black {
                color: #04041B !important;
            }

            html:not(.dark) .border-black {
                border-color: #04041B !important;
            }

            [type='text']:focus,
            [type='email']:focus,
            [type='url']:focus,
            [type='password']:focus,
            [type='number']:focus,
            [type='date']:focus,
            [type='datetime-local']:focus,
            [type='month']:focus,
            [type='search']:focus,
            [type='tel']:focus,
            [type='time']:focus,
            [type='week']:focus,
            [multiple]:focus,
            textarea:focus,
            select:focus {
                --tw-ring-color: #570AFF;
            }

            .text-brandPrimary {
                color: #570AFF;
            }

            .bg-brandPrimary,
            :is(.dark\:bg-brandPrimary) {
                background-color: #570AFF !important;
            }

            .border-brandPrimary,
            .peer-checked\:border-brandPrimary {
                border-color: #570AFF;
            }

            [modal-backdrop] {
                background-color: rgba(4, 4, 27, 0.70);
                backdrop-filter: blur(25px);
                z-index: 35;

            }

            .brandDark3 {
                background: #393957 !important;
            }

            .brandDark4 {
                background: #4d4d68 !important;
            }
        </style>
    </head>

    <body class="flex flex-col min-h-screen @if(Request::is('/')){{ 'bg-white' }}@else{{ 'bg-gray-50' }}@endif @if(config('wave.dev_bar')){{ 'pb-10' }}@endif bg-white dark:bg-black">
        <style type="text/css">
            .language-markup {

                display: none;
            }
        </style>
        {!! html_entity_decode(setting('site.custom_css')) !!}
        @if(config('wave.demo') && Request::is('/'))
        @include('theme::partials.demo-header')
        @endif

        @include('theme::partials.dashboard-header')

        <div class="flex" id="app">
            <div class="brandDark2">
                @include('theme::partials.dashboard-nav')
            </div>
            <div class="flex-1 overflow-auto dark:bg-black bg-black">
                <!--  w-full -->
                <main class="flex-grow overflow-x-hidden m-3 md:m-6">
                    @yield('content')
                </main>
            </div>
        </div>




        @include('theme::partials.dashboard-footer')



        <!-- Full Screen Loader -->
        <div id="fullscreenLoader" class="fixed inset-0 top-0 left-0 z-50 flex flex-col items-center justify-center hidden w-full h-full bg-gray-900 opacity-50">
            <svg class="w-5 h-5 mr-3 -ml-1 text-white animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <p id="fullscreenLoaderMessage" class="mt-4 text-sm font-medium text-white uppercase"></p>
        </div>
        <!-- End Full Loader -->


        @include('theme::partials.toast')
        @if(session('message'))
        <script>
            setTimeout(function() {
                popToast("{{ session('message_type') }}", "{{ session('message') }}");
            }, 10);
        </script>
        @endif
        @waveCheckout
        <!-- Scripts -->
        <script>
            //enable dark mode
            // tailwind.config = {
            //     darkMode: 'class'
            // }

            var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
            var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
            // Change the icons inside the button based on previous settings
            if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                themeToggleLightIcon.classList.remove('hidden');
            } else {
                themeToggleDarkIcon.classList.remove('hidden');
            }
            var themeToggleBtn = document.getElementById('theme-toggle');
            themeToggleBtn.addEventListener('click', function() {
                // toggle icons inside button
                themeToggleDarkIcon.classList.toggle('hidden');
                themeToggleLightIcon.classList.toggle('hidden');
                // if set via local storage previously
                if (localStorage.getItem('color-theme')) {
                    if (localStorage.getItem('color-theme') === 'light') {
                        document.documentElement.classList.add('dark');
                        localStorage.setItem('color-theme', 'dark');
                    } else {
                        document.documentElement.classList.remove('dark');
                        localStorage.setItem('color-theme', 'light');
                    }
                    // if NOT set via local storage previously
                } else {
                    if (document.documentElement.classList.contains('dark')) {
                        document.documentElement.classList.remove('dark');
                        localStorage.setItem('color-theme', 'light');
                    } else {
                        document.documentElement.classList.add('dark');
                        localStorage.setItem('color-theme', 'dark');
                    }
                }
            });
            if (!document.querySelector("html").classList.contains("dark")) {
                themeToggleBtn.click();
            }
        </script>
        <script>
            function hideAside() {
                var defaultSidebar = document.getElementById('default-sidebar');
                var displayAsideBtn = document.getElementById('displayAsideBtn');

                defaultSidebar.classList.add('hidden');
                displayAsideBtn.classList.remove('hidden');
            }

            function displayAside() {
                var defaultSidebar = document.getElementById('default-sidebar');
                var displayAsideBtn = document.getElementById('displayAsideBtn');

                defaultSidebar.classList.remove('hidden');
                displayAsideBtn.classList.add('hidden');
            }
        </script>
    </body>

    </html>