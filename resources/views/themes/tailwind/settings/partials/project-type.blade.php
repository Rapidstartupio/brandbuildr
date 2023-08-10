<div class="flex flex-wrap items-center justify-between border-b border-gray-200 sm:flex-no-wrap">
    <div class="relative p-6">
        <h3 class="flex text-lg font-medium leading-6 text-gray-600 dark:text-white">{{$projectType->name}}</h3>
    </div>
    <a href="javascript:;" onclick="toggleModal()">
      <div class="w-[220px] h-9 px-8 py-2 bg-wave-500 rounded-lg justify-center items-center gap-2.5">
        <div class="text-center text-white text-base font-medium leading-tight flex space-x-2">
          <svg class="w-[15px] h-[15px] text-gray-800 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
          </svg>
          <span>New Question</span>
        </div>
      </div>
    </a>
</div>

<div class="grid grid-cols-2 gap-2">
  <div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <tr class=" border-b   dark:border-gray-700">
            <td scope="row" class="px-6 py-4 font-medium text-gray-400 whitespace-nowrap">
                <a href="#">Brand DNA</a>
            </td>
            <td class="px-6 py-4 float-right"> <a href="#">></a></td>
        </tr>
        <tr class=" border-b   dark:border-gray-700">
            <td scope="row" class="px-6 py-4 font-medium text-gray-400 whitespace-nowrap">
                <a href="#">Audience Development</a>
            </td>
            <td class="px-6 py-4 float-right"> <a href="#">></a></td>
        </tr>
        <tr class="border-b dark:border-gray-700">
            <td scope="row" class="px-6 py-4 font-medium text-white whitespace-nowrap">
                <a href="#">Competitor Research</a>
            </td>
            <td class="px-6 py-4 float-right"> <a href="#">></a></td>
        </tr>
        <tr class="border-b dark:border-gray-700">
            <td scope="row" class="px-6 py-4 font-medium text-gray-400 whitespace-nowrap">
                <a href="#">Differentiation Strategy</a>
            </td>
            <td class="px-6 py-4 float-right"> <a href="#">></a></td>
        </tr>
        <tr class="border-b dark:border-gray-700">
            <td scope="row" class="px-6 py-4 font-medium text-gray-400 whitespace-nowrap">
                <a href="#">Archetypes, Personality & Voice</a>
            </td>
            <td class="px-6 py-4 float-right"> <a href="#">></a></td>
        </tr>
        <tr class="border-b dark:border-gray-700">
            <td scope="row" class="px-6 py-4 font-medium text-gray-400 whitespace-nowrap">
                <a href="#">Brand Messaging</a>
            </td>
            <td class="px-6 py-4 float-right"> <a href="#">></a></td>
        </tr>
        <tr class="border-b dark:border-gray-700">
            <td scope="row" class="px-6 py-4 font-medium text-gray-400 whitespace-nowrap">
                <a href="#">Brand Storytelling</a>
            </td>
            <td class="px-6 py-4 float-right"> <a href="#">></a></td>
        </tr>
        <tr class="border-b dark:border-gray-700">
            <td scope="row" class="px-6 py-4 font-medium text-gray-400 whitespace-nowrap">
                <a href="#">Brand Naming & Tagline</a>
            </td>
            <td class="px-6 py-4 float-right"> <a href="#">></a></td>
        </tr>
        
      </table>
    </div>
  </div>
  <div>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <tr class=" border-b   dark:border-gray-700">
          <td scope="row" class="px-6 py-4 font-medium text-gray-400 whitespace-nowrap">
          <h3 class="flex text-lg font-medium leading-6 text-gray-600 dark:text-white">Questions</h3>
          </td>
      </tr>
      <tr class=" border-b   dark:border-gray-700">
          <td scope="row" class="px-6 py-4 font-medium text-gray-400 whitespace-nowrap">
              <a href="#">Purpose</a>
          </td>
          <td class="px-6 py-4 float-right"> <a href="#"></a></td>
      </tr>
      <tr class=" border-b   dark:border-gray-700">
          <td scope="row" class="px-6 py-4 font-medium text-gray-400 whitespace-nowrap">
              <a href="#">Vision</a>
          </td>
          <td class="px-6 py-4 float-right"> <a href="#"></a></td>
      </tr>
      <tr class=" border-b   dark:border-gray-700">
          <td scope="row" class="px-6 py-4 font-medium text-gray-400 whitespace-nowrap">
              <a href="#">Mission</a>
          </td>
          <td class="px-6 py-4 float-right"> <a href="#"></a></td>
      </tr>
      <tr class=" border-b   dark:border-gray-700">
          <td scope="row" class="px-6 py-4 font-medium text-gray-400 whitespace-nowrap">
              <a href="#">Values</a>
          </td>
          <td class="px-6 py-4 float-right"> <a href="#"></a></td>
      </tr>
    </table>
  </div>
</div>



<form action=""></form>
<div class="fixed z-10 overflow-y-auto top-0 w-full left-0 hidden" id="modal">
  <div class="flex items-center justify-center min-height-100vh pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    <div class="fixed inset-0 transition-opacity">
      <div class="absolute inset-0 bg-gray-900 opacity-75" />
    </div>
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
      <div class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
      <form action="" method="POST" >
      {{ csrf_field() }}
          <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4 text-center">
            <label class="font-medium text-gray-800 ">Add New Question</label>
            <input type="text" class="w-full outline-none rounded bg-gray-100 p-2 mt-2 mb-3" name="question" required placeholder="Type your answer here..." />
             
          </div>
          <div class="bg-gray-200 px-4 py-3 text-right">
            <button type="button" class="py-2 px-4 bg-gray-500 text-white rounded hover:bg-gray-700 mr-2" onclick="toggleModal()"><i class="fas fa-times"></i> Cancel</button>
            <button type="submit" class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-700 mr-2"><i class="fas fa-plus"></i> Create</button>
          </div>
        </form>
      </div>
  </div>
</div>


<script type="text/javascript">
 function toggleModal() { 
    document.getElementById('modal').classList.toggle('hidden');
  }
</script>
