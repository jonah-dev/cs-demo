<template>
    <tr v-if="item">
        <td v-for="(val, index) in values" :key="index"> {{ val }}</td>
    </tr>
    <tr v-else></tr>
</template>

<script>
export default {
  props: {
    item: {
      type: Object,
      default: {}
    }
  },
  computed: {
    values: function() {
      return Object.values(this.item).map(value => {
        // TODO: Handle array values better
        return Array.isArray(value) ? value.join(",") : value;
      });
    }
  }
};
</script>
