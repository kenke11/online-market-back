<template>
    <table class="w-full form-control form-input form-input-bordered">
        <thead>
            <tr class="border-b border-gray-200 dark:border-gray-700 key-value-fields">
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-r border-gray-200 dark:border-gray-700">Key</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-r border-gray-200 dark:border-gray-700">Description</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(detail, index) in details" :key="index" class="border-b border-gray-200 dark:border-gray-700 key-value-fields">
                <td class="whitespace-nowrap border-r border-gray-200 dark:border-gray-700">
                    <div class="w-full h-full flex items-start">
                        <input
                            :value="detail.title"
                            @input="inputValue('title', $event.target.value, index)"
                            type="text"
                            class="font-mono text-xs resize-none block w-full px-3 py-3 dark:text-gray-400 bg-clip-border focus:outline-none focus:ring focus:ring-inset hover:bg-20 focus:bg-white dark:bg-gray-900 dark:focus:bg-gray-900"
                        />
                    </div>
                </td>
                <td class="whitespace-nowrap border-r border-gray-200 dark:border-gray-700">
                    <div
                        class="flex-grow bg-white dark:bg-gray-900"
                    >
                        <textarea
                            :value="detail.desc"
                            @input="inputValue('desc', $event.target.value, index)"
                            type="text"
                            class="font-mono text-xs block w-full h-10 px-3 py-3 dark:text-gray-400 hover:bg-20 focus:bg-white dark:bg-gray-900 dark:focus:bg-gray-900 focus:outline-none focus:ring focus:ring-inset"
                            tabindex="0"
                        />
                    </div>
                </td>
                <td class="whitespace-nowrap flex justify-center items-center h-full">
                    <button @click="removeRow(index)" type="button" class="p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="w-full flex justify-center items-center">
        <button @click="addRow" type="button" class="p-2 text-blue font-bold">Add row</button>
    </div>
</template>

<script setup>
import {ref, defineProps} from 'vue';

const props = defineProps({
    value: {
        type: String,
        required: false,
        default: ""
    }
})

const emit = defineEmits(['setValue'])
const details = ref(JSON.parse(props.value))

const inputValue = (key, value, index) => {
    const el = details.value.find((el, elIndex) => index === elIndex);
    el[key] = value
    submitValueChange()
}

const addRow = () => {
    details.value.push({title: '', desc: ''})
    submitValueChange()
}

const removeRow = (index) => {
    details.value = details.value.filter((detail, detailIndex) => detailIndex !== index)
    submitValueChange()
}

const submitValueChange = () => {
    const subValue = JSON.stringify(details.value)
    emit('setValue', subValue)
}
</script>

<style scoped>
.text-blue {
    color: rgba(var(--colors-primary-500));
}
</style>
