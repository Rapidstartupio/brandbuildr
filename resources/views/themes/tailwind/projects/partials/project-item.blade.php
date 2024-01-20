<div class="brandDark2 p-4 rounded-2xl space-y-3 flex flex-col">
    <div class="flex-grow space-y-4">
        <!-- items-center -->
        <div class="md:flex justify-between space-y-2 md:space-y-0 space-x-2">
            <div class="text-xl capitalize">{{$project->name}} | {{$project->type}}</div>
            <div class="">
                <div class="dark:text-wave-500 text-wave-500 border-4 border-wave-500 rounded-lg w-min">
                    <a class="bg-wave-500" href="{{route('project.details',$project->id )}}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 m-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.348a1.125 1.125 0 010 1.971l-11.54 6.347a1.125 1.125 0 01-1.667-.985V5.653z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="space-y-4 ">
            <ol class="space-y-3">
                @if(isset($project->client))
                <li>
                    <div class="dark:text-gray-400 flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path d="M10 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM3.465 14.493a1.23 1.23 0 0 0 .41 1.412A9.957 9.957 0 0 0 10 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 0 0-13.074.003Z" />
                        </svg>
                        <button type="button" class="focus:outline-none rounded-lg    focus:ring-4   font-light rounded-lg text-base px-2" style="color: {{$project->client->tag_color}};background-color: {{$project->client->tag_bg_color}}">{{$project->client->company_name}}</button>
                    </div>
                </li>
                @endif
                <li>
                    <div class="dark:text-gray-400 flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path fill-rule="evenodd" d="M4.5 2A1.5 1.5 0 0 0 3 3.5v13A1.5 1.5 0 0 0 4.5 18h11a1.5 1.5 0 0 0 1.5-1.5V7.621a1.5 1.5 0 0 0-.44-1.06l-4.12-4.122A1.5 1.5 0 0 0 11.378 2H4.5Zm2.25 8.5a.75.75 0 0 0 0 1.5h6.5a.75.75 0 0 0 0-1.5h-6.5Zm0 3a.75.75 0 0 0 0 1.5h6.5a.75.75 0 0 0 0-1.5h-6.5Z" clip-rule="evenodd" />
                        </svg>
                        <button type="button" class="focus:outline-none rounded-lg text-white bg-wave-500 hover:bg-wave-700 focus:ring-4 focus:ring-wave-700 font-light rounded-lg text-base px-2  dark:hover:bg-wave-700 dark:focus:ring-wave-700">{{$project->type}}</button>
                    </div>
                </li>
                <li>
                    <div class="dark:text-gray-400  flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm.75-13a.75.75 0 0 0-1.5 0v5c0 .414.336.75.75.75h4a.75.75 0 0 0 0-1.5h-3.25V5Z" clip-rule="evenodd" />
                        </svg>
                        <span class="dark:text-white dark:bg-gray-600 font-light rounded-lg text-base px-2">{{$project->formattedDeadline ? $project->formattedDeadline : '--'}}</span>
                    </div>
                </li>
                <li>
                    <div class="dark:text-gray-400  flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path d="M10 3.75a2 2 0 1 0-4 0 2 2 0 0 0 4 0ZM17.25 4.5a.75.75 0 0 0 0-1.5h-5.5a.75.75 0 0 0 0 1.5h5.5ZM5 3.75a.75.75 0 0 1-.75.75h-1.5a.75.75 0 0 1 0-1.5h1.5a.75.75 0 0 1 .75.75ZM4.25 17a.75.75 0 0 0 0-1.5h-1.5a.75.75 0 0 0 0 1.5h1.5ZM17.25 17a.75.75 0 0 0 0-1.5h-5.5a.75.75 0 0 0 0 1.5h5.5ZM9 10a.75.75 0 0 1-.75.75h-5.5a.75.75 0 0 1 0-1.5h5.5A.75.75 0 0 1 9 10ZM17.25 10.75a.75.75 0 0 0 0-1.5h-1.5a.75.75 0 0 0 0 1.5h1.5ZM14 10a2 2 0 1 0-4 0 2 2 0 0 0 4 0ZM10 16.25a2 2 0 1 0-4 0 2 2 0 0 0 4 0Z" />
                        </svg>
                        <span class="dark:text-white dark:bg-gray-600 font-light rounded-lg text-base px-2">{{($project->progress==100) ? 'Completed' : 'In Progress'}}</span>
                    </div>
                </li>
            </ol>


        </div>
    </div>
    <div class="space-y-2 pt-10">
        <div class="w-full bg-blue-50 rounded-full h-5 dark:bg-gray-600 relative text-center">
            <p class="dark:text-white absolute w-full left-0 top-1/2 -translate-y-1/2 flex justify-center items-center">{{$project->progress}}%</p>
            <div class="bg-wave-500 h-5 rounded-full" style="width: {{$project->progress}}%"></div>
        </div>
    </div>
</div>