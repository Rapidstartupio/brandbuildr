<ul class="dark:text-gray-400 text-xl strategy-hun-nav">
    <a href="{{route('wave.dashboard')}}" class="border-b border-gray-400 py-3 flex justify-between @if(Request::is('dashboard')) active @endif">
        <span>Get Started</span>
        <span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 p-1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
        </span>
    </a>
    <a href="{{route('dashboard.strategy-hub.explore-strategies')}}" class="border-b border-gray-400 py-3 flex justify-between @if(Request::is('dashboard/strategy-hub/explore-strategies')) active @endif">
        <span>Explore Strategies</span>
        <span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 p-1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
        </span>
    </a>
</ul>