@extends('theme::layouts.empty')

@section('content')
<div>
    <div id="outputContainer" style="max-height:75vh!important;" class="overflow-y-auto">
    </div>

    <div id="user-msg-area" class="fixed bottom-1 left-0 m-1 w-full flex items-center justify-center text-md">
        <textarea id="txtMsg" class="text-md bg-white text-black p-2 mr-3 dark:bg-slate-200 dark:text-black shadow rounded-md border flex-grow" rows="2" wrap="soft" placeholder="Input Text" onkeydown="if (event.keyCode == 13 &amp;&amp; !event.shiftKey) { event.preventDefault(); Send();}"></textarea>
        <button type="button" onclick="Send()" id="btnSend" class="text-center center h-9 text-xl text-bold top-70% right-1 transform -translate-y-1/10 -translate-x-1/3 dark:bg-gray-800 bg-green-500 hover:bg-green-700 text-white py-1 px-1 rounded-md">
            <svg id="btn-icon" class="fill-current dark:text-gray-400" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.56 122.88" style="display:block; margin: 0 auto; height: 100%; width: 100%;">
                <path d="M112.27,10.31l-99,38.07,30,14.37L89.21,33.18,60.44,80.53l14,29.06,37.81-99.28ZM2.42,44.49,117.16.37a3.73,3.73,0,0,1,3-.12,3.78,3.78,0,0,1,2.19,4.87L78.4,120.45a3.78,3.78,0,0,1-6.92.3l-22.67-47L2.14,51.39a3.76,3.76,0,0,1,.28-6.9Z"></path>
            </svg>
        </button>
    </div>
</div>




@endsection


@section('javascript')

