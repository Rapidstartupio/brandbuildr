<template>
    <div
        class="py-4 mx-auto px-2 md:px-12 xl:px-28 text-white max-w-screen-2xl"
    >
        <div class="text-center text-white text-2xl font-medium my-8">
            Create Your Brand Strategy
        </div>

        <div
            class="grid md:grid-cols-2 bg-gradient-to-r from-[#1E1E34] via-[#241E44] to-[#1E1E34] rounded-lg"
        >
            <div class="md:border-r md:border-gray-700">
                <div
                    class="h-16 pl-6 border-b border-gray-700 text-base font-medium flex items-center"
                >
                    Business Model
                </div>
                <div
                    class="progress-bar h-0.5 bg-wave-500"
                    :class="progressBar"
                ></div>
                <div class="p-4 md:p-10">
                    <div class="text-center">
                        <h2 class="text-xl font-medium">
                            {{ steps[step].question }}
                        </h2>
                        <p class="text-sm font-light text-gray-400">
                            {{ steps[step].subQuestion }}
                        </p>
                    </div>
                    <div class="pt-12 md:px-6">
                        <div v-if="steps[step].answerInputType == 'text'">
                            <input
                                type="text"
                                class="w-full bg-transparent border-0 border-b border-white placeholder:text-gray-200 my-3 focus:ring-0 focus:border-wave-500 text-xs"
                                :placeholder="
                                    steps[step].answerInputPlaceHolder
                                "
                            />
                        </div>
                        <div v-if="steps[step].answerInputType == 'select'">
                            <select
                                class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 my-3 text-xs"
                            >
                                <option selected>
                                    {{ steps[step].answerInputPlaceHolder }}
                                </option>
                                <option
                                    v-for="(option, index) in steps[step]
                                        .answerOptions"
                                    :value="option.value"
                                >
                                    {{ option.text }}
                                </option>
                            </select>
                        </div>

                        <button
                            class="bg-wave-500 hover:bg-wave-700 text-white py-2 px-8 rounded-lg"
                            v-on:click="next()"
                        >
                            Next
                        </button>
                        <button
                            v-if="steps[step].back"
                            class="py-2 px-8 rounded-lg underline text-gray-300"
                            v-on:click="back()"
                        >
                            Back
                        </button>
                    </div>
                </div>
            </div>
            <div>
                <div
                    class="h-16 pl-6 border-b border-gray-700 text-base font-medium flex items-center"
                >
                    <ul
                        class="flex flex-wrap -mb-px text-sm font-medium justify-center md:space-x-2 lg:space-x-6"
                        id="myTab"
                        data-tabs-toggle="#myTabContent"
                        role="tablist"
                    >
                        <li class="mr-2" role="presentation">
                            <button
                                class="inline-block p-1 border-b-2"
                                id="ai-assist-tab"
                                data-tabs-target="#ai-assist"
                                type="button"
                                role="tab"
                                aria-controls="ai-assist"
                                aria-selected="false"
                            >
                                A.I. Assist
                            </button>
                        </li>
                        <li class="mr-2" role="presentation">
                            <button
                                class="inline-block p-1 border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="examples-tab"
                                data-tabs-target="#examples"
                                type="button"
                                role="tab"
                                aria-controls="examples"
                                aria-selected="false"
                            >
                                Examples
                            </button>
                        </li>
                        <li class="mr-2" role="presentation">
                            <button
                                class="inline-block p-1 border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="resources-tab"
                                data-tabs-target="#resources"
                                type="button"
                                role="tab"
                                aria-controls="resources"
                                aria-selected="false"
                            >
                                Resources
                            </button>
                        </li>
                        <li class="mr-2" role="presentation">
                            <button
                                class="inline-block p-1 border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="notes-tab"
                                data-tabs-target="#notes"
                                type="button"
                                role="tab"
                                aria-controls="notes"
                                aria-selected="false"
                            >
                                Notes
                            </button>
                        </li>
                    </ul>
                </div>
                <div id="myTabContent" class=" ">
                    <div
                        class="p-4 rounded-lg group"
                        id="ai-assist"
                        role="tabpanel"
                        aria-labelledby="ai-assist-tab"
                    >
                        <div
                            class="m-4 min-h-[250px] justify-center items-center"
                        >
                            <div>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="44"
                                    height="40"
                                    viewBox="0 0 44 40"
                                    fill="none"
                                >
                                    <path
                                        d="M33 27C33 29.22 31.22 31 29 31C26.78 31 25 29.22 25 27C25 24.78 26.8 23 29 23C31.2 23 33 24.8 33 27ZM15 23C12.8 23 11 24.8 11 27C11 29.2 12.8 31 15 31C17.2 31 19 29.22 19 27C19 24.78 17.22 23 15 23ZM44 26V32C44 33.1 43.1 34 42 34H40V36C40 38.22 38.22 40 36 40H8C6.93913 40 5.92172 39.5786 5.17157 38.8284C4.42143 38.0783 4 37.0609 4 36V34H2C0.9 34 0 33.1 0 32V26C0 24.9 0.9 24 2 24H4C4 16.26 10.26 10 18 10H20V7.46C18.8 6.78 18 5.48 18 4C18 1.8 19.8 0 22 0C24.2 0 26 1.8 26 4C26 5.48 25.2 6.78 24 7.46V10H26C33.74 10 40 16.26 40 24H42C43.1 24 44 24.9 44 26ZM40 28H36V24C36 18.48 31.52 14 26 14H18C12.48 14 8 18.48 8 24V28H4V30H8V36H36V30H40V28Z"
                                        fill="white"
                                    />
                                </svg>
                            </div>
                            <div class="text-center mt-4">
                                <a
                                    href="javascript:;"
                                    class="text-base font-medium leading-6 text-gray-500 whitespace-no-wrap focus:outline-none focus:text-gray-900 border border-white px-12 py-2 text-white rounded-lg hover:text-black hover:bg-white focus:text-black focus:bg-white"
                                >
                                    Suggest
                                </a>
                            </div>
                        </div>
                        <div class=" ">
                            <form>
                                <div class="relative">
                                    <input
                                        type="search"
                                        id="search"
                                        class="block w-full text-sm bg-brand-700 border-0 my-3 focus:ring-0 focus:border-wave-500 rounded-md placeholder:text-gray-500"
                                        placeholder="Send a Message.."
                                    />
                                    <button
                                        type="button"
                                        class="text-white absolute right-2.5 bottom-2"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                        >
                                            <path
                                                d="M2 21L23 12L2 3V10L17 12L2 14V21Z"
                                                fill="#E9F6FF"
                                            />
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div
                        class="hidden p-4 rounded-lg group"
                        id="examples"
                        role="tabpanel"
                        aria-labelledby="examples-tab"
                    >
                        test2
                    </div>
                    <div
                        class="hidden p-4 rounded-lg group"
                        id="resources"
                        role="tabpanel"
                        aria-labelledby="resources-tab"
                    >
                        test3
                    </div>
                    <div
                        class="hidden p-4 rounded-lg group"
                        id="notes"
                        role="tabpanel"
                        aria-labelledby="notes-tab"
                    >
                        test4
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            progressBar: "w-1/3",
            defaultStep: 1,
            step: 1,
            steps: {
                1: {
                    question:
                        "What specific industry does your business operate in?",
                    subQuestion:
                        "Briefly describe what type of business you're building a brand for",
                    answerInputType: "text",
                    answerInputPlaceHolder:
                        "We oprate in the food and beverage industry",
                    next: 2,
                    back: null,
                },
                2: {
                    question:
                        "What problems / challenges do you help to solve?",
                    subQuestion:
                        "Briefly describe what type of business you're building a brand for",
                    answerInputType: "text",
                    answerInputPlaceHolder:
                        "Being able to feed large groups without the associated problems",
                    next: 3,
                    back: 1,
                },
                3: {
                    question: "Who typically has these challenges?",
                    subQuestion:
                        "Your previous answers should act as the seedr",
                    answerInputType: "select",
                    answerInputPlaceHolder: "Choose industry",
                    answerOptions: [
                        { text: "text1", value: "val1" },
                        { text: "text2", value: "val2" },
                        { text: "text3", value: "val3" },
                    ],
                    next: "register",
                    back: 2,
                },
            },
        };
    },
    methods: {
        next() {
            var next = this.steps[this.step].next;
            if (next == "register") {
                setTimeout(function () {
                    window.location.href = "/register";
                }, 10);
            } else if (next) {
                this.step = next;
            }
        },
        back() {
            var back = this.steps[this.step].back;
            if (back) {
                this.step = back;
            }
        },
    },
};
</script>
