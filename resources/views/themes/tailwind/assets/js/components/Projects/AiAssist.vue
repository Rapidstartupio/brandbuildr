<style>
button[aria-selected="true"] {
    color: white !important;
    border-color: white !important;
}
.st0 {
    fill-rule: evenodd;
    clip-rule: evenodd;
}
/* .section-title,
.active-section + .section-title + .section-title span {
    display: none;
}

.active-section + .section-title,
.active-section + .section-title + .section-title,
.section-title:has(+ * + .active-section),
.section-title:has(+ .active-section),
.active-section {
    display: block;
} 
.active-section + .section-title + .section-title {
    background: linear-gradient(
        90deg,
        #b6b6b8 0%,
        rgba(182, 182, 184, 0) 119.02%
    );
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
.section-title:has(+ * + .active-section) {
    background: linear-gradient(
        90deg,
        rgba(182, 182, 184, 0) 0%,
        #b6b6b8 119.02%
    );
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}*/
.block-item .number {
    padding: 10px;
    border-radius: 4px;
    margin-bottom: 5px;
    /* @apply mx-2; */
    border-radius: 4px;
    border: 1px solid #82828d;
    color: #82828d;
}
.block-item .title {
    min-width: 4rem;
    color: #82828d;
}
.block-item.active-block .number {
    @apply bg-wave-500;
    border: none;
    color: white;
}
.block-item.active-block .title {
    color: white;
}
div.block-item {
    margin-right: 3em !important;
    position: relative;
}

.block-item:before,
.block-item:after {
    content: "";
    width: 3em; /* size of your margin */
    border-bottom: 1px solid;
    position: absolute;
    top: 35%;
    color: #82828d;
}
.block-item::after {
    left: 100%;
}
.block-item::before {
    right: 100%;
    display: none;
}
.block-item:first-of-type:before {
    display: none;
}
.project-blocks {
    white-space: nowrap;
    /* */
    text-align: center;
}

.block-item {
    display: none;
}

/* .active-block + .block-item,
.active-block + .block-item + .block-item,
.active-block + .block-item + .block-item + .block-item,
.block-item:has(+ * + .active-block),
.block-item:has(+ .active-block),
.active-block {
    display: block;
} */


.progressbar li:before {
  width: 50px;
  height: 50px;
  line-height: 50px;
}
.progressbar li:after {
    top: 25px;
}
/* .progressbar li {
    padding-right: 40px;
    padding-left: 40px;
} */