<script type="text/javascript">
    var botSetup = 'You are a helpful marketing assistant from who helps companies and entreprenuers with their businesse';
    var previousMessages = [];

    var botIcon =
        '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 119.36 122.88" class="fill-current dark:text-gray-400" style="" xml:space="preserve"><g><path class="st0" d="M6.89,40.02h6.91v-1.6c0-2.14,0.43-4.18,1.2-6.04c0.81-1.93,1.98-3.68,3.45-5.14 c1.46-1.46,3.21-2.64,5.14-3.45c1.86-0.78,3.9-1.21,6.04-1.21h27.48v-0.14v-7.27c-0.45-0.16-0.87-0.37-1.28-0.6 c-0.57-0.34-1.1-0.75-1.56-1.21c-0.72-0.72-1.3-1.58-1.7-2.54c-0.38-0.92-0.59-1.94-0.59-2.99c0-1.06,0.21-2.07,0.59-2.99 c0.4-0.96,0.98-1.83,1.7-2.55c0.72-0.72,1.58-1.3,2.54-1.7C57.73,0.2,58.75,0,59.8,0c1.05,0,2.07,0.21,2.99,0.59 c0.96,0.4,1.83,0.98,2.55,1.7c0.72,0.72,1.3,1.58,1.7,2.55c0.38,0.92,0.59,1.94,0.59,2.99c0,1.06-0.21,2.07-0.59,2.99 c-0.4,0.96-0.98,1.83-1.7,2.54l-0.04,0.04c-0.46,0.45-0.97,0.85-1.53,1.18c-0.41,0.24-0.84,0.45-1.28,0.6v7.27v0.14h27.48 c2.14,0,4.18,0.43,6.04,1.21c1.94,0.81,3.68,1.98,5.14,3.45c1.46,1.46,2.64,3.21,3.45,5.14c0.78,1.87,1.2,3.9,1.2,6.04v1.6h6.66 c0.92,0,1.82,0.18,2.63,0.52c0.85,0.35,1.6,0.86,2.23,1.5l0.04,0.04c0.62,0.63,1.12,1.37,1.46,2.2c0.34,0.82,0.52,1.7,0.52,2.63 v18.38c0,0.92-0.18,1.82-0.52,2.63c-0.35,0.84-0.86,1.6-1.5,2.23l0,0c-1.24,1.24-2.97,2.02-4.87,2.02h-6.67 c-0.03,2.05-0.46,4.02-1.21,5.82c-0.81,1.94-1.98,3.68-3.45,5.14c-1.46,1.46-3.21,2.64-5.14,3.45c-1.87,0.78-3.9,1.2-6.04,1.2 H79.36v26.54h16.68c0.09-0.14,0.18-0.29,0.28-0.43c0.2-0.29,0.42-0.55,0.66-0.8c0.52-0.52,1.15-0.95,1.86-1.24 c0.68-0.28,1.42-0.43,2.19-0.43c0.76,0,1.52,0.15,2.19,0.43c0.71,0.29,1.33,0.72,1.86,1.24c0.52,0.52,0.95,1.15,1.24,1.86 c0.28,0.68,0.43,1.42,0.43,2.19c0,0.77-0.16,1.5-0.43,2.19c-0.29,0.71-0.72,1.34-1.24,1.86c-0.52,0.52-1.15,0.95-1.86,1.24 c-0.68,0.28-1.42,0.43-2.19,0.43c-0.75,0-1.47-0.14-2.15-0.42l-0.04-0.01c-0.71-0.29-1.33-0.72-1.86-1.24 c-0.32-0.32-0.61-0.7-0.85-1.09c-0.13-0.22-0.26-0.46-0.35-0.7H76.81c-0.71,0-1.34-0.29-1.81-0.75c-0.48-0.47-0.76-1.11-0.76-1.82 l0,0V87.79H61.83v24.23c0.19,0.1,0.38,0.2,0.56,0.32c0.34,0.21,0.66,0.48,0.94,0.75c0.53,0.53,0.95,1.15,1.24,1.86 c0.28,0.68,0.43,1.42,0.43,2.19c0,0.75-0.14,1.47-0.42,2.15l-0.01,0.04c-0.29,0.71-0.72,1.33-1.24,1.86 c-0.52,0.52-1.15,0.95-1.86,1.24c-0.68,0.28-1.42,0.43-2.19,0.43c-0.77,0-1.51-0.16-2.19-0.43c-0.71-0.29-1.34-0.72-1.86-1.24 c-0.52-0.52-0.95-1.15-1.24-1.86c-0.27-0.68-0.43-1.42-0.43-2.19c0-0.75,0.14-1.47,0.42-2.15l0.01-0.04 c0.29-0.71,0.72-1.33,1.24-1.86c0.27-0.28,0.58-0.52,0.91-0.73l0.04-0.03c0.18-0.1,0.37-0.2,0.56-0.3l0,0V87.79H40.18v13.37 c0,0.71-0.29,1.34-0.75,1.8c-0.47,0.47-1.1,0.75-1.81,0.75H25.88c-0.09,0.18-0.19,0.34-0.3,0.52c-0.2,0.3-0.43,0.59-0.7,0.85 l-0.05,0.04c-0.52,0.52-1.15,0.95-1.86,1.24c-0.68,0.28-1.42,0.43-2.19,0.43c-0.75,0-1.47-0.15-2.15-0.42l-0.04-0.01 c-0.71-0.29-1.33-0.72-1.86-1.24c-0.52-0.52-0.95-1.15-1.24-1.86c-0.28-0.68-0.43-1.42-0.43-2.19c0-0.76,0.16-1.51,0.43-2.2 c0.29-0.71,0.72-1.34,1.24-1.86c0.54-0.51,1.19-0.94,1.9-1.23l0,0c0.68-0.28,1.42-0.43,2.19-0.43c0.78,0,1.52,0.16,2.19,0.43 c0.68,0.29,1.3,0.7,1.81,1.22l0.04,0.03c0.29,0.29,0.56,0.62,0.78,0.97c0.11,0.19,0.23,0.39,0.33,0.61h9.11V87.79h-5.44 c-2.14,0-4.18-0.43-6.04-1.2c-1.94-0.81-3.68-1.98-5.14-3.45C16.99,81.68,15.81,79.93,15,78c-0.75-1.8-1.17-3.77-1.2-5.82H6.89 c-0.92,0-1.82-0.18-2.63-0.52c-0.85-0.35-1.6-0.86-2.23-1.5l-0.04-0.04c-0.62-0.63-1.12-1.37-1.46-2.2C0.18,67.11,0,66.21,0,65.29 V46.91c0-0.92,0.18-1.82,0.53-2.63c0.35-0.84,0.86-1.6,1.5-2.23l0,0c0.63-0.63,1.39-1.15,2.23-1.5 C5.07,40.21,5.96,40.02,6.89,40.02L6.89,40.02L6.89,40.02z M45.66,69.59c-0.14-0.11-0.25-0.22-0.36-0.36 c-0.32-0.39-0.49-0.84-0.5-1.29c-0.01-0.46,0.14-0.91,0.44-1.31c0.11-0.14,0.22-0.26,0.37-0.38c0.51-0.42,1.18-0.64,1.84-0.65 c0.66-0.01,1.32,0.18,1.85,0.58c1.81,1.39,3.59,2.4,5.36,3.07c1.75,0.66,3.48,0.97,5.19,0.95c1.72-0.02,3.46-0.38,5.24-1.05 c1.8-0.68,3.6-1.7,5.44-3.01c0.54-0.39,1.21-0.56,1.87-0.53c0.66,0.03,1.32,0.26,1.82,0.7c0.13,0.12,0.24,0.24,0.35,0.39 c0.29,0.41,0.43,0.87,0.4,1.33c-0.03,0.46-0.21,0.9-0.54,1.28c-0.12,0.13-0.25,0.25-0.41,0.36c-2.3,1.66-4.61,2.92-6.96,3.79 c-2.35,0.86-4.73,1.32-7.14,1.35c-2.42,0.03-4.81-0.38-7.19-1.24c-2.36-0.85-4.71-2.17-7.02-3.94L45.66,69.59L45.66,69.59 L45.66,69.59z M39.61,39.88c0.58,0,1.17,0.06,1.72,0.17c0.56,0.12,1.12,0.28,1.65,0.5c0.54,0.22,1.06,0.5,1.53,0.82 c0.47,0.31,0.9,0.66,1.29,1.05l0.06,0.05c0.41,0.41,0.78,0.85,1.1,1.34l0.02,0.03c0.31,0.47,0.58,0.97,0.8,1.51 c0.22,0.53,0.39,1.09,0.5,1.65c0.11,0.56,0.18,1.14,0.18,1.72c0,0.58-0.06,1.17-0.18,1.72C48.17,51,48,51.55,47.78,52.1 c-0.22,0.54-0.5,1.06-0.82,1.53c-0.97,1.46-2.36,2.59-3.98,3.25c-0.53,0.22-1.09,0.39-1.66,0.51c-0.56,0.11-1.14,0.16-1.72,0.16 c-0.58,0-1.17-0.06-1.72-0.16c-0.56-0.12-1.12-0.28-1.66-0.51c-0.54-0.22-1.06-0.5-1.54-0.82c-0.5-0.33-0.94-0.7-1.34-1.1 c-0.41-0.41-0.78-0.85-1.1-1.34l-0.02-0.03c-0.31-0.47-0.58-0.97-0.8-1.51c-0.22-0.53-0.39-1.09-0.51-1.65 c-0.11-0.56-0.16-1.14-0.16-1.72c0-0.58,0.06-1.17,0.16-1.72c0.12-0.56,0.28-1.12,0.51-1.65c0.22-0.54,0.5-1.06,0.82-1.53 c0.33-0.5,0.7-0.94,1.1-1.34c0.41-0.41,0.85-0.78,1.34-1.1l0.03-0.02c0.47-0.31,0.97-0.58,1.51-0.8c0.53-0.22,1.09-0.39,1.65-0.5 C38.44,39.94,39.02,39.88,39.61,39.88L39.61,39.88L39.61,39.88z M80,39.88c0.58,0,1.17,0.06,1.72,0.17 c0.56,0.12,1.12,0.28,1.65,0.5c0.54,0.22,1.06,0.5,1.53,0.82c0.46,0.31,0.88,0.65,1.27,1.04c0.02,0.02,0.05,0.04,0.07,0.06 c0.41,0.41,0.78,0.85,1.1,1.34l0.02,0.03c0.31,0.47,0.58,0.97,0.8,1.51c0.22,0.53,0.39,1.09,0.51,1.65 c0.11,0.56,0.16,1.14,0.16,1.72c0,0.58-0.06,1.17-0.16,1.72c-0.12,0.56-0.28,1.12-0.51,1.66c-0.22,0.54-0.5,1.06-0.82,1.53 c-0.33,0.5-0.7,0.94-1.1,1.34c-0.41,0.41-0.85,0.78-1.34,1.1l-0.03,0.02c-0.48,0.31-0.97,0.58-1.51,0.8 c-0.53,0.22-1.09,0.39-1.66,0.51c-0.56,0.11-1.14,0.16-1.72,0.16c-0.58,0-1.17-0.06-1.72-0.16c-0.56-0.12-1.12-0.28-1.66-0.51 c-0.55-0.23-1.07-0.51-1.53-0.82l-0.05-0.04c-0.47-0.32-0.9-0.67-1.29-1.06c-0.41-0.41-0.78-0.85-1.1-1.34l-0.02-0.03 c-0.31-0.47-0.58-0.97-0.8-1.51c-0.22-0.53-0.39-1.09-0.51-1.65c-0.11-0.56-0.17-1.14-0.17-1.72c0-0.58,0.06-1.17,0.17-1.72 c0.12-0.56,0.28-1.12,0.51-1.65c0.22-0.54,0.5-1.06,0.82-1.53c0.33-0.5,0.7-0.94,1.1-1.34c0.4-0.4,0.85-0.77,1.34-1.1 c0.48-0.32,0.99-0.59,1.53-0.83c0.53-0.22,1.09-0.39,1.65-0.5C78.84,39.94,79.42,39.88,80,39.88L80,39.88L80,39.88z M17.67,41.97 v29.99c0,1.61,0.32,3.15,0.9,4.56c0.61,1.46,1.5,2.78,2.6,3.89c1.11,1.11,2.43,2,3.89,2.6c1.4,0.58,2.94,0.9,4.56,0.9h60.36 c1.61,0,3.15-0.32,4.56-0.9c1.46-0.61,2.78-1.5,3.89-2.6c1.11-1.11,2-2.43,2.6-3.89c0.58-1.4,0.9-2.94,0.9-4.56V38.42 c0-1.61-0.32-3.16-0.9-4.56c-0.61-1.46-1.5-2.78-2.6-3.89c-1.11-1.11-2.43-2-3.89-2.6c-1.4-0.58-2.94-0.9-4.56-0.9H29.63 c-1.61,0-3.15,0.32-4.56,0.9c-1.46,0.61-2.78,1.5-3.89,2.6c-1.11,1.11-2,2.43-2.6,3.89c-0.58,1.4-0.9,2.94-0.9,4.56L17.67,41.97 L17.67,41.97L17.67,41.97z M13.79,43.9H6.89c-0.41,0-0.8,0.08-1.15,0.22c-0.37,0.16-0.7,0.38-0.98,0.66l-0.04,0.03 c-0.26,0.27-0.48,0.59-0.62,0.94c-0.15,0.35-0.22,0.74-0.22,1.15v18.38c0,0.41,0.08,0.8,0.22,1.15c0.16,0.37,0.38,0.7,0.66,0.98 c0.54,0.54,1.29,0.88,2.12,0.88h6.91L13.79,43.9L13.79,43.9L13.79,43.9z M112.48,43.9h-6.66v24.39h6.66c0.41,0,0.8-0.08,1.15-0.22 c0.37-0.16,0.7-0.38,0.98-0.66c0.28-0.28,0.51-0.61,0.66-0.98c0.15-0.35,0.22-0.74,0.22-1.15V46.91c0-0.41-0.08-0.8-0.22-1.15 c-0.16-0.37-0.38-0.7-0.66-0.98l0,0c-0.28-0.28-0.61-0.51-0.98-0.66C113.28,43.99,112.89,43.9,112.48,43.9L112.48,43.9L112.48,43.9 z"></path></g></svg>';
    var humanIcon =
        '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 102.74 122.88" class="fill-current dark:text-gray-400" style="" xml:space="preserve"><style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd;}</style><g><path class="st0" d="M51.31,103.57c2.96,0,5.35,2.4,5.35,5.35c0,2.96-2.4,5.35-5.35,5.35c-2.96,0-5.35-2.4-5.35-5.35 C45.96,105.96,48.36,103.57,51.31,103.57L51.31,103.57z M31.25,37.01c-1.11,0.04-1.96,0.27-2.54,0.66 c-0.33,0.22-0.57,0.5-0.73,0.84c-0.17,0.37-0.25,0.83-0.24,1.35c0.04,1.53,0.85,3.53,2.4,5.83l0.02,0.03l0,0l5.03,8 c2.02,3.21,4.13,6.48,6.76,8.88c2.53,2.31,5.59,3.87,9.65,3.88c4.39,0.01,7.6-1.61,10.21-4.05c2.71-2.54,4.85-6.02,6.96-9.49 l5.67-9.33c1.06-2.41,1.44-4.02,1.2-4.97c-0.14-0.56-0.76-0.84-1.82-0.89c-0.22-0.01-0.46-0.01-0.69-0.01 c-0.25,0.01-0.52,0.02-0.79,0.05c-0.15,0.01-0.3,0-0.44-0.03c-0.5,0.03-1.02-0.01-1.55-0.08l1.94-8.59 c-14.4,2.27-25.17-8.42-40.39-2.14l1.1,10.12C32.37,37.11,31.78,37.09,31.25,37.01L31.25,37.01L31.25,37.01z M75.73,35.2 c1.39,0.42,2.29,1.31,2.65,2.74c0.4,1.59-0.03,3.82-1.38,6.87l0,0c-0.02,0.06-0.05,0.11-0.08,0.16l-5.73,9.44 c-2.21,3.64-4.45,7.29-7.45,10.09l-0.15,0.13c0.29,0.41,0.6,0.87,0.92,1.34c0.99,1.46,2.13,3.12,3.18,4.42 c6.23,3.87,19.93,4.92,25.29,7.9c13.64,7.6,8.66,26.07,9.65,39.36c-0.29,3.14-2.07,4.94-5.58,5.21h-3.79l4.15-31.5 c0.32-2.45-1.42-4.46-3.56-4.46h-29.2c0.72-5.15,1.25-10.07,1.49-13.78c-1.36-1.52-2.82-3.65-4.07-5.49 c-0.28-0.41-0.55-0.8-0.8-1.17c-2.63,1.77-5.76,2.86-9.68,2.85c-4.37-0.01-7.77-1.51-10.6-3.8c-0.79,2.37-1.96,5.63-3.08,7.18 c-0.1,0.14-0.22,0.26-0.35,0.35c0.48,3.84,1.15,8.76,1.94,13.86H9.58c-2.14,0-3.89,2.01-3.56,4.46l4.15,31.5H6.38 c-3.5-0.27-5.28-2.07-5.57-5.21c0.17-14.07-5.17-31.1,9.65-39.36c5.43-3.03,19.42-4.06,25.53-8.06c0.93-1.75,1.97-4.9,2.59-6.78 c0.07-0.21-0.05,0.14,0.06-0.18c-2.24-2.41-4.08-5.26-5.84-8.06l-5.03-8c-1.84-2.74-2.8-5.25-2.85-7.31 c-0.03-0.97,0.14-1.85,0.49-2.62c0.38-0.81,0.95-1.49,1.73-2.01c0.36-0.25,0.77-0.45,1.22-0.62c-0.33-4.34-0.45-9.8-0.24-14.38 c0.11-1.09,0.32-2.17,0.62-3.26c1.84-6.58,7.5-11.32,13.96-13.55c3.13-1.08,1.92-3.66,5.09-3.49c7.51,0.41,19.09,5.25,23.54,10.38 C77.55,17.58,75.95,26.43,75.73,35.2L75.73,35.2L75.73,35.2z M41.36,79.19c-2.54-2.89-2.75-5.91,0-9.11 c3.18,0.8,6.1,2.18,8.78,4.04c0.58-0.25,1.25-0.36,1.91-0.31c2.79-1.98,6.35-2.77,9.46-4.26c3.71,3.62,3.32,6.94-0.34,10.04 c-2.04-0.47-3.98-1.19-5.84-2.13c-0.05,0.48-0.18,1-0.4,1.57l0.95,7.89h-7.58l0.95-7.89c-0.59-1-0.82-1.86-0.8-2.57 C46.25,77.78,43.86,78.62,41.36,79.19L41.36,79.19z"></path></g></svg>';
    var errorIcon =
        '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 113.45 122.88" class="fill-current dark:text-gray-400" style="" xml:space="preserve"><style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd;}</style><g><path class="st0" d="M105.36,68.94c5.04,5.72,8.09,13.23,8.09,21.45c0,17.94-14.54,32.49-32.49,32.49 c-12.45,0-23.27-7.01-28.72-17.29H37.43v6.94h-22.1v-6.94H0.01v-8.06h15.32v-7.01h7.02V74.65H7.24c-1.99,0-3.8-0.81-5.11-2.12 C0.81,71.22,0,69.41,0,67.42V41.99c0-1.77,0.64-3.4,1.71-4.66C0.64,36.07,0,34.44,0,32.66V7.24c0-1.99,0.81-3.8,2.12-5.11 C3.43,0.81,5.24,0,7.24,0h91.06c1.99,0,3.8,0.81,5.11,2.12c1.31,1.31,2.12,3.12,2.12,5.11v25.43c0,1.77-0.65,3.4-1.71,4.66 c1.07,1.26,1.71,2.89,1.71,4.66v25.43C105.53,67.93,105.47,68.44,105.36,68.94L105.36,68.94z M77.86,100.67h6.88v6.08h-6.88V100.67 L77.86,100.67z M84.74,96.53h-6.87c-0.68-8.35-2.12-10.16-2.12-18.49c0-3.07,2.49-5.57,5.57-5.57c3.07,0,5.57,2.49,5.57,5.57 C86.89,86.37,85.43,88.19,84.74,96.53L84.74,96.53z M49.27,97.53c-0.52-2.3-0.79-4.69-0.79-7.14c0-5.71,1.48-11.08,4.06-15.74H30.4 v15.88h7.02v7.01H49.27L49.27,97.53z M26.38,96.51c2.77,0,5.02,2.25,5.02,5.02c0,2.77-2.25,5.02-5.02,5.02 c-2.77,0-5.02-2.25-5.02-5.02C21.36,98.76,23.6,96.51,26.38,96.51L26.38,96.51z M14.17,13.03h5.35v13.85h-5.35V13.03L14.17,13.03z M87.69,50.46c2.34,0,4.24,1.9,4.24,4.24c0,2-1.38,3.67-3.24,4.12c1.68,0.41,3.31,0.95,4.88,1.61c2.45,1.03,4.75,2.34,6.86,3.91 V41.99c0-0.58-0.24-1.12-0.63-1.5c-0.3-0.3-0.69-0.51-1.12-0.59c-0.13,0.01-0.26,0.01-0.38,0.01H7.24c-0.13,0-0.26,0-0.38-0.01 c-0.43,0.08-0.82,0.29-1.12,0.59C5.34,40.87,5.1,41.4,5.1,41.99v25.43c0,0.58,0.24,1.12,0.63,1.5c0.39,0.39,0.92,0.63,1.5,0.63 H55.8c2.94-3.48,6.58-6.34,10.7-8.35c4.35-2.12,9.23-3.31,14.39-3.31c1.48,0,2.94,0.1,4.37,0.29c-1.1-0.77-1.81-2.04-1.81-3.48 C83.45,52.36,85.35,50.46,87.69,50.46L87.69,50.46z M71.54,50.46c2.34,0,4.24,1.9,4.24,4.24c0,2.34-1.9,4.24-4.24,4.24 c-2.34,0-4.24-1.9-4.24-4.24C67.3,52.36,69.2,50.46,71.54,50.46L71.54,50.46z M43.75,47.78h5.35v13.85h-5.35V47.78L43.75,47.78z M28.96,47.78h5.35v13.85h-5.35V47.78L28.96,47.78z M14.17,47.78h5.35v13.85h-5.35V47.78L14.17,47.78z M87.69,15.71 c2.34,0,4.24,1.9,4.24,4.24c0,2.34-1.9,4.24-4.24,4.24c-2.34,0-4.24-1.9-4.24-4.24C83.45,17.61,85.35,15.71,87.69,15.71 L87.69,15.71z M71.54,15.71c2.34,0,4.24,1.9,4.24,4.24c0,2.34-1.9,4.24-4.24,4.24c-2.34,0-4.24-1.9-4.24-4.24 C67.3,17.61,69.2,15.71,71.54,15.71L71.54,15.71z M43.75,13.03h5.35v13.85h-5.35V13.03L43.75,13.03z M28.96,13.03h5.35v13.85h-5.35 V13.03L28.96,13.03z M6.85,34.76c0.13-0.01,0.26-0.01,0.38-0.01h91.06c0.13,0,0.26,0,0.38,0.01c0.43-0.08,0.82-0.29,1.12-0.59 c0.39-0.39,0.63-0.92,0.63-1.5V7.24c0-0.58-0.24-1.12-0.63-1.51c-0.39-0.39-0.92-0.63-1.5-0.63H7.24c-0.58,0-1.12,0.24-1.51,0.63 C5.34,6.12,5.1,6.65,5.1,7.24v25.43c0,0.58,0.24,1.12,0.63,1.5C6.03,34.47,6.42,34.68,6.85,34.76L6.85,34.76z M97.96,68.85 c-1.93-1.5-4.06-2.76-6.34-3.72c-3.29-1.38-6.92-2.14-10.72-2.14c-2.37,0-4.67,0.3-6.87,0.86c-11.79,3.08-20.49,13.8-20.49,26.55 c0,15.15,12.28,27.44,27.44,27.44s27.44-12.28,27.44-27.44C108.4,81.66,104.32,73.88,97.96,68.85L97.96,68.85z"></path></g></svg>';





    var isFirstRequest = true;
    var engineId = "";
    let previousResponseText;
    var sUserId = "1";

    function sendOpenAIRequest(model, sQuestion) {
        var oHttp = new XMLHttpRequest();
        var endpoint = "/openai/chat";
        var iMaxTokens = 4096;
        var data = {
            model: model,
            prompt: botSetup + sQuestion,
            max_tokens: iMaxTokens,
            user: sUserId,
            temperature: 0.5,
            frequency_penalty: 0.0,
            presence_penalty: 0.0,
            stop: ["#", ";"]
        };
        var messages = [];

        // Add previous messages
        for (var i = 0; i < previousMessages.length; i++) {
            messages.push(previousMessages[i]);
        }

        // Add new message
        messages.push({
            role: "user",
            content: sQuestion
        });

        // Add previous assistant response
        if (previousResponseText != "") {
            messages.push({
                role: "assistant",
                content: previousResponseText
            });
        }

        data = {
            model: model,
            messages: [{
                    role: "system",
                    content: botSetup
                },
                ...previousMessages,
                {
                    role: "user",
                    content: sQuestion
                }
            ]
        };


        oHttp.open("POST", endpoint);
        oHttp.setRequestHeader("Accept", "application/json");
        oHttp.setRequestHeader("Content-Type", "application/json");
        //oHttp.setRequestHeader("Authorization", "Bearer " + OPENAI_API_KEY);
        oHttp.setRequestHeader("X-CSRF-TOKEN", "{{csrf_token()}}");

        oHttp.send(JSON.stringify(data));

        oHttp.onreadystatechange = function() {
            if (oHttp.readyState === 4) {
                var oJson = JSON.parse(oHttp.responseText);
                handleResponse(oJson, sQuestion);
            }
        };
    }

    function Send() {
        sendButton();
        var sQuestion = txtMsg.value;
        if (sQuestion == "") {
            alert("Type in your question!");
            txtMsg.focus();
            sendFail();
            return;
        }
        var sModel = "gpt-3.5-turbo";
        // Create user message container
        var userMsgContainer = userMessage(sQuestion);
        sendOpenAIRequest(sModel, sQuestion);
    }

    // Function to handle the various response text areas UI
    function createElement(elementType, className) {
        var element = document.createElement(elementType);
        if (className) {
            element.setAttribute("class", className);
        }
        return element;
    }

    function handleResponse(oJson, sQuestion) {
        var outputDiv = document.getElementById("outputContainer");
        // Create new message container
        var messageContainer = createElement("div", "flex items-center");
        // Create icon
        var icon;
        if (oJson.error && oJson.error.message) {
            icon = errorIcon;
        } else if (
            oJson.choices &&
            oJson.choices[0].message
        ) {
            icon = botIcon;
        } else if (oJson.choices && oJson.choices[0].text) {
            icon = botIcon;
        }
        var iconDiv = createElement(
            "div",
            "text-center mr-2 text-gray-600 text-xl h-8 w-8"
        );
        iconDiv.innerHTML = icon;

        // Create message textarea
        var messageTextarea = createElement(
            "textarea",
            "text-md readonly bg-white text-black p-2 rounded-md dark:bg-gray-800 dark:text-slate-50 shadow mt-2 flex-grow"
        );
        if (oJson.error && oJson.error.message) {
            messageTextarea.value = "Error: " + oJson.error.message;
        } else if (
            oJson.choices &&
            oJson.choices[0].message
        ) {
            var s = oJson.choices[0].message.content.replace(/^\n+/, "");
            if (s == "") s = "No response";
            messageTextarea.value = s;
            messageTextarea.setAttribute("readonly", true);

            previousMessages.push({
                role: "user",
                content: sQuestion
            });
            previousMessages.push({
                role: "assistant",
                content: s
            });
        } else if (oJson.choices && oJson.choices[0].text) {
            var s = oJson.choices[0].text.replace(/^\n+/, "");
            if (s == "") s = "No response";
            messageTextarea.value = "AI: " + s;
        } else {
            messageTextarea.value = "Me: " + sQuestion;
            sendSuccess();
        }

        // Add message container to output div
        outputDiv.appendChild(messageContainer);

        // Add icon and message textarea to message container
        messageContainer.appendChild(iconDiv);
        messageContainer.appendChild(messageTextarea);

        //resize
        adjustTextareaHeight(messageTextarea);
        //adjustTextareaHeight(userMsgContainer);
        //txtMsg.value = "";
        if (oJson.error && oJson.error.message) {
            sendFail();
        } else {
            sendSuccess();
        }
        sendSuccess();
    }

    function userMessage(sQuestion) {
        // Create user message container with icon
        var userMsgContainer = createElement("div", "flex items-center");
        var userIconDiv = createElement(
            "div",
            "text-center mr-2 text-gray-600 text-xl h-8 w-8"
        );
        userIconDiv.innerHTML = humanIcon;
        var userMsgTextarea = createElement(
            "textarea",
            "text-md readonly bg-gray-100 border-none text-black p-2 rounded-md dark:bg-gray-900 dark:text-slate-50 mt-2 flex-grow"
        );
        userMsgTextarea.value = sQuestion;
        userMsgTextarea.setAttribute("readonly", true);
        userMsgContainer.appendChild(userIconDiv);
        userMsgContainer.appendChild(userMsgTextarea);

        // Add user message container to output div
        var outputDiv = document.getElementById("outputContainer");
        outputDiv.appendChild(userMsgContainer);

        //resize
        adjustTextareaHeight(userMsgTextarea);
    }

    // function to adjust textarea height
    function adjustTextareaHeight(textarea) {
        textarea.style.height = "auto";
        textarea.style.height = `${textarea.scrollHeight}px`;
    }

    // adjust height of all textareas on page load
    const textareas = document.querySelectorAll(".auto-resize");
    textareas.forEach((textarea) => {
        adjustTextareaHeight(textarea);
    });



    function sendButton() {
        // Disable editing of text area
        document.getElementById("txtMsg").readOnly = true;
        // Change button icon to spin around
        document.getElementById("btn-icon").classList.add("animate-spin");
        // Disable button
        document.getElementById("btnSend").disabled = true;
    }

    function sendSuccess() {
        // Enable editing of text area
        document.getElementById("txtMsg").readOnly = false;
        // Clear text area
        document.getElementById("txtMsg").value = "";
        // Reset button icon to original position
        document.getElementById("btn-icon").classList.remove("animate-spin");
        // Enable button
        document.getElementById("btnSend").disabled = false;
    }

    function sendFail() {
        // Enable editing of text area
        document.getElementById("txtMsg").readOnly = false;
        // Reset button icon to original position
        document.getElementById("btn-icon").classList.remove("animate-spin");
        // Enable button
        document.getElementById("btnSend").disabled = false;
    }
</script>
@endsection