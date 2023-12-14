<template>
    <form action="#" @submit.prevent="nextStep()">
        <div class="sm:col-span-2 project-type-step">
            <label
                for="name"
                class="block text-base font-medium text-gray-900 dark:text-white my-5"
                >Select Project Type</label
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
        <div class="flex justify-end space-x-3 lg:fixed lg:right-6 lg:bottom-6">
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