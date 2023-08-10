@extends('theme::layouts.empty')

@section('content')
<div class="py-4 mx-auto px-2 md:px-12 xl:px-28 text-white max-w-screen-2xl">
  <div class="text-center text-white text-2xl font-medium my-8">Create Your Brand Strategy</div>

  <div class="grid md:grid-cols-2  bg-gradient-to-r from-[#1E1E34] via-[#241E44] to-[#1E1E34] rounded-lg">
    <div class="md:border-r md:border-gray-700">
      <div class="h-16  pl-6 border-b border-gray-700 text-base font-medium flex items-center">Business Model</div>
      <div class="progress-bar w-1/3 h-0.5 bg-wave-500"></div>
      <div class="p-4 md:p-10">
        <div class="text-center">
          <h2 class="text-xl font-medium">What specific industry does your business operate in?</h2>
          <p class="text-sm font-light text-gray-400">Briefly describe what type of business you're building a brand for</p>
        </div>
        <div class="pt-12 md:px-6">
          <input type="text" class="w-full bg-transparent border-0 border-b border-white placeholder:text-gray-200 my-3 focus:ring-0 focus:border-wave-500 text-xs" placeholder="We oprate in the food and beverage industry">
          <button class="bg-wave-500 hover:bg-wave-700 text-white font-bold py-2 px-8 rounded-lg">
            Next
          </button>
        </div>
      </div>

    </div>
    <div>
      <div class="h-16  pl-6 border-b border-gray-700 text-base font-medium flex items-center">
        <ul class="flex flex-wrap -mb-px text-sm font-medium justify-center md:space-x-2 lg:space-x-6" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
          <li class="mr-2" role="presentation">
            <button class="inline-block p-1 border-b-2" id="ai-assist-tab" data-tabs-target="#ai-assist" type="button" role="tab" aria-controls="ai-assist" aria-selected="false">A.I. Assist</button>
          </li>
          <li class="mr-2" role="presentation">
            <button class="inline-block p-1 border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="examples-tab" data-tabs-target="#examples" type="button" role="tab" aria-controls="examples" aria-selected="false">Examples</button>
          </li>
          <li class="mr-2" role="presentation">
            <button class="inline-block p-1 border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="resources-tab" data-tabs-target="#resources" type="button" role="tab" aria-controls="resources" aria-selected="false">Resources</button>
          </li>
          <li class="mr-2" role="presentation">
            <button class="inline-block p-1 border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="notes-tab" data-tabs-target="#notes" type="button" role="tab" aria-controls="notes" aria-selected="false">Notes</button>
          </li>
        </ul>
      </div>
      <div id="myTabContent" class=" ">
        <div class="p-4 rounded-lg group" id="ai-assist" role="tabpanel" aria-labelledby="ai-assist-tab">
          <div class="m-4 min-h-[250px]  justify-center items-center">
            <div>
              <svg xmlns="http://www.w3.org/2000/svg" width="44" height="40" viewBox="0 0 44 40" fill="none">
                <path d="M33 27C33 29.22 31.22 31 29 31C26.78 31 25 29.22 25 27C25 24.78 26.8 23 29 23C31.2 23 33 24.8 33 27ZM15 23C12.8 23 11 24.8 11 27C11 29.2 12.8 31 15 31C17.2 31 19 29.22 19 27C19 24.78 17.22 23 15 23ZM44 26V32C44 33.1 43.1 34 42 34H40V36C40 38.22 38.22 40 36 40H8C6.93913 40 5.92172 39.5786 5.17157 38.8284C4.42143 38.0783 4 37.0609 4 36V34H2C0.9 34 0 33.1 0 32V26C0 24.9 0.9 24 2 24H4C4 16.26 10.26 10 18 10H20V7.46C18.8 6.78 18 5.48 18 4C18 1.8 19.8 0 22 0C24.2 0 26 1.8 26 4C26 5.48 25.2 6.78 24 7.46V10H26C33.74 10 40 16.26 40 24H42C43.1 24 44 24.9 44 26ZM40 28H36V24C36 18.48 31.52 14 26 14H18C12.48 14 8 18.48 8 24V28H4V30H8V36H36V30H40V28Z" fill="white" />
              </svg>
            </div>
            <div class="text-center mt-4">
              <a href="javascript:;" class="text-base font-medium leading-6 text-gray-500 whitespace-no-wrap   focus:outline-none focus:text-gray-900  border border-white px-12 py-2 text-white rounded-lg hover:text-black hover:bg-white focus:text-black focus:bg-white">
                Suggest
              </a>
            </div>
          </div>
          <div class=" ">
            <form>
              <div class="relative">

                <input type="search" id="search" class="block w-full text-sm bg-brand-700 border-0 my-3 focus:ring-0 focus:border-wave-500 rounded-md placeholder:text-gray-500" placeholder="Send a Message..">
                <button type="button" class="text-white absolute right-2.5 bottom-2">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M2 21L23 12L2 3V10L17 12L2 14V21Z" fill="#E9F6FF" />
                  </svg>
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="hidden p-4 rounded-lg group" id="examples" role="tabpanel" aria-labelledby="examples-tab">
          test2
        </div>
        <div class="hidden p-4 rounded-lg group" id="resources" role="tabpanel" aria-labelledby="resources-tab">
          test3
        </div>
        <div class="hidden p-4 rounded-lg group" id="notes" role="tabpanel" aria-labelledby="notes-tab">
          test4
        </div>
      </div>
    </div>
  </div>
  <!-- <div class="w-[1262px] h-[518px] relative bg-white bg-opacity-10 rounded-[15px]">
    <div class="w-[1262px] h-[0px] left-0 top-[56px] absolute border border-gray-600"></div>
    <div class="w-[220px] h-[3px] left-0 top-[56px] absolute bg-wave-500"></div>
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
        <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 640 512">
          
  <style>
    svg {
      fill: #ffffff
    }
  </style>
  <path d="M320 0c17.7 0 32 14.3 32 32V96H472c39.8 0 72 32.2 72 72V440c0 39.8-32.2 72-72 72H168c-39.8 0-72-32.2-72-72V168c0-39.8 32.2-72 72-72H288V32c0-17.7 14.3-32 32-32zM208 384c-8.8 0-16 7.2-16 16s7.2 16 16 16h32c8.8 0 16-7.2 16-16s-7.2-16-16-16H208zm96 0c-8.8 0-16 7.2-16 16s7.2 16 16 16h32c8.8 0 16-7.2 16-16s-7.2-16-16-16H304zm96 0c-8.8 0-16 7.2-16 16s7.2 16 16 16h32c8.8 0 16-7.2 16-16s-7.2-16-16-16H400zM264 256a40 40 0 1 0 -80 0 40 40 0 1 0 80 0zm152 40a40 40 0 1 0 0-80 40 40 0 1 0 0 80zM48 224H64V416H48c-26.5 0-48-21.5-48-48V272c0-26.5 21.5-48 48-48zm544 0c26.5 0 48 21.5 48 48v96c0 26.5-21.5 48-48 48H576V224h16z" />
  </svg>
</div>
<div class="w-[170px] h-9 px-8 py-2 left-0 top-[72px] absolute justify-center items-center gap-2.5 inline-flex">
  <button class="bg-wave-500 hover:bg-wave-700 text-white font-bold py-2 px-4 rounded">Suggest</button>
</div>
</div>
</div> -->
</div>

@endsection