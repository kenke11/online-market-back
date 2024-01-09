<template>
  <span>{{ fieldValue }}</span>
</template>

<script>
import DetailsTable from "./index/DetailsTable.vue";

export default {
    components: {DetailsTable},
  props: ['resourceName', 'field'],

  computed: {
    fieldValue() {
      return this.field.displayedAs || this.field.value
    },
  }
}
</script>