</style>
<template>
    <div
        class="py-4 mx-auto px-2 text-white max-w-screen-2xl"
        v-if="this.project"
    >
        <div class="dark:text-white">
            <div class="flex justify-between">
                <div
                    class="space-x-5"
                    style="
                        color: white;
                        font-size: 24px;
                        fontmy-family: Helvetica Neue;
                        font-weight: 500;
                        word-wrap: break-word;
                    "
                >
                    <a :href="'/project/'+this.project.id" class="capitalize">{{ this.project.name }}</a>
                    <span>|</span> 
                    <span class="capitalize">{{ this.project.type }}</span>
                    <span>|</span>
                    <span>
                        <button type="button" class="focus:outline-none rounded-lg focus:ring-4  font-medium rounded-lg text-base px-2" :style="{color: this.project.client.tag_color,'background-color': this.project.client.tag_bg_color}">{{this.project.client.tag ?  this.project.client.tag :this.project.client.company_name}}</button>
                    </span>
                </div>
                <div class="">
                    <a :href="'/project/'+this.project.id">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" data-slot="icon" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                    </a>
                </div>
            </div>
            
            <div class="w-full">
                <div class="w-full text-white pt-10 overflow-auto">
                    <ul class="progressbar flex items-baseline">
                        <li  v-for="(section, index) in this.project.sections" class="text-xl capitalize  h-44 w-44" :class="[ section.order <= this.section.order ? 'active' : '']"><a :href="'/project/'+this.project.id+'/section/'+section.id+'/block/'+section.blocks[0].id+'/ai-assist'">{{ section.name }} </a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div
            class=" bg-gradient-to-r from-[#1E1E34] via-[#241E44] to-[#1E1E34] rounded-lg"
        >
            <div class="  p-4 border-b border-gray-700">
                <div
                    class="sm:flex sm:space-x-3"
                >
                    <div
                        class="flex items-center space-x-2"
                        v-for="(block, index) in this.section.blocks"
                        :class="{
                            'active-block': block.id == this.blockId,
                        }"
                        :data-block-id="block.id"
                    >   
                        <a  :href="'/project/'+this.project.id+'/section/'+this.section.id+'/block/'+block.id+'/ai-assist'">
                            <div class=" p-2 rounded" :class="{'bg-wave-500': block.order <= this.block.order}" >{{ this.section.order + '-'+ block.order +' '+ block.name }}</div> 
                        </a>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" stroke-width="1.5" stroke="currentColor" data-slot="icon" class="w-3 h-3">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" " v-if="step == 'review'">
                <div
                    class="h-16 pl-6 border-b border-gray-700 text-base font-medium flex items-center"
                >
                    <div class="flex-auto">{{ this.section.name }} Review</div>
                </div>
                <div  class="">
                    <ul>
                        <li class="p-4 md:px-6 md-py-8 border-b border-gray-700 space-y-4 flex justify-between"  v-for="(question, index) in steps" :key="index">
                            <div class="flex-1">
                                <div class="font-medium">{{ question.question }}</div>
                                <div v-if="question.on_review == false" class="text-sm font-light text-gray-300 whitespace-pre-line" v-html="question.answer"></div>
                                <div v-else>
                                    <textarea :ref="'atextarea'+ index" @input="adjustTextareaHeight('atextarea'+index)" class="block w-full text-sm bg-brand-700 border-0 my-3 focus:ring-0 focus:border-wave-500 rounded-md placeholder:text-gray-500" v-html="question.answer"></textarea>
                                </div>
                            </div>
                            <div  class="text-gray-400 flex space-x-2">
                                <a href="javascript:;" v-on:click="viewQuestion(index)">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                                        <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Z" />
                                        <path fill-rule="evenodd" d="M1.38 8.28a.87.87 0 0 1 0-.566 7.003 7.003 0 0 1 13.238.006.87.87 0 0 1 0 .566A7.003 7.003 0 0 1 1.379 8.28ZM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                                <a v-if="question.on_review == false" href="javascript:;" v-on:click="editAnswer(index)">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                                        <path fill-rule="evenodd" d="M11.013 2.513a1.75 1.75 0 0 1 2.475 2.474L6.226 12.25a2.751 2.751 0 0 1-.892.596l-2.047.848a.75.75 0 0 1-.98-.98l.848-2.047a2.75 2.75 0 0 1 .596-.892l7.262-7.261Z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                                <a v-else href="javascript:;" v-on:click="saveAnswer(index)">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                        <path fill-rule="evenodd" d="M4.25 2A2.25 2.25 0 0 0 2 4.25v11.5A2.25 2.25 0 0 0 4.25 18h11.5A2.25 2.25 0 0 0 18 15.75V4.25A2.25 2.25 0 0 0 15.75 2H4.25ZM6 13.25V3.5h8v9.75a.75.75 0 0 1-1.064.681L10 12.576l-2.936 1.355A.75.75 0 0 1 6 13.25Z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="p-4 md:px-10 md-py-8 text-end">
                    <button class="py-2 px-8 rounded-lg underline text-gray-300" v-on:click="unreview()">Back</button>
                    <button class="bg-wave-500 hover:bg-wave-700 text-white py-2 px-8 rounded-lg" v-on:click="submit()">Submit</button>
                </div>
            </div>
            <div class="grid md:grid-cols-2">
                <div class="md:border-r md:border-gray-700" v-if="step != 'review'">
                    <div
                        class="h-16 pl-6 border-b border-gray-700 text-base font-medium flex items-center"
                    >
                        <div class="flex-auto">{{ this.section.name }}</div>
                        <div class="flex-end pr-4">
                            {{ step + 1 }}/{{ steps.length }}
                        </div>
                    </div>
                    <div
                        class="progress-bar h-0.5 bg-wave-500"
                        :style="{ width: progressBar + '%' }"
                    ></div>
                    <div class="p-4 md:p-10" v-if="steps">
                        <div class="text-center">
                            <p class="text-sm font-light text-white">
                                {{ steps[step].question_ai }}
                            </p>
                            <h2 class="text-xl font-medium">
                                {{ steps[step].question }}
                            </h2>
                        </div>
                        <div class="pt-12 md:px-6">
                            <div v-if="steps[step].answerInputType == 'text'">
                                <textarea
                                    class="w-full bg-transparent border-0 border-b border-white placeholder:text-gray-200 my-3 focus:ring-0 focus:border-wave-500 text-xs"
                                    cols="30" :rows="answerRows"
                                    :placeholder="steps[step].answerInputPlaceHolder"
                                    v-model="steps[step].answer"
                                    required
                                    :ref="'qtextarea'+ step"
                                    @input="adjustTextareaHeight('qtextarea'+ step)"
                                    ></textarea>
                                <!--<input
                                    type="text"
                                    class="w-full bg-transparent border-0 border-b border-white placeholder:text-gray-200 my-3 focus:ring-0 focus:border-wave-500 text-xs"
                                    :placeholder="
                                        steps[step].answerInputPlaceHolder
                                    "
                                    v-model="steps[step].answer"
                                    required
                                    />
                                <textarea
                                    id="" cols="30"
                                    rows="10"
                                    class=""
                                    :placeholder="
                                        steps[step].answerInputPlaceHolder
                                    ">
                                    {{  steps[step].answer }}
                                </textarea> -->
                            </div>
                            <div v-if="steps[step].answerInputType == 'select'">
                                <select
                                    class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 my-3 text-xs"
                                    :value="steps[step].answer"
                                >
                                    <option selected value="">
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
                                v-if="steps[step].back !== null"
                                class="py-2 px-8 rounded-lg underline text-gray-300"
                                v-on:click="back()"
                            >
                                Back
                            </button>
                        </div>
                    </div>
                </div>
                <div v-if="step != 'review'">
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
                            <li class="mr-2 hidden" role="presentation">
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
                            <li class="mr-2 hidden" role="presentation">
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
                                class="m-4 min-h-[250px] justify-center items-center" :class="{'loading-card': isLoading}"
                            >

                                <div role="status" class="absolute -translate-x-1/2 -translate-y-1/2 top-2/4 left-1/2" :class="{hidden: !isLoading}">
                                    <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
                                    <span class="sr-only">Loading...</span>
                                </div>

                                <div class="pt-10">
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
                                <div class="text-center mt-4" :class="isSuggest">
                                    <a
                                        href="javascript:;"
                                        class="text-base font-medium leading-6 text-gray-500 whitespace-no-wrap border border-white px-12 py-2 text-white rounded-lg hover:text-black hover:bg-white"
                                        v-on:click="showSuggestion()"
                                        :class="{isDisabled : isLoading}"
                                        >
                                        Suggest
                                    </a>
                                </div>
                                <div :class="isHiddenSuggestResult">
                                    <p
                                        class="px-4 py-6 text-sm font-light text-center"
                                    >
                                    <div style="white-space: pre-line;" v-html="suggestResult"></div>
                                    </p>
                                    <div class="text-center">
                                        <button
                                            class="bg-wave-500 hover:bg-wave-700 text-white py-1 px-8 rounded-lg mr-2"
                                            v-on:click="copySuggestionToAnswer()"
                                            :class="{isDisabled : isLoading}"
                                        >
                                            Copy to Answer
                                        </button>
                                        <button
                                            class="text-base font-medium leading-6 text-gray-500 whitespace-no-wrap border border-white px-8 py-1 text-white rounded-lg hover:text-black hover:bg-white mr-2 mt-2"
                                            v-on:click="showSuggestion()"
                                            :class="{isDisabled : isLoading}"
                                        >
                                            Suggest Again
                                        </button>
                                    </div>
                                </div>
                                <div class="mt-4 max-h-96 overflow-auto">
                                    <div
                                        v-for="(msg, index) in this.steps[this.step].chatbot_messages"
                                        class="grid grid-cols-6 py-2 border-t border-gray-600"
                                    >
                                        <div
                                            class="icon mr-2 text-gray-600 text-xl h-8 w-8"
                                        >
                                            <svg
                                                v-if="msg.isBot"
                                                version="1.1"
                                                id="Layer_1"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                x="0px"
                                                y="0px"
                                                viewBox="0 0 119.36 122.88"
                                                class="fill-current dark:text-gray-400"
                                                style=""
                                                xml:space="preserve"
                                            >
                                                <g>
                                                    <path
                                                        class="st0"
                                                        d="M6.89,40.02h6.91v-1.6c0-2.14,0.43-4.18,1.2-6.04c0.81-1.93,1.98-3.68,3.45-5.14 c1.46-1.46,3.21-2.64,5.14-3.45c1.86-0.78,3.9-1.21,6.04-1.21h27.48v-0.14v-7.27c-0.45-0.16-0.87-0.37-1.28-0.6 c-0.57-0.34-1.1-0.75-1.56-1.21c-0.72-0.72-1.3-1.58-1.7-2.54c-0.38-0.92-0.59-1.94-0.59-2.99c0-1.06,0.21-2.07,0.59-2.99 c0.4-0.96,0.98-1.83,1.7-2.55c0.72-0.72,1.58-1.3,2.54-1.7C57.73,0.2,58.75,0,59.8,0c1.05,0,2.07,0.21,2.99,0.59 c0.96,0.4,1.83,0.98,2.55,1.7c0.72,0.72,1.3,1.58,1.7,2.55c0.38,0.92,0.59,1.94,0.59,2.99c0,1.06-0.21,2.07-0.59,2.99 c-0.4,0.96-0.98,1.83-1.7,2.54l-0.04,0.04c-0.46,0.45-0.97,0.85-1.53,1.18c-0.41,0.24-0.84,0.45-1.28,0.6v7.27v0.14h27.48 c2.14,0,4.18,0.43,6.04,1.21c1.94,0.81,3.68,1.98,5.14,3.45c1.46,1.46,2.64,3.21,3.45,5.14c0.78,1.87,1.2,3.9,1.2,6.04v1.6h6.66 c0.92,0,1.82,0.18,2.63,0.52c0.85,0.35,1.6,0.86,2.23,1.5l0.04,0.04c0.62,0.63,1.12,1.37,1.46,2.2c0.34,0.82,0.52,1.7,0.52,2.63 v18.38c0,0.92-0.18,1.82-0.52,2.63c-0.35,0.84-0.86,1.6-1.5,2.23l0,0c-1.24,1.24-2.97,2.02-4.87,2.02h-6.67 c-0.03,2.05-0.46,4.02-1.21,5.82c-0.81,1.94-1.98,3.68-3.45,5.14c-1.46,1.46-3.21,2.64-5.14,3.45c-1.87,0.78-3.9,1.2-6.04,1.2 H79.36v26.54h16.68c0.09-0.14,0.18-0.29,0.28-0.43c0.2-0.29,0.42-0.55,0.66-0.8c0.52-0.52,1.15-0.95,1.86-1.24 c0.68-0.28,1.42-0.43,2.19-0.43c0.76,0,1.52,0.15,2.19,0.43c0.71,0.29,1.33,0.72,1.86,1.24c0.52,0.52,0.95,1.15,1.24,1.86 c0.28,0.68,0.43,1.42,0.43,2.19c0,0.77-0.16,1.5-0.43,2.19c-0.29,0.71-0.72,1.34-1.24,1.86c-0.52,0.52-1.15,0.95-1.86,1.24 c-0.68,0.28-1.42,0.43-2.19,0.43c-0.75,0-1.47-0.14-2.15-0.42l-0.04-0.01c-0.71-0.29-1.33-0.72-1.86-1.24 c-0.32-0.32-0.61-0.7-0.85-1.09c-0.13-0.22-0.26-0.46-0.35-0.7H76.81c-0.71,0-1.34-0.29-1.81-0.75c-0.48-0.47-0.76-1.11-0.76-1.82 l0,0V87.79H61.83v24.23c0.19,0.1,0.38,0.2,0.56,0.32c0.34,0.21,0.66,0.48,0.94,0.75c0.53,0.53,0.95,1.15,1.24,1.86 c0.28,0.68,0.43,1.42,0.43,2.19c0,0.75-0.14,1.47-0.42,2.15l-0.01,0.04c-0.29,0.71-0.72,1.33-1.24,1.86 c-0.52,0.52-1.15,0.95-1.86,1.24c-0.68,0.28-1.42,0.43-2.19,0.43c-0.77,0-1.51-0.16-2.19-0.43c-0.71-0.29-1.34-0.72-1.86-1.24 c-0.52-0.52-0.95-1.15-1.24-1.86c-0.27-0.68-0.43-1.42-0.43-2.19c0-0.75,0.14-1.47,0.42-2.15l0.01-0.04 c0.29-0.71,0.72-1.33,1.24-1.86c0.27-0.28,0.58-0.52,0.91-0.73l0.04-0.03c0.18-0.1,0.37-0.2,0.56-0.3l0,0V87.79H40.18v13.37 c0,0.71-0.29,1.34-0.75,1.8c-0.47,0.47-1.1,0.75-1.81,0.75H25.88c-0.09,0.18-0.19,0.34-0.3,0.52c-0.2,0.3-0.43,0.59-0.7,0.85 l-0.05,0.04c-0.52,0.52-1.15,0.95-1.86,1.24c-0.68,0.28-1.42,0.43-2.19,0.43c-0.75,0-1.47-0.15-2.15-0.42l-0.04-0.01 c-0.71-0.29-1.33-0.72-1.86-1.24c-0.52-0.52-0.95-1.15-1.24-1.86c-0.28-0.68-0.43-1.42-0.43-2.19c0-0.76,0.16-1.51,0.43-2.2 c0.29-0.71,0.72-1.34,1.24-1.86c0.54-0.51,1.19-0.94,1.9-1.23l0,0c0.68-0.28,1.42-0.43,2.19-0.43c0.78,0,1.52,0.16,2.19,0.43 c0.68,0.29,1.3,0.7,1.81,1.22l0.04,0.03c0.29,0.29,0.56,0.62,0.78,0.97c0.11,0.19,0.23,0.39,0.33,0.61h9.11V87.79h-5.44 c-2.14,0-4.18-0.43-6.04-1.2c-1.94-0.81-3.68-1.98-5.14-3.45C16.99,81.68,15.81,79.93,15,78c-0.75-1.8-1.17-3.77-1.2-5.82H6.89 c-0.92,0-1.82-0.18-2.63-0.52c-0.85-0.35-1.6-0.86-2.23-1.5l-0.04-0.04c-0.62-0.63-1.12-1.37-1.46-2.2C0.18,67.11,0,66.21,0,65.29 V46.91c0-0.92,0.18-1.82,0.53-2.63c0.35-0.84,0.86-1.6,1.5-2.23l0,0c0.63-0.63,1.39-1.15,2.23-1.5 C5.07,40.21,5.96,40.02,6.89,40.02L6.89,40.02L6.89,40.02z M45.66,69.59c-0.14-0.11-0.25-0.22-0.36-0.36 c-0.32-0.39-0.49-0.84-0.5-1.29c-0.01-0.46,0.14-0.91,0.44-1.31c0.11-0.14,0.22-0.26,0.37-0.38c0.51-0.42,1.18-0.64,1.84-0.65 c0.66-0.01,1.32,0.18,1.85,0.58c1.81,1.39,3.59,2.4,5.36,3.07c1.75,0.66,3.48,0.97,5.19,0.95c1.72-0.02,3.46-0.38,5.24-1.05 c1.8-0.68,3.6-1.7,5.44-3.01c0.54-0.39,1.21-0.56,1.87-0.53c0.66,0.03,1.32,0.26,1.82,0.7c0.13,0.12,0.24,0.24,0.35,0.39 c0.29,0.41,0.43,0.87,0.4,1.33c-0.03,0.46-0.21,0.9-0.54,1.28c-0.12,0.13-0.25,0.25-0.41,0.36c-2.3,1.66-4.61,2.92-6.96,3.79 c-2.35,0.86-4.73,1.32-7.14,1.35c-2.42,0.03-4.81-0.38-7.19-1.24c-2.36-0.85-4.71-2.17-7.02-3.94L45.66,69.59L45.66,69.59 L45.66,69.59z M39.61,39.88c0.58,0,1.17,0.06,1.72,0.17c0.56,0.12,1.12,0.28,1.65,0.5c0.54,0.22,1.06,0.5,1.53,0.82 c0.47,0.31,0.9,0.66,1.29,1.05l0.06,0.05c0.41,0.41,0.78,0.85,1.1,1.34l0.02,0.03c0.31,0.47,0.58,0.97,0.8,1.51 c0.22,0.53,0.39,1.09,0.5,1.65c0.11,0.56,0.18,1.14,0.18,1.72c0,0.58-0.06,1.17-0.18,1.72C48.17,51,48,51.55,47.78,52.1 c-0.22,0.54-0.5,1.06-0.82,1.53c-0.97,1.46-2.36,2.59-3.98,3.25c-0.53,0.22-1.09,0.39-1.66,0.51c-0.56,0.11-1.14,0.16-1.72,0.16 c-0.58,0-1.17-0.06-1.72-0.16c-0.56-0.12-1.12-0.28-1.66-0.51c-0.54-0.22-1.06-0.5-1.54-0.82c-0.5-0.33-0.94-0.7-1.34-1.1 c-0.41-0.41-0.78-0.85-1.1-1.34l-0.02-0.03c-0.31-0.47-0.58-0.97-0.8-1.51c-0.22-0.53-0.39-1.09-0.51-1.65 c-0.11-0.56-0.16-1.14-0.16-1.72c0-0.58,0.06-1.17,0.16-1.72c0.12-0.56,0.28-1.12,0.51-1.65c0.22-0.54,0.5-1.06,0.82-1.53 c0.33-0.5,0.7-0.94,1.1-1.34c0.41-0.41,0.85-0.78,1.34-1.1l0.03-0.02c0.47-0.31,0.97-0.58,1.51-0.8c0.53-0.22,1.09-0.39,1.65-0.5 C38.44,39.94,39.02,39.88,39.61,39.88L39.61,39.88L39.61,39.88z M80,39.88c0.58,0,1.17,0.06,1.72,0.17 c0.56,0.12,1.12,0.28,1.65,0.5c0.54,0.22,1.06,0.5,1.53,0.82c0.46,0.31,0.88,0.65,1.27,1.04c0.02,0.02,0.05,0.04,0.07,0.06 c0.41,0.41,0.78,0.85,1.1,1.34l0.02,0.03c0.31,0.47,0.58,0.97,0.8,1.51c0.22,0.53,0.39,1.09,0.51,1.65 c0.11,0.56,0.16,1.14,0.16,1.72c0,0.58-0.06,1.17-0.16,1.72c-0.12,0.56-0.28,1.12-0.51,1.66c-0.22,0.54-0.5,1.06-0.82,1.53 c-0.33,0.5-0.7,0.94-1.1,1.34c-0.41,0.41-0.85,0.78-1.34,1.1l-0.03,0.02c-0.48,0.31-0.97,0.58-1.51,0.8 c-0.53,0.22-1.09,0.39-1.66,0.51c-0.56,0.11-1.14,0.16-1.72,0.16c-0.58,0-1.17-0.06-1.72-0.16c-0.56-0.12-1.12-0.28-1.66-0.51 c-0.55-0.23-1.07-0.51-1.53-0.82l-0.05-0.04c-0.47-0.32-0.9-0.67-1.29-1.06c-0.41-0.41-0.78-0.85-1.1-1.34l-0.02-0.03 c-0.31-0.47-0.58-0.97-0.8-1.51c-0.22-0.53-0.39-1.09-0.51-1.65c-0.11-0.56-0.17-1.14-0.17-1.72c0-0.58,0.06-1.17,0.17-1.72 c0.12-0.56,0.28-1.12,0.51-1.65c0.22-0.54,0.5-1.06,0.82-1.53c0.33-0.5,0.7-0.94,1.1-1.34c0.4-0.4,0.85-0.77,1.34-1.1 c0.48-0.32,0.99-0.59,1.53-0.83c0.53-0.22,1.09-0.39,1.65-0.5C78.84,39.94,79.42,39.88,80,39.88L80,39.88L80,39.88z M17.67,41.97 v29.99c0,1.61,0.32,3.15,0.9,4.56c0.61,1.46,1.5,2.78,2.6,3.89c1.11,1.11,2.43,2,3.89,2.6c1.4,0.58,2.94,0.9,4.56,0.9h60.36 c1.61,0,3.15-0.32,4.56-0.9c1.46-0.61,2.78-1.5,3.89-2.6c1.11-1.11,2-2.43,2.6-3.89c0.58-1.4,0.9-2.94,0.9-4.56V38.42 c0-1.61-0.32-3.16-0.9-4.56c-0.61-1.46-1.5-2.78-2.6-3.89c-1.11-1.11-2.43-2-3.89-2.6c-1.4-0.58-2.94-0.9-4.56-0.9H29.63 c-1.61,0-3.15,0.32-4.56,0.9c-1.46,0.61-2.78,1.5-3.89,2.6c-1.11,1.11-2,2.43-2.6,3.89c-0.58,1.4-0.9,2.94-0.9,4.56L17.67,41.97 L17.67,41.97L17.67,41.97z M13.79,43.9H6.89c-0.41,0-0.8,0.08-1.15,0.22c-0.37,0.16-0.7,0.38-0.98,0.66l-0.04,0.03 c-0.26,0.27-0.48,0.59-0.62,0.94c-0.15,0.35-0.22,0.74-0.22,1.15v18.38c0,0.41,0.08,0.8,0.22,1.15c0.16,0.37,0.38,0.7,0.66,0.98 c0.54,0.54,1.29,0.88,2.12,0.88h6.91L13.79,43.9L13.79,43.9L13.79,43.9z M112.48,43.9h-6.66v24.39h6.66c0.41,0,0.8-0.08,1.15-0.22 c0.37-0.16,0.7-0.38,0.98-0.66c0.28-0.28,0.51-0.61,0.66-0.98c0.15-0.35,0.22-0.74,0.22-1.15V46.91c0-0.41-0.08-0.8-0.22-1.15 c-0.16-0.37-0.38-0.7-0.66-0.98l0,0c-0.28-0.28-0.61-0.51-0.98-0.66C113.28,43.99,112.89,43.9,112.48,43.9L112.48,43.9L112.48,43.9 z"
                                                    ></path>
                                                </g>
                                            </svg>
                                            <svg
                                                v-else
                                                version="1.1"
                                                id="Layer_1"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                x="0px"
                                                y="0px"
                                                viewBox="0 0 102.74 122.88"
                                                class="fill-current dark:text-gray-400"
                                                style=""
                                                xml:space="preserve"
                                            >
                                                <g>
                                                    <path
                                                        class="st0"
                                                        d="M51.31,103.57c2.96,0,5.35,2.4,5.35,5.35c0,2.96-2.4,5.35-5.35,5.35c-2.96,0-5.35-2.4-5.35-5.35 C45.96,105.96,48.36,103.57,51.31,103.57L51.31,103.57z M31.25,37.01c-1.11,0.04-1.96,0.27-2.54,0.66 c-0.33,0.22-0.57,0.5-0.73,0.84c-0.17,0.37-0.25,0.83-0.24,1.35c0.04,1.53,0.85,3.53,2.4,5.83l0.02,0.03l0,0l5.03,8 c2.02,3.21,4.13,6.48,6.76,8.88c2.53,2.31,5.59,3.87,9.65,3.88c4.39,0.01,7.6-1.61,10.21-4.05c2.71-2.54,4.85-6.02,6.96-9.49 l5.67-9.33c1.06-2.41,1.44-4.02,1.2-4.97c-0.14-0.56-0.76-0.84-1.82-0.89c-0.22-0.01-0.46-0.01-0.69-0.01 c-0.25,0.01-0.52,0.02-0.79,0.05c-0.15,0.01-0.3,0-0.44-0.03c-0.5,0.03-1.02-0.01-1.55-0.08l1.94-8.59 c-14.4,2.27-25.17-8.42-40.39-2.14l1.1,10.12C32.37,37.11,31.78,37.09,31.25,37.01L31.25,37.01L31.25,37.01z M75.73,35.2 c1.39,0.42,2.29,1.31,2.65,2.74c0.4,1.59-0.03,3.82-1.38,6.87l0,0c-0.02,0.06-0.05,0.11-0.08,0.16l-5.73,9.44 c-2.21,3.64-4.45,7.29-7.45,10.09l-0.15,0.13c0.29,0.41,0.6,0.87,0.92,1.34c0.99,1.46,2.13,3.12,3.18,4.42 c6.23,3.87,19.93,4.92,25.29,7.9c13.64,7.6,8.66,26.07,9.65,39.36c-0.29,3.14-2.07,4.94-5.58,5.21h-3.79l4.15-31.5 c0.32-2.45-1.42-4.46-3.56-4.46h-29.2c0.72-5.15,1.25-10.07,1.49-13.78c-1.36-1.52-2.82-3.65-4.07-5.49 c-0.28-0.41-0.55-0.8-0.8-1.17c-2.63,1.77-5.76,2.86-9.68,2.85c-4.37-0.01-7.77-1.51-10.6-3.8c-0.79,2.37-1.96,5.63-3.08,7.18 c-0.1,0.14-0.22,0.26-0.35,0.35c0.48,3.84,1.15,8.76,1.94,13.86H9.58c-2.14,0-3.89,2.01-3.56,4.46l4.15,31.5H6.38 c-3.5-0.27-5.28-2.07-5.57-5.21c0.17-14.07-5.17-31.1,9.65-39.36c5.43-3.03,19.42-4.06,25.53-8.06c0.93-1.75,1.97-4.9,2.59-6.78 c0.07-0.21-0.05,0.14,0.06-0.18c-2.24-2.41-4.08-5.26-5.84-8.06l-5.03-8c-1.84-2.74-2.8-5.25-2.85-7.31 c-0.03-0.97,0.14-1.85,0.49-2.62c0.38-0.81,0.95-1.49,1.73-2.01c0.36-0.25,0.77-0.45,1.22-0.62c-0.33-4.34-0.45-9.8-0.24-14.38 c0.11-1.09,0.32-2.17,0.62-3.26c1.84-6.58,7.5-11.32,13.96-13.55c3.13-1.08,1.92-3.66,5.09-3.49c7.51,0.41,19.09,5.25,23.54,10.38 C77.55,17.58,75.95,26.43,75.73,35.2L75.73,35.2L75.73,35.2z M41.36,79.19c-2.54-2.89-2.75-5.91,0-9.11 c3.18,0.8,6.1,2.18,8.78,4.04c0.58-0.25,1.25-0.36,1.91-0.31c2.79-1.98,6.35-2.77,9.46-4.26c3.71,3.62,3.32,6.94-0.34,10.04 c-2.04-0.47-3.98-1.19-5.84-2.13c-0.05,0.48-0.18,1-0.4,1.57l0.95,7.89h-7.58l0.95-7.89c-0.59-1-0.82-1.86-0.8-2.57 C46.25,77.78,43.86,78.62,41.36,79.19L41.36,79.19z"
                                                    ></path>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="content col-span-5">
                                            <div  style="white-space: pre-line;" v-html="msg.text"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" ">
                                <div>
                                    <div class="relative">
                                        <input
                                            type="search"
                                            id="search"
                                            class="block w-full text-sm bg-brand-700 border-0 my-3 focus:ring-0 focus:border-wave-500 rounded-md placeholder:text-gray-500"
                                            placeholder="Send a Message.."
                                            v-model="chatbot.userInput"
                                            v-on:keyup.enter="sendChatbotMessage()"
                                        />
                                        <button
                                            type="button"
                                            class="text-white absolute right-2.5 bottom-2"
                                            v-on:click="sendChatbotMessage()"
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
                                </div>
                            </div>
                        </div>
                        <div
                            class="hidden p-4 rounded-lg group"
                            id="examples"
                            role="tabpanel"
                            aria-labelledby="examples-tab"
                        >
                            <div v-for="(question, index0) in steps">
                                <div
                                    v-if="question.examples.length == 1"
                                    :class="{
                                        hidden: step != index0,
                                    }"
                                >
                                    <div class="">
                                        <div
                                            class="text-center text-base font-medium leading-snug pb-6"
                                        >
                                            Example # {{ 1 }}
                                        </div>

                                        <div
                                            class="text-center text-base font-normal leading-snug"
                                        >
                                            <span
                                                class="bg-brand-700 p-2 rounded-2xl text-sm"
                                            >
                                                {{
                                                    question.examples[0].title
                                                }}</span
                                            >
                                        </div>
                                        <div>
                                            <p
                                                class="px-12 py-6 text-sm font-light"
                                            >
                                                {{ question.examples[0].content }}
                                            </p>
                                            <div class="text-center py-6">
                                                <button
                                                    class="text-base font-medium leading-6 text-gray-500 whitespace-no-wrap focus:outline-none focus:text-gray-900 border border-white px-8 py-1 text-white rounded-lg hover:text-black hover:bg-white focus:text-black focus:bg-white"
                                                    v-on:click="
                                                        copyExampleToAnswer(
                                                            question.examples[0]
                                                                .content
                                                        )
                                                    "
                                                >
                                                    Copy to Answer
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    :id="'carsoul-' + index0"
                                    class="relative w-full"
                                    data-carousel="static"
                                    v-else-if="question.examples.length > 1"
                                    :class="{
                                        hidden: step != index0,
                                    }"
                                >
                                    <!-- Carousel wrapper -->
                                    <div
                                        class="relative h-56 overflow-hidden rounded-lg md:h-96"
                                    >
                                        <!-- Item -->
                                        <div
                                            class="hidden duration-700 ease-in-out text-center"
                                            v-for="(
                                                example, index
                                            ) in question.examples"
                                            :data-carousel-item="
                                                index == 0 ? 'active' : ''
                                            "
                                        >
                                            <div
                                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 px-16"
                                            >
                                                <div
                                                    class="text-center text-base font-medium leading-snug pb-6"
                                                >
                                                    Example # {{ index + 1 }}
                                                </div>

                                                <div
                                                    class="text-center text-base font-normal leading-snug"
                                                >
                                                    <span
                                                        class="bg-brand-700 p-2 rounded-2xl text-sm"
                                                    >
                                                        {{ example.title }}</span
                                                    >
                                                </div>
                                                <div>
                                                    <p
                                                        class="px-12 py-6 text-sm font-light"
                                                    >
                                                        {{ example.content }}
                                                    </p>
                                                    <div class="text-center py-6">
                                                        <button
                                                            class="text-base font-medium leading-6 text-gray-500 whitespace-no-wrap focus:outline-none focus:text-gray-900 border border-white px-8 py-1 text-white rounded-lg hover:text-black hover:bg-white focus:text-black focus:bg-white"
                                                            v-on:click="
                                                                copyExampleToAnswer(
                                                                    example.content
                                                                )
                                                            "
                                                        >
                                                            Copy to Answer
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Slider indicators -->
                                    <div
                                        class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2"
                                    >
                                        <button
                                            v-for="(
                                                example, index
                                            ) in question.examples"
                                            type="button"
                                            class="w-3 h-3 rounded-full dark:bg-white"
                                            aria-current="true"
                                            aria-label="Slide 1"
                                            :data-carousel-slide-to="index"
                                        ></button>
                                    </div>
                                    <!-- Slider controls -->
                                    <button
                                        type="button"
                                        class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                        data-carousel-prev
                                    >
                                        <span
                                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none"
                                        >
                                            <svg
                                                class="w-4 h-4 text-white dark:text-gray-800"
                                                aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 6 10"
                                            >
                                                <path
                                                    stroke="currentColor"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M5 1 1 5l4 4"
                                                />
                                            </svg>
                                            <span class="sr-only">Previous</span>
                                        </span>
                                    </button>
                                    <button
                                        type="button"
                                        class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                        data-carousel-next
                                    >
                                        <span
                                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none"
                                        >
                                            <svg
                                                class="w-4 h-4 text-white dark:text-gray-800"
                                                aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 6 10"
                                            >
                                                <path
                                                    stroke="currentColor"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="m1 9 4-4-4-4"
                                                />
                                            </svg>
                                            <span class="sr-only">Next</span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div
                            class="hidden p-4 rounded-lg group"
                            id="resources"
                            role="tabpanel"
                            aria-labelledby="resources-tab"
                        >
                            <div v-for="(resource, index) in steps[step].resources">
                                <div
                                    class="border-b border-gray-300 py-6"
                                    v-if="JSON.parse(resource.link).length > 0"
                                >
                                    <div>{{ resource.title }}</div>
                                    <div>
                                        <a
                                            :href="
                                                '/storage/' +
                                                JSON.parse(resource.link)[0]
                                                    .download_link
                                            "
                                            download
                                            >{{
                                                JSON.parse(resource.link)[0]
                                                    .original_name
                                            }}</a
                                        >
                                    </div>
                                </div>
                            </div>
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
    </div>
