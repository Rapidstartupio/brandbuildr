@extends('theme::layouts.dashboard')


@section('content')

<h3 style="color: white; font-size: 24px; fontmy-family: Helvetica Neue; font-weight: 500; word-wrap: break-word">Dashboard</h3>
@include('theme::dashboard.nav')

<div class="mt-12 relative overflow-x-auto">
    <table class="table-auto w-full dark:text-white text-left bg-brand-700 deadlines-table">
        <thead>
            <tr>
                <th>Client</th>
                <th>Project Name</th>
                <th>Project Type</th>
                <th>Deadline</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
            <tr>
                <td>
                    @if(isset($project->client))
                    <button type="button" class="focus:outline-none rounded-lg  focus:ring-4  font-light rounded-lg text-base px-2" style="color: {{$project->client->tag_color}};background-color: {{$project->client->tag_bg_color}}">{{$project->client->tag ?? $project->client->company_name}}</button>
                    @endif
                </td>
                <td>
                    {{$project->name}}
                </td>
                <td>
                    {{$project->type}}
                </td>
                <td>
                    {{$project->end_date}}
                </td>
                <td>
                    <a href="/project/{{$project->id}}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                        </svg>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection