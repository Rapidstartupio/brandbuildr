<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 dark:text-white">
                    Project Types
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex justify-end">
				    	<a href="javascript:;" onclick="toggleModal()">
				          <div class="w-[170px] h-9 px-8 py-2 bg-wave-500 rounded-lg justify-center items-center gap-2.5">
				            <div class="text-center text-white text-base font-medium leading-tight flex space-x-2">
					            <svg class="w-[15px] h-[15px] text-gray-800 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
								    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
								</svg>
								<span>New Type</span>
							</div>
				          </div>
				        </a>
				    </div>
                </th>
            </tr>
        </thead>
        <tbody>
          @if(auth()->user()->projectTypes->count() > 0)
            @foreach(auth()->user()->projectTypes as $type)
              <tr class=" dark:border-gray-700">
                  <th scope="row" class="px-6 py-4 border-b font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      <a href="/settings/project-types/{{$type->id}}">{{$type->name}}</a>
                  </th>
                  <td class="px-6 py-4"></td>
              </tr>
            @endforeach
          @endif
        </tbody>
    </table>
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
          <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <label class="font-medium text-gray-800">Name</label>
            <input type="text" class="w-full outline-none rounded bg-gray-100 p-2 mt-2 mb-3" name="name" required/>
             
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
