<ul class="flex flex-wrap -mb-px text-lg">
    <li class="mr-10">
        <a href="{{route('projects.index')}}" class="inline-block py-2 border-b-2 rounded-t-lg @if(Request::is('projects')) border-white active dark:text-white dark:border-white @else border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 @endif" aria-current="page">Projects</a>
    </li>
    <li class="mr-10">
        <a href="{{route('clients.index')}}" class="inline-block py-2 border-b-2 rounded-t-lg @if(Request::is('projects/clients')) border-white active dark:text-white dark:border-white @else border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 @endif">Clients</a>
    </li>
    <li class="mr-10">
        <a href="{{route('projects.project-types')}}" class="inline-block py-2 border-b-2 rounded-t-lg @if(Request::is('projects/project-types')) border-white active dark:text-white dark:border-white @else border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 @endif">Project Types</a>
    </li>
</ul>