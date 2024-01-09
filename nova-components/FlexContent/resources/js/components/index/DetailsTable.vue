<template>
    <table class="w-full form-control form-input form-input-bordered">
        <thead>
        <tr class="border-b border-gray-200 dark:border-gray-700 key-value-fields">
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-r border-gray-200 dark:border-gray-700">Key</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-r border-gray-200 dark:border-gray-700">Description</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(detail, index) in details" :key="index" class="border-b border-gray-200 dark:border-gray-700 key-value-fields">
            <td class="whitespace-nowrap w-1/2 max-2-1/2 border-r border-gray-200 dark:border-gray-700">
                <div class="w-full h-full flex items-start px-4 py-2">
                    {{detail.title}}
                </div>
            </td>
            <td class="whitespace w-1/2 max-w-1/2 border-r border-gray-200 dark:border-gray-700">
                <div
                    class="whitespace flex-grow bg-white dark:bg-gray-900  px-4 py-2"
                >
                    <p class="whitespace" v-html="detail.desc"></p>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</template>

<script setup>
import {ref, defineProps, onMounted} from 'vue';
import {value} from "lodash/seq";

const props = defineProps({
    value: {
        type: String,
        required: false,
        default: ""
    }
})

const details = ref(JSON.parse(props.value))

const addLineBreaks = (text) => {
    return text.replace(/\n/g, '<br>');
};

onMounted(() => {
    details.value = details.value.map((detail) => {
        detail.desc = addLineBreaks(detail.desc);
        return detail;
    })
})
</script>
