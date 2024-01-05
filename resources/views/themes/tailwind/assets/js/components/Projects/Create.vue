<template>
    <div>
        <div class="flex">
            <a href="/projects">
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
            <div class="dark:text-gray-400 text-sm">Projects</div>
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
                <!-- <form action="#" @submit.prevent="saveProject()"> -->
                <div>
                    <div class="w-full text-white text-center">
                        <ul class="progressbar">
                            <li :class="[ currentStep >= 1 ? 'active' : '']">Project Type</li>
                            <li :class="[ currentStep >= 2 ? 'active' : '']"> Project Details</li>
                            <li :class="[ currentStep >= 3 ? 'active' : '']">Deadlines</li>
                        </ul>
                    </div>
                    <!-- grid gap-4 sm:grid-cols-2 sm:gap-6 -->
                    <div class="" >
                        <component :is="currentStepComponent" :project.sync="project" :client.sync="client" :clients.sync="clients"  @next="nextStep" @prev="prevStep" />
                    </div>
                    <!-- <div class="flex justify-end space-x-3">
                        <button
                            type="button"
                            class="inline-flex items-center px-8 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white rounded dark:border-2 dark:border-gray-400"
                        >
                            Cancel
                        </button>
                        <button
                            type="submit"
                            :disabled="projectFormSubmitted"
                            class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded hover:bg-primary-800 dark:bg-brandPrimary"
                        >
                            Create Project
                        </button>
                    </div> -->
                </div>
            </div>
        </section>
    </div>


</template>
<script>
import axios from "axios";
import Step1 from "./CreateProjectSteps/Step1.vue";
import Step2 from "./CreateProjectSteps/Step2.vue";
import Step3 from "./CreateProjectSteps/Step3.vue";

export default {
    data() {
        return {
            currentStep: 1,
            client: {
                company_name: "",
                key_contact: "",
                phone_number: "",
                email: "",
                company_logo:"",
            },
            clients: this.getClients(),
            project: {
                type_id: "",
                name: "",
                client_id: "",
                description: "",
                deadline: "",
                start_date:"",
                end_date:"",
                deadlines: [
                    {
                        end_date:"",
                        milestone:""
                    }
                ],
            },
            //project_types: this.getProjectTypes(),
            
        };
    },
    computed: {
        currentStepComponent() {
            // Determine which component to render based on the current step
            switch (this.currentStep) {
                case 1:
                    return Step1;
                case 2:
                    return Step2;
                case 3:
                    return Step3;
                default:
                    return Step1;
            }
        }
    },
    methods: {
        getClients() {
            axios
                .post('/projects/clients/get')
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
        nextStep(nextStep) {
            this.currentStep = nextStep;
        },
        prevStep(prevStep) {
            this.currentStep = prevStep;
        },
    },
    props: [],
};
</script>
