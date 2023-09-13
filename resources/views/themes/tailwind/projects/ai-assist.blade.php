@extends('theme::layouts.dashboard')
@section('custom_header_code')
<style type="text/css">
    /* .project-sections .section-title:last-of-type {
        background: linear-gradient(90deg, #B6B6B8 0%, rgba(182, 182, 184, 0.00) 119.02%);
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    } */

    /* .project-sections span:last-child {
        display: none;
    } */
    /* .project-sections .section-title:first-of-type {
        background: linear-gradient(90deg, rgba(182, 182, 184, 0.00) 0%, #B6B6B8 119.02%);
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    } */
</style>
@endsection
@section('content')
<ai-assist project-id="{{$id}}" section-id="{{$sectionId}}" block-id="{{$blockId}}" />
@endsection