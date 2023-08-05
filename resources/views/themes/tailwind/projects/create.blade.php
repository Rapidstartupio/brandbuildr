@extends('theme::layouts.dashboard')

@section('content')
<create-project dashboard-route="{{route('wave.dashboard')}}" save-client-route="{{route('projects.clients.store')}}" get-client-route="{{route('projects.get-user-clients')}}" />
@endsection