@extends('theme::layouts.app')

@section('content')
    <div class="py-20 mx-auto max-w-7xl">
        <div class="text-center text-white text-2xl font-medium my-2">Create Your Brand Strategy</div>

       
       <div class="w-[1262px] h-[518px] relative bg-white bg-opacity-10 rounded-[15px]">
          <div class="w-[1262px] h-[0px] left-0 top-[56px] absolute border border-gray-600"></div>
          <div class="w-[518px] h-[0px] left-[659px] top-0 absolute origin-top-left rotate-90 border border-gray-600"></div>
          <div class="left-[24px] top-[18px] absolute text-white text-base font-medium">Business Model</div>
          <div class="left-[683px] top-[18px] absolute justify-start items-start gap-12 inline-flex">
            <div class="justify-start items-center gap-12 flex">
              <div class="flex-col justify-start items-start gap-0.5 inline-flex">
                <div class="text-blue-50 text-base font-medium">A.I. Assist</div>
              </div>
              <div class="text-zinc-400 text-base font-normal">Examples</div>
              <div class="text-zinc-400 text-base font-normal">Resources</div>
              <div class="text-zinc-400 text-base font-normal">Notes</div>
            </div>
          </div>
          <div class="left-[54px] top-[146px] absolute flex-col justify-start items-center gap-14 inline-flex">
            <div class="flex-col justify-start items-center gap-3 flex">
              <div class="w-[550px] text-center text-white text-xl font-medium">What specific industry does your business operate in?</div>
              <div class="w-[550px] text-center text-white text-sm font-light">Briefly describe what type of business you're building a brand for</div>
            </div>
            <div class="self-stretch grow shrink basis-0 flex-col justify-start items-start gap-4 flex">
              <div style="width: -webkit-fill-available;">
   
                <input type="text" id="business_description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="We oprate in the food and beverage industry" required>

                <div class="self-stretch h-[0px] border border-white"></div>
              </div>
           
                <a href="{{route('dashboard-onboarding','02')}}">
                  <div class="w-[99px] h-9 px-8 py-2 bg-wave-500 rounded-lg justify-center items-center gap-2.5 inline-flex">
                    <div class="text-center text-white text-base font-medium leading-tight">Next</div>
                  </div>
                </a>

            </div>
          </div>
          <div class="left-[691px] top-[446px] absolute rounded-[5px] flex-col justify-start items-start gap-[11px] inline-flex">
            <div class="flex-col justify-start items-start gap-1.5 flex">
              <div class="w-[539px] px-4 py-2 bg-white bg-opacity-10 rounded-[5px]  inline-flex">

                <div class="flex w-screen">
                      <input type="text" placeholder="Send a Message..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-500">
                      <button class="bg-wave-500 text-white py-2 px-4 ml-4 rounded-lg justify-end">Send</button>
                </div>
                <div class="w-6 h-6 relative"></div>
              </div>
            </div>
          </div>
          <div class="h-[108px] left-[876px] top-[146px] absolute">
            <div class="w-12 h-12 left-[61px] top-0 absolute flex-col justify-start items-start inline-flex">
                <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M320 0c17.7 0 32 14.3 32 32V96H472c39.8 0 72 32.2 72 72V440c0 39.8-32.2 72-72 72H168c-39.8 0-72-32.2-72-72V168c0-39.8 32.2-72 72-72H288V32c0-17.7 14.3-32 32-32zM208 384c-8.8 0-16 7.2-16 16s7.2 16 16 16h32c8.8 0 16-7.2 16-16s-7.2-16-16-16H208zm96 0c-8.8 0-16 7.2-16 16s7.2 16 16 16h32c8.8 0 16-7.2 16-16s-7.2-16-16-16H304zm96 0c-8.8 0-16 7.2-16 16s7.2 16 16 16h32c8.8 0 16-7.2 16-16s-7.2-16-16-16H400zM264 256a40 40 0 1 0 -80 0 40 40 0 1 0 80 0zm152 40a40 40 0 1 0 0-80 40 40 0 1 0 0 80zM48 224H64V416H48c-26.5 0-48-21.5-48-48V272c0-26.5 21.5-48 48-48zm544 0c26.5 0 48 21.5 48 48v96c0 26.5-21.5 48-48 48H576V224h16z"/></svg>
            </div>
            <div class="w-[170px] h-9 px-8 py-2 left-0 top-[72px] absolute justify-center items-center gap-2.5 inline-flex">
              <button class="bg-wave-500 hover:bg-wave-700 text-white font-bold py-2 px-4 rounded">Suggest</button>
            </div>
          </div>
        </div>
    </div>

@endsection