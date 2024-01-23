<form action="{{ route('wave.settings.profile.put') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <h3 class="text-xl" style="">
        Profile
    </h3>

    <div class="flex justify-start w-full mb-8 mt-6 space-x-4 items-center">
        <div class="relative w-20 h-20 cursor-pointer group">
            <img id="preview" src="{{ Voyager::image(auth()->user()->avatar) . '?' . time() }}" class="w-20 h-20 rounded-full ">
            <div class="absolute inset-0 w-full h-full">
                <input type="file" id="upload" class="absolute inset-0 z-20 w-full h-full opacity-0 cursor-pointer group">
                <input type="hidden" id="uploadBase64" name="avatar">
                <button class="absolute bottom-0 z-10 flex items-center justify-center w-10 h-10 mb-2 -ml-5 bg-black dark:bg-gray-400 bg-opacity-75 rounded-full opacity-75 group-hover:opacity-100 left-1/2">
                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="space-y-1">
            <h3 class="text-lg">{{auth()->user()->name}}</h3>
            <h5 class="text-sm text-gray-400">{{auth()->user()->position}}</h5>
        </div>
    </div>


    <div class="border-t border-gray-500 py-6">
        <h3 class="text-xl">Personal Information</h3>
        <div class="grid grid-cols-2 gap-10 pt-4">
            <div>
                <input type="text" name="name" value="{{ Auth::user()->name }}" class="bg-gray-50 border-0 text-gray-900 text-sm rounded focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 brandDark3" placeholder="Full Name" required="required" />
            </div>
            <div>
                <input type="email" name="email" value="{{ Auth::user()->email }}" class="bg-gray-50 border-0 text-gray-900 text-sm rounded focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 brandDark3" placeholder="Email" required="required" />
            </div>
            <div>
                <input type="text" name="phone_number" value="{{ Auth::user()->phone_number }}" class="bg-gray-50 border-0 text-gray-900 text-sm rounded focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 brandDark3" placeholder="Phone Number" />
            </div>
            <div>
                <input type="text" name="position" value="{{ Auth::user()->position }}" class="bg-gray-50 border-0 text-gray-900 text-sm rounded focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 brandDark3" placeholder="Position" />
            </div>
        </div>
    </div>

    <div class="border-t border-gray-500 py-6">
        <h3 class="text-xl">Company Information</h3>
        <div class="grid grid-cols-2 gap-10 pt-4">
            <div>
                <input type="text" name="company_name" value="{{ Auth::user()->company_name }}" class="bg-gray-50 border-0 text-gray-900 text-sm rounded focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 brandDark3" placeholder="Company Name" />
            </div>
            <div>
                <input type="text" name="owner" value="{{ Auth::user()->owner }}" class="bg-gray-50 border-0 text-gray-900 text-sm rounded focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 brandDark3" placeholder="Owner" />
            </div>
            <div>
                <input type="text" name="address" value="{{ Auth::user()->address }}" class="bg-gray-50 border-0 text-gray-900 text-sm rounded focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 brandDark3" placeholder="Address" />
            </div>
            <div>
                <input type="text" name="website" value="{{ Auth::user()->website }}" class="bg-gray-50 border-0 text-gray-900 text-sm rounded focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 brandDark3" placeholder="Website" />
            </div>
        </div>
    </div>

    <div class="border-t border-gray-500 py-6">
        <h3 class="text-xl">Address</h3>
        <div class="grid grid-cols-2 gap-10 pt-4">
            <div>
                <input type="text" name="country" value="{{ Auth::user()->country }}" class="bg-gray-50 border-0 text-gray-900 text-sm rounded focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 brandDark3" placeholder="Country" />
            </div>
            <div>
                <input type="text" name="city" value="{{ Auth::user()->city }}" class="bg-gray-50 border-0 text-gray-900 text-sm rounded focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 brandDark3" placeholder="City" />
            </div>
            <div>
                <input type="text" name="street" value="{{ Auth::user()->street }}" class="bg-gray-50 border-0 text-gray-900 text-sm rounded focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 brandDark3" placeholder="Street" />
            </div>
            <div>
                <input type="text" name="zip_code" value="{{ Auth::user()->zip_code }}" class="bg-gray-50 border-0 text-gray-900 text-sm rounded focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 brandDark3" placeholder="ZIP Code" />
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

