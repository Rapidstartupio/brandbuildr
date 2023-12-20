<template>
    <form action="#" @submit.prevent="nextStep()">
        <div
            class="block text-xl font-medium text-gray-900 dark:text-white my-5"
            >Project Details</div
        >
        <div class="project-details-step grid md:grid-cols-2 gap-6">
            <div class="space-y-8">
                <div class="">
                    <!-- <label
                        for="name"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >Project Name</label
                    > -->
                    <input
                        type="text"
                        name="name"
                        v-model="project.name"
                        id="brand"
                        class="bg-gray-50 border-0 text-gray-900 text-sm rounded focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 brandDark3"
                        placeholder="Project Name"
                        required=""
                    />
                </div>
                <div class="">
                    <!-- <label
                        for="description"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >Project Description</label
                    > -->
                    <textarea
                        id="description"
                        name="description"
                        v-model="project.description"
                        rows="6"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded border-0 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 brandDark3"
                        placeholder="Project Description"
                        required=""
                    ></textarea>
                </div>
            </div>
            <div class="space-y-8">
                <!-- <label
                    for="client_id"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >Client</label
                > -->
                <div class="flex space-x-4">
                    <select
                    required=""
                        id="client_id"
                        name="client_id"
                        v-model="project.client_id"
                        class="bg-gray-50 text-gray-900 text-sm rounded focus:ring-primary-500 border-0 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 brandDark3"
                    >
                        <option selected="" value="">
                            Client
                        </option>
                        <option
                            v-for="(client, index) in this.clients"
                            :value="client.id"
                        >
                            {{ client.company_name }}
                        </option>
                    </select>
                    <div class="">
                        <button
                            type="button"
                            data-modal-target="new-client-modal"
                            data-modal-toggle="new-client-modal"
                            class="inline-flex items-center px-4 text-sm font-medium text-center text-white rounded dark:border-2 dark:border-gray-400 whitespace-nowrap h-full"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                        </button>
                    </div>
                </div>
                <div>
                    <button
                        type="button"
                        class="inline-flex items-center px-8 py-2.5 text-sm font-medium text-center text-white bg-primary-700 rounded-lg hover:bg-primary-800 dark:bg-brandPrimary"
                        >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Document
                    </button>
                </div>
            </div>
        </div>

        <div class="flex justify-end space-x-3">
            <button
                type="button"
                class="inline-flex items-center px-8 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white rounded dark:border-2 dark:border-gray-400"
                @click="prevStep"
                >
                Prev
            </button>
            <button
                type="submit"
                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded hover:bg-primary-800 dark:bg-brandPrimary"
                >
                Next Step
            </button>
        </div>
    </form>

     <!-- Main modal -->
     <div
            id="new-client-modal"
            tabindex="-1"
            aria-hidden="true"
            class="fixed top-0 left-0 right-0 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full"
            style="z-index: 39"
        >
            <div class="relative w-full max-w-lg max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow brandDark3">
                    <button
                        type="button"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="new-client-modal"
                    >
                        <svg
                            class="w-3 h-3"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 14 14"
                        >
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
                            />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="px-6 py-10 lg:px-8">
                        <h3
                            class="mb-4 text-xl font-medium text-gray-900 dark:text-white text-center"
                        >
                            Add New Client
                        </h3>
                        <form
                            class="space-y-6"
                            action="#"
                            @submit.prevent="saveClient()"
                        >

                            <div>
                                <label
                                    for="company_name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Company Name</label
                                >
                                <input
                                    type="text"
                                    name="company_name"
                                    v-model="client.company_name"
                                    id="company_name"
                                    class="text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:text-white brandDark4 border-0"
                                    placeholder="Company Name"
                                    required
                                />
                            </div>
                            <div>
                                <label
                                    for="company_logo"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Company Logo</label
                                >
                                <!-- <input
                                    type="text"
                                    name="company_logo"
                                    v-model="client.company_logo"
                                    id="company_logo"
                                    class="text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:text-white brandDark4 border-0"
                                    placeholder="Company Logo"
                                    required
                                /> -->
                                <div class="grid md:grid-cols-2 gap-2">
                                    <div class="flex items-center justify-center">
                                        <label for="company_logo" class="flex flex-col items-center justify-center w-full border-2 border-gray-300 border-transparent rounded-lg cursor-pointer bg-brand-700 dark:hover:bg-brand-800 dark:bg-brand-700 hover:bg-brand-800 dark:hover:bg-brand-800">
                                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                                </svg>
                                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG or GIF (BEST. 1000x1000px)</p>
                                            </div>
                                            <input id="company_logo" type="file" class="hidden" name="company_logo" @change="onFileChange" />
                                            <!-- v-on:change="client.company_logo" -->
                                        </label>

                                    </div>
                                    <div class="">
                                        <img id='preview_img' class="h-auto w-auto object-cover" :src="company_logo_preview" alt="preview" :class="{'hidden': !company_logo_preview}" />
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label
                                    for="key_contact"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Key Contact</label
                                >
                                <input
                                    type="text"
                                    name="key_contact"
                                    v-model="client.key_contact"
                                    id="key_contact"
                                    placeholder="Key Contact"
                                    class="text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:text-white brandDark4 border-0"
                                />
                            </div>
                            <div>
                                <label
                                    for="phone_number"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Phone Number</label
                                >
                                <input
                                    type="text"
                                    name="phone_number"
                                    v-model="client.phone_number"
                                    id="phone_number"
                                    placeholder="Phone Number"
                                    class="text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:text-white brandDark4 border-0"
                                />
                            </div>
                            <div>
                                <label
                                    for="email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Email</label
                                >
                                <input
                                    type="text"
                                    name="email"
                                    v-model="client.email"
                                    id="email"
                                    placeholder="Email"
                                    class="text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:text-white brandDark4 border-0"
                                    
                                />
                            </div>
                            <div class="flex space-x-3">
                                <button
                                    type="button"
                                    data-modal-hide="new-client-modal"
                                    class="w-full px-8 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white rounded dark:border-2 dark:border-gray-400"
                                    >
                                    Cancel
                                </button>
                                <button
                                    type="submit"
                                    :disabled="clientFormSubmitted"
                                    class="w-full px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded hover:bg-primary-800 dark:bg-brandPrimary whitespace-nowrap"
                                >
                                    Add New Client
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</template>


