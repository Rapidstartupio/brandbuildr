<template>
    <form action="#" @submit.prevent="saveProject()">
        <div
            class="block text-xl font-medium text-gray-900 dark:text-white my-5"
            >Project Deadlines</div
        >
        <div class="space-y-8 deadline-step">
            <div class="grid grid-cols-2 gap-6">
                
                <div>
                    <label
                        for="start_date"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >Start Date</label
                    >
                    <input
                        type="date"
                        id="start_date"
                        name="start_date"
                        v-model="project.start_date"
                        class="bg-gray-50 border-0 text-gray-900 text-sm rounded focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 brandDark3"
                        placeholder="Start Date"
                        required=""
                    />
                </div>
                <div>
                    <label
                        for="end_date"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >End Date</label
                    >
                    <input
                    type="date"
                    id="start_date"
                    name="start_date"
                    v-model="project.end_date"
                    class="bg-gray-50 border-0 text-gray-900 text-sm rounded focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 brandDark3"
                    placeholder="End Date"
                    required=""
                />
                </div>
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
       
    }
};
</script>