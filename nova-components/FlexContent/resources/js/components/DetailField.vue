<template>
    <div class="flex flex-col -mx-6 px-6 py-2 space-y-2 md:flex-row @sm/peekable:flex-row @md/modal:flex-row md:py-0 @sm/peekable:py-0 @md/modal:py-0 md:space-y-0 @sm/peekable:space-y-0 @md/modal:space-y-0">
        <div
            class="md:w-1/4 @sm/peekable:w-1/4 @md/modal:w-1/4 md:py-3 @sm/peekable:py-3 @md/modal:py-3"
        >
            {{field.indexName}}
        </div>
        <div class="break-all md:w-3/4 @sm/peekable:w-3/4 @md/modal:w-3/4 md:py-3 @sm/peekable:py-3 md/modal:py-3 lg:break-words @md/peekable:break-words @lg/modal:break-words">
            <DetailsTable :value="field.value || '[]'"/>
        </div>
    </div>
</template>

<script>
import DetailsTable from "./index/DetailsTable.vue";

export default {
    components: {DetailsTable},
  props: ['index', 'resource', 'resourceName', 'resourceId', 'field'],
}
</script>
