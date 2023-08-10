@extends('theme::layouts.app')

@section('content')
    <div class="py-20 mx-auto max-w-7xl">
      <div class="text-center text-white text-2xl font-medium my-2 mb-10">Create Your Brand Strategy</div>

       <div class="grid grid-cols-2 gap-2 bg-white bg-opacity-10 rounded-[15px]">
          <div class="block  border-r">
            <div class="border-b border-gray-150 px-6 py-3  text-white  text-base font-medium">
              Business Model
            </div>
            <div class="w-[220px] h-[3px] left-0 top-[56px] bg-wave-500"></div>

            <div class="p-6 my-20 text-center ">
              <h5
                class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50 text-center text-white text-xl font-medium">
                What specific industry does your business operate in?
              </h5>
              <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200 text-center text-white text-sm font-light">
                Briefly describe what type of business you're building a brand for
              </p>

              <div class="self-stretch grow shrink basis-0 flex-col justify-start items-start gap-4 flex py-10 mx-10">
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
          </div>
          <div>

          </div>
        </div>
    </div>

@endsection