<template>
    <form action="#" @submit.prevent="saveProject()">
        <div
            class="block text-xl font-medium text-gray-900 dark:text-white my-5"
            >Project Deadlines</div
        >
        <div class="space-y-8 deadline-step">
            <div class="grid md:grid-cols-2 md:gap-6" v-for="(deadline, index) in project.deadlines">
                <div>
                    <div class="relative">
                        <!--  datepicker datepicker-format="dd/mm/yyyy" -->
                        <input name="end_date[]" v-model="project.deadlines[index].end_date" required="" type="date" class="bg-brand-700 border-0 text-gray-900 text-sm rounded focus:ring-primary-500 focus:border-primary-500 block w-full ps-4 p-2.5 dark:bg-brand-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Date">
                        <div class="absolute inset-y-0 end-2 flex items-center ps-3.5 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                            </svg>

                        </div>    
                    </div>
                </div>
                <div class="@if(index>0) flex justify-between space-x-4 items-center @endif">
                    <div class="relative w-full">
                        <input name="milestone[]" v-model="project.deadlines[index].milestone" required="" type="text" class="bg-brand-700 border-0 text-gray-900 text-sm rounded focus:ring-primary-500 focus:border-primary-500 block w-full ps-4 p-2.5 dark:bg-brand-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Add Milestone">
                        <div class="absolute inset-y-0 end-2 flex items-center ps-3.5 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3v1.5M3 21v-6m0 0 2.77-.693a9 9 0 0 1 6.208.682l.108.054a9 9 0 0 0 6.086.71l3.114-.732a48.524 48.524 0 0 1-.005-10.499l-3.11.732a9 9 0 0 1-6.085-.711l-.108-.054a9 9 0 0 0-6.208-.682L3 4.5M3 15V4.5" />
                            </svg>
                        </div>    
                    </div>
                    <div v-if="index>0">
                        <a href="javascript:;" @click="deleteMilestone(index)">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-full text-end">
                <a href="javascript:;" class="text-gray-400 underline" @click="addMilestone()">+ Add Milestone</a>
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
                :disabled="projectFormSubmitted"
                >
                Submit
            </button>
        </div>
    </form>
</template>

<script>
export default {
    data() {
        return {
            projectFormSubmitted: false,
        }
    },
    inheritAttrs: false,
    props: {
        project: {},
    },
    methods: {
        saveProject() {
            this.projectFormSubmitted = true;
            axios
                .post("/projects/store", this.project)
                .then((response) => {
                    setTimeout(function () {
                        if (typeof response.data.project_id !== 'undefined') {
                            window.location.href = "/project/"+response.data.project_id;
                        }else{
                            window.location.href = "/projects";
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
                    this.projectFormSubmitted = false;
                });
        },
        prevStep() {
            // Emit the updated input value to the parent
            this.$emit('update:project', this.project);
            this.$emit('prev', 2); 
        },
        addMilestone(){
            this.project.deadlines.push({end_date:"",milestone:""});
        },
        deleteMilestone(index){
            this.project.deadlines.pop(index);
        }
    }
};
</script>