<form action="{{ route('wave.settings.security.put') }}" method="POST" enctype="multipart/form-data">
    <h3 class="text-xl" style="">
        White Label
    </h3>
    <p class="text-gray-400 py-4 text-sm">Give your clients a seamless branded experience</p>
    <hr class="my-6 h-0.5 border-t-0 bg-[#504A6A] opacity-100 dark:opacity-50" />
    <h3 class="my-5 text-xl" style="">
        Your Company Logo
    </h3>
    <div class="relative flex flex-col py-8">

        <div>
            <label for="current_password" class="block text-sm font-medium leading-5 text-white">Current Password</label>
            <div class="mt-1 rounded-md shadow-sm">
                <input id="current_password" type="password" name="current_password" require placeholder="Current Password" class="bg-gray-50 border-0 text-gray-900 text-sm rounded focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 brandDark3">
            </div>
        </div>

        <div class="mt-5">
            <label for="password" class="block text-sm font-medium leading-5 text-white">New Password</label>
            <div class="mt-1 rounded-md shadow-sm">
                <input id="password" type="password" name="password" placeholder="New Password" require class="bg-gray-50 border-0 text-gray-900 text-sm rounded focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 brandDark3">
            </div>
        </div>

        <div class="mt-5">
            <label for="password_confirmation" class="block text-sm font-medium leading-5 text-white">Confirm New Password</label>
            <div class="mt-1 rounded-md shadow-sm">
                <input id="password_confirmation" type="password" name="password_confirmation" require placeholder="Confirm New Password" class="bg-gray-50 border-0 text-gray-900 text-sm rounded focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 brandDark3">
            </div>
        </div>

        <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        <div class="flex justify-end w-full mt-2">
            <button class="flex self-end justify-center w-auto px-4 py-2 mt-5 text-sm font-medium text-white transition duration-150 ease-in-out border border-transparent rounded-md bg-wave-600 hover:bg-wave-500 focus:outline-none focus:border-wave-700 focus:shadow-outline-wave active:bg-wave-700" dusk="update-profile-button">Save</button>
        </div>

    </div>
</form>