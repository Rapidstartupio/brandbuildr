<template>
    <form action="#" @submit.prevent="nextStep()">
        <div class="sm:col-span-2 project-type-step">
            <label
                for="name"
                class="block text-xl font-medium text-gray-900 dark:text-white my-5"
                >Select Project Type</label
            >
            <div class="project-types text-white">
                <ul
                    class="grid gap-4 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5"
                >
                    <li
                        class="project-type-item relative h-60"
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
                            class="block p-4 h-full hover:hover-type"
                            :class="[
                                type.status == 'free'
                                    ? 'brandDark3 cursor-pointer peer-checked:border-2 peer-checked:border-brandPrimary peer-checked:hover-type'
                                    : 'cursor-not-allowed bg-brand-500',
                            ]"
                        >
                            <div class="">
                                <div
                                    class="type-name text-xl capitalize w-min"
                                >
                                    {{ type.name }}  
                                </div>
                                <div class="icon dark:text-gray-400 text-sm absolute bottom-2 right-2">
                                    <span v-if="type.svg" v-html="type.svg"></span>
                                    <svg
                                        v-else 
                                        class="w-auto"
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="48"
                                        height="48"
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
                                </div>
                                
                            </div>
                            <div class="description brandDark2 contrast-50 hidden absolute bottom-0 left-0">
                                <p class="p-2 text-sm">
                                    {{ type.description }}
                                </p>
                            </div>
                            <div  v-if="type.status != 'free'" class="comming-soon absolute bottom-2 left-2">
                                <p>Coming Soon...</p>
                            </div>
                        </label>
                    </li>
                </ul>
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
                Next Step
            </button>
            <!-- @click="nextStep" -->
        </div>
    </form>
</template>


<script>
export default {
    data() {
        return {
            project_types:this.getProjectTypes(),
        }
    },
    inheritAttrs: false,
    props: {
        project: {},
    },
    methods: {
        getProjectTypes() {
            axios
                .get("/projects-types")
                .then((response) => {
                    if (response.data.projectTypes) {
                        this.project_types = response.data.projectTypes;
                        console.log(this.project_types);
                    }
                })
                .catch((err) => console.error(err));
        },
        nextStep() {
            // Emit the updated input value to the parent
            this.$emit('update:project', this.project);
            this.$emit('next', 2); 
        },
    }
};
</script>