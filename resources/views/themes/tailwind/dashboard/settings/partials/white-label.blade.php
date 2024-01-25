<form action="" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <h3 class="text-xl" style="">
        White Label
    </h3>
    <p class="text-gray-400 py-4 text-sm">Give your clients a seamless branded experience. More customization and color schemes coming soon.</p>
    <hr class="my-6 h-0.5 border-t-0 bg-[#504A6A] opacity-100 dark:opacity-50" />
    <h3 class="my-5 text-xl" style="">
        Your Company Logo
    </h3>
    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
        <div class="w-full">
            <label for="dark-logo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dark Version</label>
            <div class="grid lg:grid-cols-3 lg:gap-2 space-y-4">
                @if(Auth::user()->theme_dark_logo)
                <div>
                    <img src="{{asset('/storage/logos/'.Auth::user()->theme_dark_logo)}}" alt="user_dark_logo" class="w-40" />
                </div>
                @endif
                <div class="col-span-2">
                    <input type="file" name="dark_logo" id="dark-logo" class="" />
                </div>
            </div>

        </div>
        <div class="w-full">
            <label for="light-logo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Light Version</label>
            <div class="grid lg:grid-cols-3 lg:gap-2 space-y-4">
                @if(Auth::user()->theme_light_logo)
                <div>
                    <img src="{{asset('/storage/logos/'.Auth::user()->theme_light_logo)}}" alt="user_dark_logo" class="w-40" />
                </div>
                @endif
                <div class="col-span-2">
                    <input type="file" name="light_logo" id="light-logo" class="" />
                </div>
            </div>
        </div>
    </div>
    <hr class="my-6 h-0.5 border-t-0 bg-[#504A6A] opacity-100 dark:opacity-50" />
    <h3 class="my-5 text-xl" style="">
        Select Theme
    </h3>

    <div class="themes text-white">
        <ul class="grid gap-6 grid-cols-1 sm:grid-cols-3">
            <li class="">
                <input type="radio" id="dark-theme" name="user_theme" @if(auth()->user()->theme == 'dark') checked @endif value="dark" class="opacity-0 absolute peer" />
                <label for="dark-theme" class="block cursor-pointer peer-checked:border-2 peer-checked:border-blue-500">
                    <img src="{{ Storage::url('themes/dark-theme.png') }}" class="w-full" alt="dark-theme">
                </label>
            </li>
            <li class="">
                <input type="radio" id="light-theme" name="user_theme" @if(auth()->user()->theme == 'light') checked @endif value="light" class="opacity-0 absolute peer" />
                <label for="light-theme" class="block cursor-pointer peer-checked:border-2 peer-checked:border-blue-500">
                    <img src="{{ Storage::url('themes/light-theme.png') }}" class="w-full" alt="dark-theme">
                </label>
            </li>
        </ul>
    </div>
    <hr class="my-6 h-0.5 border-t-0 bg-[#504A6A] opacity-100 dark:opacity-50" />

    <div class="md:flex md:space-x-4 justify-between">
        <div>
            <!-- Hide the custom colors for now -->
            <h3 class="text-xl hidden">
                Custom Colors
            </h3>
        </div>
        <div class="wl-reset">
            <button type="button" class="inline-flex items-center p-2 text-sm font-medium text-center text-white rounded dark:border-2 dark:border-gray-400 whitespace-nowrap">
                Reset
            </button>
        </div>
    </div>
        <div class="grid grid-cols-3 hidden">
            <div>
                <label for="button-color">Button Color</label>
                <div class="space-x-2">
                    <input id="button-color" type="color" value="{{ auth()->user()->theme_button_color ?? '#5000FF' }}" data-defaulthex="#5000FF" width="42" name="button_color" />
                    <input type="text" value="{{ auth()->user()->theme_button_color ?? '#5000FF' }}" readonly class="dark:bg-gray-500" style="width: 120px;">
                </div>
            </div>
            <div>
                <label for="text-color">Text Color</label>
                <div class="space-x-2">
                    <input id="text-color" type="color" value="{{ auth()->user()->theme_text_color ?? '#FFFFFF' }}" data-defaulthex="#FFFFFF" width="42" name="text_color" />
                    <input type="text" value="{{ auth()->user()->theme_text_color ?? '#FFFFFF' }}" readonly class="dark:bg-gray-500" style="width: 120px;">
                </div>
            </div>
            <div>
                <label for="line-color">Line Color</label>
                <div class="space-x-2">
                    <input id="line-color" type="color" value="{{ auth()->user()->theme_line_color ?? '#B6B6B8' }}" data-defaulthex="#B6B6B8" width="42" name="line_color" />
                    <input type="text" value="{{ auth()->user()->theme_line_color ?? '#B6B6B8' }}" readonly class="dark:bg-gray-500" style="width: 120px;">
                </div>
            </div>
        </div>

    <div class="flex justify-end space-x-3">
        <button type="button" class="inline-flex items-center px-8 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white rounded dark:border-2 dark:border-gray-400">
            Cancel
        </button>
        <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded hover:bg-primary-800 dark:bg-brandPrimary">
            save
        </button>
    </div>
</form>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add click event listener to the reset button
    document.querySelector('.wl-reset button').addEventListener('click', function() {
        // Select all color inputs and reset their values to the data-defaulthex attribute
        document.querySelectorAll('[type="color"]').forEach(input => {
            const defaultHex = input.getAttribute('data-defaulthex');
            input.value = defaultHex;
        });
    });
});
</script>
