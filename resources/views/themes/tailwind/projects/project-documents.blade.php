@extends('theme::layouts.dashboard')


@section('content')
<div class="flex">
    <a href="/">
        <svg class="w-min" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path d="M8.57143 7.42849L4 11.9999M4 11.9999L8.57143 16.6045M4 11.9999H18.8571" stroke="#B6B6B8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </a>
    <div class="dark:text-gray-400 text-base">Project</div>
</div>
<!-- Modal toggle -->
<button id="pdf-preview-modal-btn" data-modal-target="pdf-preview-modal" data-modal-toggle="pdf-preview-modal" class="hidden block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
</button>
<!-- Main modal -->
<div id="pdf-preview-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-full max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-brand-700 h-full">
            <!-- Modal header -->
            <div class="flex items-center justify-betweenrounded-t">
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="pdf-preview-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4 w-full h-full bg-brand-700">
                <iframe id="pdf_preview_ifram" src="" frameborder="0" scrolling="auto" height="100%" width="100%"></iframe>
            </div>
        </div>
    </div>
</div>
<!-- <form action="{{route('download-project-document')}}" method="POST">
    @csrf
    <input type="hidden" name="projectId" value="{{$projectId}}">
    <input type="hidden" name="type" value="summary">
    <input type="hidden" name="view" value="true">
    <button type="submit" class="flex justify-center px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out border border-transparent rounded-md bg-wave-600 hover:bg-wave-500 focus:outline-none focus:border-wave-700 focus:shadow-outline-wave active:bg-wave-700">
        Template
    </button>
</form>
<br>
<form action="{{route('download-project-document')}}" method="POST">
    @csrf
    <input type="hidden" name="projectId" value="{{$projectId}}">
    <input type="hidden" name="type" value="summary">
    <button type="submit" class="flex justify-center px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out border border-transparent rounded-md bg-wave-600 hover:bg-wave-500 focus:outline-none focus:border-wave-700 focus:shadow-outline-wave active:bg-wave-700">
        Pdf
    </button>
</form> -->
<div class="pt-4">
    <ul class="dark:text-white text-xl">
        <div class="border-b border-gray-600 py-6 flex justify-between">
            <span>Brand Strategy Document</span>
            <div class="flex space-x-4">
                <button type="button" onclick="downloadDocument('overview')" class="border border-white py-2 px-4 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" data-slot="icon" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                </button>
                <a href="javascript:;" download="" onclick="downloadDocument('overview',true)" class="border border-wave-500 bg-wave-500 py-2 px-4 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" data-slot="icon" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                    </svg>
                </a>
            </div>
        </div>
        <div class="border-b border-gray-600 py-6 flex justify-between">
            <span>Answers to Questions</span>
            <div class="flex space-x-4">
                <button type="button" onclick="downloadDocument('summary')" class="border border-white py-2 px-4 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" data-slot="icon" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                </button>
                <a href="javascript:;" download="" onclick="downloadDocument('summary',true)" class="border border-wave-500 bg-wave-500 py-2 px-4 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" data-slot="icon" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                    </svg>
                </a>
            </div>
        </div>
        <div class="border-b border-gray-600 py-6 flex justify-between hidden">
            <span>Notes</span>
            <div class="flex space-x-4">
                <a href="" class="border border-white py-2 px-4 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" data-slot="icon" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                </a>
                <a href="" class="border border-wave-500 bg-wave-500 py-2 px-4 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" data-slot="icon" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                    </svg>
                </a>
            </div>
        </div>
    </ul>
</div>


@endsection


@section('javascript')
<script>
    function downloadDocument(type, download = false) {
        //e.preventDefault();
        var id = "{{$projectId}}";
        axios.post('/download-project-document', {
                projectId: id,
                documentType: type
            })
            .then(response => {
                if (response.data.status == "success") {
                    //console.log(response.data.file);
                    if (download) {
                        var myLink = "/storage" + response.data.file;
                        var element = document.createElement('a');
                        element.setAttribute('href', myLink);
                        element.setAttribute('download', "");
                        element.style.display = 'none';
                        document.body.appendChild(element);

                        element.click();
                        document.body.removeChild(element);
                    } else {
                        url = "/storage" + response.data.file;
                        var previewPdfBtn = document.getElementById("pdf-preview-modal-btn");

                        var pdfIframe = document.getElementById("pdf_preview_ifram");
                        pdfIframe.src = url;

                        previewPdfBtn.click();
                        //window.location.href = "/storage" + response.data.file;
                    }
                }
                console.log(response.data);
            })
            .catch(error => {
                console.log(error);
            });
    }
</script>
@endsection