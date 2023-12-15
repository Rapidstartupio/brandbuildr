<div class="dark:text-white my-6 dashboard-nav">
    <div class="text-sm font-medium text-center text-gray-500 dark:text-gray-400 md:flex">
        <ul class="flex flex-wrap -mb-px text-lg">
            <li class="mr-10">
                <a href="{{route('wave.dashboard')}}" class="inline-block  py-2 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 @if(Request::is('dashboard','dashboard/strategy-hub/explore-strategies')) active @endif">Strategy Hub</a>
            </li>
            <li class="mr-10">
                <a href="{{route('dashboard.deadlines')}}" class="inline-block  py-2 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 @if(Request::is('dashboard/deadlines')) active @endif">Deadlines</a>
            </li>
        </ul>
    </div>
</div>