</template>

<script>
import axios from "axios";
import { Tabs } from 'flowbite';
export default {
    mounted() {
        // Call your function or perform initialization here
        this.getProject();
    },
    data() {
        return {
            project: null,
            section: null,
            sections:null,
            block: null,
            progressBar: 0,
            defaultStep: 0,
            step: "0",
            steps: null,
            answerRows:"2",
            isHiddenSuggestResult: "hidden",
            isSuggest: "",
            isLoading:false,
            suggestResult: "",
            chatbot_system_message:"",
            chatbot_initial_user_message:"",
            chatbot: 
            {
                userInput: "",
                messages: [],
                previousMessages: [],
                // {
                //     role: "system",
                //      content: chatbot_system_message,
                //  },
            },
        };
    },
    methods: {
        next() {
            var next = this.steps[this.step].next;
            if(!this.steps[this.step].answer && this.steps[this.step].required){
                popToast(
                    'warning',
                    'Please type your answer!'
                );
                return false;
            }

            if (next == "register") {
                setTimeout(function () {
                    window.location.href = "/register";
                }, 10);
            } else if (next == "review") {
                this.step =  "review";
            }
            else if (next) {
                this.step = next;
                this.progressBar = ((this.step + 1) / this.steps.length) * 100;
                this.suggestResult = "";
                this.isSuggest = "";
                this.isHiddenSuggestResult = "hidden";
                //this.examples = this.steps[this.step].examples;
                this.$nextTick(() => {
                    this.adjustTextareaHeight('qtextarea'+this.step);
                });
            }  
        },
        back() {
            var back = this.steps[this.step].back;
            if (back !== null) {
                this.step = back;
                this.progressBar = ((this.step + 1) / this.steps.length) * 100;
                this.suggestResult = "";
                this.isSuggest = "";
                this.isHiddenSuggestResult = "hidden";
                //this.examples = this.steps[this.step].examples;
                this.$nextTick(() => {
                    this.adjustTextareaHeight('qtextarea'+this.step);
                });
            }
        },
        unreview(){
            this.step =  this.steps.length -1;
        },
        submit(){
            axios
                .post("/submit-project-answers",{data:this.steps,blockId:this.blockId,projectId:this.projectId}) //project/{id}/section/{sectionId}/block/{blockId}/ai-assist
                .then((response) => {
                    //console.log(response);
                    if (response.data.message) {
                        var nextBlock = (document.querySelector('.active-block').nextSibling.dataset != undefined) ? document.querySelector('.active-block').nextSibling.dataset.blockId : null;

                        if(nextBlock){
                            window.location.replace("/project/" +this.projectId+'/section/'+this.sectionId+'/block/'+nextBlock+'/ai-assist');
                        }else{
                            window.location.replace("/project/" +this.projectId);
                        }
                    }
                })
                .catch((error) => {
                    console.error(error);
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
        showSuggestion() {
            this.isLoading = true;
            var prompt = this.steps[this.step].prompt;

            // Use regular expressions to replace {{question:X}} with the corresponding value in the $question array
            if(prompt){
                prompt = prompt.replace(/\{\{question:([\d.]+)\}\}/g, (match, ref) => {
                    var value = "";
                    var step = this.getStepByRef(ref);
                    if(step){
                        if(step.question && step.answer){
                            value = step.question;
                        }
                        //value = this.getStepById(parseInt(questionNumber)).question;
                    }
                    return value; // Return the replacement value or the original match if not found in $question
                });
                prompt = prompt.replace(/\{\{answer:([\d.]+)\}\}/g, (match, ref) => {
                    var value = "na";
                    if(this.getStepByRef(ref)){
                        value = this.getStepByRef(ref).answer;
                    }
                    return value?? ""; // Return the replacement value or the original match if not found in $question
                });
                prompt = prompt.replace(/\{\{question\}\}/g, this.steps[this.step].question);
                prompt = prompt.replace(/:na/g, '');
            }

            //console.log(prompt);
            if(!prompt) {
                this.isLoading = false;
                return false
            };
            // switch from completions to chat
                this.steps[this.step].chatbot_previousMessages.push({
                    role: "user",
                    content: prompt,
                });
                axios
                    .post("/openai/chat", {
                        model: "gpt-4-1106-preview",
                        messages: this.steps[this.step].chatbot_previousMessages,
                    })
                    .then((response) => {
                        const botResponse =
                            response.data.choices[0].message.content;
                        //console.log(botResponse);
                        if (botResponse) {
                            this.steps[this.step].chatbot_previousMessages.push({
                                role: "assistant",
                                content: botResponse,
                            });
                            var suggestion = botResponse;
                            //suggestion = suggestion.replace(/(\r\n|\n|\r)/gm, "");
                            this.suggestResult = suggestion;
                            this.isSuggest = "hidden";
                            this.isHiddenSuggestResult = "";
                            this.steps[this.step].suggest_logs.push(suggestion);
                            //console.log(this.steps[this.step].suggest_logs);
                            this.isLoading = false;
                        }
                    })
                    .catch((error) => {
                        this.isLoading = false;
                        popToast(
                            'danger',
                            'Too many requests at once, please wait 30 seconds and try again'
                        );
                        //console.log(error);
                        //console.error("Error fetching bot response:", error);
                    });
            // end switch
        },
        copySuggestionToAnswer() {
            this.steps[this.step].answer = this.suggestResult;
        },
        sendChatbotMessage() {
            const userMessage = this.chatbot.userInput.trim();
            if (userMessage) {
                //console.log(userMessage);
                this.steps[this.step].chatbot_messages.push({
                    id: Date.now(),
                    text: userMessage,
                    isBot: false,
                });
                this.steps[this.step].chatbot_previousMessages.push({
                    role: "user",
                    content: userMessage,
                });
                this.chatbot.userInput = "";
                axios
                    .post("/openai/chat", {
                        model: "gpt-4-1106-preview",
                        messages: this.steps[this.step].chatbot_previousMessages,
                    })
                    .then((response) => {
                        const botResponse =
                            response.data.choices[0].message.content;
                        //console.log(botResponse);
                        if (botResponse) {
                            this.steps[this.step].chatbot_messages.push({
                                id: Date.now(),
                                text: botResponse,
                                isBot: true,
                            });
                            this.steps[this.step].chatbot_previousMessages.push({
                                role: "assistant",
                                content: botResponse,
                            });
                        }
                    })
                    .catch((error) => {
                        console.log(error);
                        console.error("Error fetching bot response:", error);
                    });
            }
        },
        getProject() {
            axios
                .post(
                    "/project/" +
                        this.projectId +
                        "/section/" +
                        this.sectionId +
                        "/block/" +
                        this.blockId +
                        "/ai-assist"
                ) //project/{id}/section/{sectionId}/block/{blockId}/ai-assist
                .then((response) => {
                    if (response.data.project) {
                        this.project = response.data.project;
                        this.block = response.data.block;
                        this.section = response.data.section;
                        this.steps = response.data.questions;
                        this.progressBar =
                            ((this.step + 1) / this.steps.length) * 100;
                    }
                })
                .catch((err) => console.error(err));
        },
        copyExampleToAnswer(content) {
            this.steps[this.step].answer = content;
        },
        getStepById(id) {
            return this.steps.find(item => item.id === id);
        },
        getStepByRef(ref){
            return this.steps.find(item => item.ref === ref);
        },
        do_resize(){
            console.log("do_resize");
            var maxrows=5;
            var txt=this.steps[this.step].answer;
            var cols=this.answerRows;

            var arraytxt=txt.split('\n');
            var rows=arraytxt.length;

            for (i=0;i<arraytxt.length;i++)
            rows+=parseInt(arraytxt[i].length/cols);

            if (rows>maxrows) this.answerRows=maxrows;
            else this.answerRows=rows;
        },
        viewQuestion(step){
             
            this.step = step;
            this.progressBar = ((this.step + 1) / this.steps.length) * 100;
            this.suggestResult = "";
            this.isSuggest = "";
            this.isHiddenSuggestResult = "hidden";
            this.$nextTick(() => {
                this.adjustTextareaHeight('qtextarea'+this.step);
            });
        },
        adjustTextareaHeight(ref) {
            var textarea = this.$refs[ref];
            if (Array.isArray(textarea)) {
                textarea = textarea[0];
            }
            if(textarea){
                textarea.style.height = "auto";
                textarea.style.height = textarea.scrollHeight + "px";
            }
            
        },
        editAnswer(index){
            this.steps[index].on_review = true;            
            this.$nextTick(() => {
                this.adjustTextareaHeight('atextarea'+index);
            });
        },
        saveAnswer(index){
            var textarea = this.$refs['atextarea'+index];
            if (Array.isArray(textarea)) {
                textarea = textarea[0];
            }
            this.steps[index].answer = textarea.value;
            this.steps[index].on_review = false;
        }
    },
    props: ["projectId", "sectionId", "blockId"],
};
</script>
