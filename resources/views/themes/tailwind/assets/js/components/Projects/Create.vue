<template>
    <div>
        <div class="flex">
            <a :href="this.dashboardRoute">
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
            <div class="dark:text-gray-400 text-sm">Dashboard</div>
        </div>
        <h3
            class="my-5"
            style="
                color: white;
                font-size: 24px;
                fontmy-family: Helvetica Neue;
                font-weight: 500;
                word-wrap: break-word;
            "
        >
            Create New Project
        </h3>

        <section class="">
            <div class="">
                <form action="#" @submit.prevent="saveProject()">
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="sm:col-span-2">
                            <label
                                for="name"
                                class="block text-sm font-medium text-gray-900 dark:text-white my-5"
                                >Project Type</label
                            >
                            <div class="project-types text-white">
                                <ul
                                    class="grid gap-4 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5"
                                >
                                    <li
                                        class="project-type-item"
                                        v-for="(type, index) in project_types"
                                    >
                                        <input
                                            v-if="type.status == 'free'"
                                            type="radio"
                                            :id="'project-type-' + type.id"
                                            name="type_id"
                                            v-model="project.type_id"
                                            :value="type.id"
                                            class="opacity-0 absolute peer"
                                            required
                                        />
                                        <label
                                            :for="'project-type-' + type.id"
                                            class="block brandDark3 p-4 h-full"
                                            :class="[
                                                type.status == 'free'
                                                    ? 'cursor-pointer peer-checked:border-2 peer-checked:border-brandPrimary'
                                                    : 'contrast-50 cursor-not-allowed',
                                            ]"
                                        >
                                            <div class="flex items-center">
                                                <svg
                                                    class="w-auto"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="60"
                                                    height="60"
                                                    viewBox="0 0 48 48"
                                                    fill="none"
                                                >
                                                    <path
                                                        :d="
                                                            type.icon_svg_path_d
                                                        "
                                                        fill="white"
                                                    />
                                                </svg>
                                                <div
                                                    class="type-name text-lg text-center w-full"
                                                >
                                                    {{ type.name }}
                                                </div>
                                            </div>
                                            <div class="flex">
                                                <p class="text-gray-400">
                                                    {{ type.description }}
                                                </p>
                                            </div>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="w-full">
                            <label
                                for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >Project Name</label
                            >
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
                        <div>
                            <label
                                for="client_id"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >Client</label
                            >
                            <div class="md:flex md:space-x-4">
                                <select
                                    id="client_id"
                                    name="client_id"
                                    v-model="project.client_id"
                                    class="bg-gray-50 text-gray-900 text-sm rounded focus:ring-primary-500 border-0 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 brandDark3"
                                >
                                    <option selected="" value="">
                                        Choose Client
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
                                        class="inline-flex items-center px-8 text-sm font-medium text-center text-white rounded dark:border-2 dark:border-gray-400 whitespace-nowrap h-full"
                                    >
                                        New Client
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <label
                                for="description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >Project Description</label
                            >
                            <textarea
                                id="description"
                                name="description"
                                v-model="project.description"
                                rows="6"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded border-0 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 brandDark3"
                                placeholder="Project Description"
                            ></textarea>
                        </div>
                        <div class="space-y-8">
                            <div class="w-full">
                                <label
                                    for="deadline"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Deadline</label
                                >
                                <input
                                    type="date"
                                    id="deadline"
                                    name="deadline"
                                    v-model="project.deadline"
                                    class="bg-gray-50 border-0 text-gray-900 text-sm rounded focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 brandDark3"
                                    placeholder="Select Deadline"
                                    required=""
                                />
                            </div>
                            <div class="w-full">
                                <label
                                    for="brand"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Milestone</label
                                >
                                <input
                                    type="text"
                                    name="brand"
                                    id="brand"
                                    class="bg-gray-50 border-0 text-gray-900 text-sm rounded focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 brandDark3"
                                    placeholder="Milestone"
                                    required=""
                                />
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button
                            type="button"
                            class="inline-flex items-center px-8 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white rounded dark:border-2 dark:border-gray-400"
                        >
                            Cancel
                        </button>
                        <button
                            type="submit"
                            class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded hover:bg-primary-800 dark:bg-brandPrimary"
                        >
                            Create Project
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </div>

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
                                required
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
                                required
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
                                required
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
import axios from "axios";

export default {
    data() {
        return {
            client: {
                company_name: "",
                key_contact: "",
                phone_number: "",
                email: "",
            },
            clients: this.getClients(),
            project: {
                type_id: "",
                name: "",
                client_id: "",
                description: "",
                deadline: "",
            },
            project_types: this.getProjectTypes(),
        };
    },
    methods: {
        saveClient() {
            axios
                .post(this.saveClientRoute, this.client)
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
                });
        },
        resetClient() {
            this.client.company_name = "";
            this.client.key_contact = "";
            this.client.phone_number = "";
            this.client.email = "";
        },
        closeClientModal() {
            document
                .querySelectorAll('[data-modal-hide="new-client-modal"]')[0]
                .click();
        },
        getClients() {
            axios
                .post(this.getClientRoute)
                .then((response) => {
                    if (response.data.clients) {
                        this.clients = response.data.clients;
                    }
                })
                .catch((err) => console.error(err));
        },
        getProjectTypes() {
            axios
                .get("/projects-types")
                .then((response) => {
                    if (response.data.projectTypes) {
                        this.project_types = response.data.projectTypes;
                    }
                })
                .catch((err) => console.error(err));
        },
        saveProject() {
            axios
                .post("/projects/store", this.project)
                .then((response) => {
                    setTimeout(function () {
                        popToast(
                            response.data.message_type,
                            response.data.message
                        );
                    }, 10);
                    setTimeout(function () {
                        window.location.href = "/dashboard";
                    }, 2000);
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
                });
        },
    },
    props: ["dashboardRoute", "saveClientRoute", "getClientRoute"],
};
</script>