<script>

import { initFlowbite } from 'flowbite'

export default {
    data() {
        return {
            clientFormSubmitted: false,
            company_logo_preview: null,
        }
    },
    inheritAttrs: false,
    props: {
        project: {},
        client: {},
        clients: {},
    },
    mounted(){
        initFlowbite();
    },
    methods: {
        closeClientModal() {
            document
                .querySelectorAll('[data-modal-hide="new-client-modal"]')[0]
                .click();
        },
        saveClient() {
            this.clientFormSubmitted = true;
            let formData = new FormData();

            formData.append('company_name', this.client.company_name);
            formData.append('key_contact', this.client.key_contact);
            formData.append('phone_number', this.client.phone_number);
            formData.append('email', this.client.email);
            formData.append('company_logo', this.client.company_logo);

            axios
                .post('/projects/clients/store', formData)
                .then((response) => {
                    if (response.data.message) {
                        this.clients.push(response.data.data);
                        this.project.client_id = response.data.data.id;
                        this.resetClient();
                        this.closeClientModal();
                        setTimeout(function () {
                            popToast(
                                response.data.message_type,
                                response.data.message
                            );
                        }, 10);
                    }
                    this.clientFormSubmitted = false;
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
        prevStep() {
            // Emit the updated input value to the parent
            this.$emit('update:project', this.project);
            this.$emit('update:client', this.client);
            this.$emit('update:clients', this.clients);
            this.$emit('prev', 1);
        },
        nextStep() {
            this.$emit('update:project', this.project);
            this.$emit('update:client', this.client);
            this.$emit('update:clients', this.clients);
            this.$emit('next', 3); // Emit an event to notify the parent component to move to the next step
        },
        onFileChange(event){
            this.client.company_logo = event.target.files[0];
            this.company_logo_preview = URL.createObjectURL(event.target.files[0]);
        },
        resetClient() {
            this.client.company_name = "";
            this.client.key_contact = "";
            this.client.phone_number = "";
            this.client.email = "";
            this.client.company_logo = "";
            this.company_logo_preview = "";
        },
    }
};
</script>