<div id="uploadModal" x-data x-init="$watch('$store.uploadModal.open', value => {
      if (value === true) { document.body.classList.add('overflow-hidden') }
      else { document.body.classList.remove('overflow-hidden'); clearInputField(); }
    });" x-show="$store.uploadModal.open" class="fixed inset-0 z-10 z-30 overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <div x-show="$store.uploadModal.open" @click="$store.uploadModal.open = false;" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute inset-0 transition-opacity" x-cloak>
            <div class="absolute inset-0 bg-black opacity-50 hidden"></div>
        </div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>&#8203;
        <div x-show="$store.uploadModal.open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block px-4 pt-5 pb-4 overflow-hidden text-left align-bottom transition-all transform bg-white dark:bg-brand-800 rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6" role="dialog" aria-modal="true" aria-labelledby="modal-headline" x-cloak>
            <div>
                <div class="mt-3 text-center sm:mt-5">
                    <h3 class="text-lg font-medium leading-6 text-white" id="modal-headline">
                        Position and resize your photo
                    </h3>
                    <div class="mt-2">
                        <div id="upload-crop-container" class="relative flex items-center justify-center h-56 mt-5">
                            <div id="uploadLoading" class="flex items-center justify-center w-full h-full">
                                <svg class="w-5 h-5 mr-3 -ml-1 text-gray-400 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                            </div>
                            <div id="upload-crop"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5 sm:mt-6">
                <span class="flex w-full rounded-md shadow-sm">
                    <button onclick="closeUploadModal()" class="inline-flex justify-center w-full px-4 py-2 mr-2 text-base font-medium leading-6  text-gray-700 dark:text-white transition duration-150 ease-in-out bg-white dark:bg-brand-800 border border-transparent border-gray-300 rounded-md shadow-sm hover:text-gray-500 active:text-gray-800 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue sm:text-sm sm:leading-5" type="button">Cancel</button>
                    <button onclick="applyImageCrop()" class="inline-flex justify-center w-full px-4 py-2 ml-2 text-base font-medium leading-6 text-white transition duration-150 ease-in-out border border-transparent rounded-md shadow-sm bg-wave-600 hover:bg-wave-500 focus:outline-none focus:border-wave-700 focus:shadow-outline-wave sm:text-sm sm:leading-5" id="apply-crop" type="button">Apply</button>
                </span>
            </div>
        </div>
    </div>
</div>

@section('javascript')

<style>
    #upload-crop-container .croppie-container .cr-resizer,
    #upload-crop-container .croppie-container .cr-viewport {
        box-shadow: 0 0 2000px 2000px rgba(255, 255, 255, 1) !important;
        border: 0px !important;
    }

    .croppie-container .cr-boundary {
        border-radius: 50% !important;
        overflow: hidden;
    }

    .croppie-container .cr-slider-wrap {
        margin-bottom: 0px !important;
    }

    .croppie-container {
        height: auto !important;
    }
</style>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/exif-js/2.3.0/exif.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.js"></script>
<script>
    let uploadCropEl = document.getElementById('upload-crop');
    let uploadLoading = document.getElementById('uploadLoading');
    let fileTypes = ['jpg', 'jpeg', 'png'];

    function readFile() {
        input = document.getElementById('upload');
        if (input.files && input.files[0]) {
            let reader = new FileReader();

            let fileType = input.files[0].name.split('.').pop().toLowerCase();
            if (fileTypes.indexOf(fileType) < 0) {
                alert('Invalid file type. Please select a JPG or PNG file.');
                return false;
            }
            reader.onload = function(e) {
                //$('.upload-demo').addClass('ready');
                uploadCrop.bind({
                    url: e.target.result,
                    orientation: 4
                }).then(function() {
                    //uploadCrop.setZoom(0);
                });
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            alert("Sorry - you're browser doesn't support the FileReader API");
        }
    }

    if (document.getElementById('upload')) {
        document.getElementById('upload').addEventListener('change', function() {
            Alpine.store('uploadModal').openModal();
            uploadCropEl.classList.add('hidden');
            uploadLoading.classList.remove('hidden');
            setTimeout(function() {
                uploadLoading.classList.add('hidden');
                uploadCropEl.classList.remove('hidden');

                if (typeof(uploadCrop) != "undefined") {
                    uploadCrop.destroy();
                }
                uploadCrop = new Croppie(uploadCropEl, {
                    viewport: {
                        width: 190,
                        height: 190,
                        type: 'square'
                    },
                    boundary: {
                        width: 190,
                        height: 190
                    },
                    enableExif: true,
                });

                readFile();
            }, 800);
        });
    }

    function clearInputField() {
        document.getElementById('upload').value = '';
    }

    function applyImageCrop() {
        let fileType = input.files[0].name.split('.').pop().toLowerCase();
        if (fileTypes.indexOf(fileType) < 0) {
            alert('Invalid file type. Please select a JPG or PNG file.');
            return false;
        }
        uploadCrop.result({
            type: 'base64',
            size: 'original',
            format: 'png',
            quality: 1
        }).then(function(base64) {
            document.getElementById('preview').src = base64;
            document.getElementById('uploadBase64').value = base64;
            closeUploadModal();
        });
    }

    function closeUploadModal() {
        Alpine.store('uploadModal').close();
    }

    function openUploadModal() {
        Alpine.store('uploadModal').openModal();
    }
</script>

@endsection
