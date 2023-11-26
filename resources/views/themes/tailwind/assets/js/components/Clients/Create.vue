<template>
    <div>
        <div class="flex">
            <a href="/projects/clients">
                <svg
                    class="w-min"
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                >
                    <path
                        d="M8.57143 7.42849L4 11.9999M4 11.9999L8.57143 16.6045M4 11.9999H18.8571"
                        stroke="#B6B6B8"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                </svg>
            </a>
            <div class="dark:text-gray-400 text-sm">All Clients</div>
        </div>
        <form action="#" @submit.prevent="saveClient()" class="space-y-4">
            <div class="flex justify-between">
                <div>
                    <h3 class="my-5"
                        style="
                            color: white;
                            font-size: 24px;
                            fontmy-family: Helvetica Neue;
                            font-weight: 500;
                            word-wrap: break-word;
                        "
                    >
                        New Client
                    </h3>
                </div>
                <div class="space-x-3">
                    <button
                        type="button"
                        class="inline-flex items-center px-8 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white rounded dark:border-2 dark:border-white"
                    >
                        Cancel
                    </button>
                    <button
                        type="submit"
                        :disabled="clientFormSubmitted"
                        class="inline-flex items-center px-8 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 dark:border-2 border-transparent rounded hover:bg-primary-800 dark:bg-brandPrimary"
                    >
                        Save
                    </button>
                </div>
            </div>
            <div class="space-y-6">
                <div class="border-t border-gray-600 ">
                    <label for="" class="block text-lg font-medium dark:text-white my-5">Company Logo</label>
                    <div class="flex items-center justify-center md:w-1/2">
                        <label for="company_logo" class="flex flex-col items-center justify-center w-full border-2 border-gray-300 border-transparent rounded-lg cursor-pointer bg-brand-700 dark:hover:bg-brand-800 dark:bg-brand-700 hover:bg-brand-800 dark:hover:bg-brand-800">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG or GIF (MAX. 800x400px)</p>
                            </div>
                            <input id="company_logo" type="file" class="hidden" name="company_logo" />
                        </label>
                    </div> 
                </div>
                <div class="border-t border-gray-600 ">
                    <label for="client_information" class="block text-lg font-medium dark:text-white my-5">Client Information</label>
                    <div id="client_information" class="grid grid-cols-2 gap-10">
                        <div>
                            <input
                                type="text"
                                name="company_name"
                                v-model="client.company_name"
                                id="company_name"
                                class="bg-gray-50 border-0 text-gray-900 text-sm rounded focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 brandDark3"
                                placeholder="Company Name"
                                required="required"
                            />
                        </div>
                        <div>
                            <input
                                type="text"
                                name="key_contact"
                                v-model="client.key_contact"
                                id="key_contact"
                                class="bg-gray-50 border-0 text-gray-900 text-sm rounded focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 brandDark3"
                                placeholder="Key Contact"
                                required="required"
                            />
                        </div>
                        <div>
                            <input
                                type="text"
                                name="phone_number"
                                v-model="client.phone_number"
                                id="phone_number"
                                class="bg-gray-50 border-0 text-gray-900 text-sm rounded focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 brandDark3"
                                placeholder="Phone Number"
                                required="required"
                            />
                        </div>
                        <div>
                            <input
                                type="email"
                                name="email"
                                v-model="client.email"
                                id="email"
                                class="bg-gray-50 border-0 text-gray-900 text-sm rounded focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 brandDark3"
                                placeholder="Email"
                                required="required"
                            />
                        </div>
                    </div>
                </div>
                <div class="border-t border-gray-600 ">
                    <div class="grid grid-cols-2 gap-10">
                        <div class="space-y-4">
                            <label for="tag" class="block text-lg font-medium dark:text-white my-5">Customize Tag</label>
                            <input
                                type="text"
                                name="tag"
                                v-model="client.tag"
                                id="tag"
                                class="bg-gray-50 border-0 text-gray-900 text-sm rounded focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 brandDark3"
                                placeholder="Tag Name"
                            />
                            <div class="space-x-2"> 
                                <input type="color" name="tag_color" id="tag_color" v-model="client.tag_color" >
                                <label for="tag_color" class="text-white">Text Color</label>
                            </div>
                            <div class="space-x-2">
                                <input type="color" name="tag_bg_color" id="tag_bg_color" v-model="client.tag_bg_color">
                                <label for="tag_bg_color" class="text-white">Backgroud Color</label>
                            </div>
                            <button type="button" class="focus:outline-none rounded-lg text-gray-900 bg-[#9BDAB4] hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-light rounded-lg text-base px-2     dark:bg-[#9BDAB4] dark:hover:bg-green-700 dark:focus:ring-green-800" v-bind:style="{color:client.tag_color, background:client.tag_bg_color}">{{ client.tag }}</button>
                            
                        </div>
                        <div>
                            <label for="" class="block text-lg font-medium dark:text-white my-5">Upload Documents</label>
                            
                        </div>
                    </div>
                </div>
            </div>
        </form>

        
    </div>
</template>
<script>
import axios from "axios";

export default {
    data() {
        return {
            client: {
                company_name: "",
                key_contact: "",
                phone_number: "",
                email: "",
                company_logo: "",
                tag:"",
                tag_color:"#000000",
                tag_bg_color:"#9BDAB4"
            },
            clientFormSubmitted:false,
        };
    },
    methods: {
        saveClient() {
            this.clientFormSubmitted = true;
            axios
                .post("/projects/clients/store", this.client)
                .then((response) => {
                    setTimeout(function () {
                        if (false && typeof response.data.client_id !== 'undefined') {
                            window.location.href = "/projects/clients/"+response.data.client_id;
                        }else{
                            window.location.href = "/projects/clients";
                        }
                    }, 10);
                })
                .catch((error) => {
                    console.log(error.response);
                    if (error.response.data.message) {
                        setTimeout(function () {
                            popToast(
                                error.response.data.message_type,
                                error.response.data.message
                            );
                        }, 10);
                    }
                    this.clientFormSubmitted = false;
                });
        },
    },
    props: [],
};
</script>
