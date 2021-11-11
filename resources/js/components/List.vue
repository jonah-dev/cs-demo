<template>
    <div v-if="isLoading">
      Loading..
    </div>
    <table class="table table-striped" v-else-if="headers.length > 0">
        <thead>
            <th v-for="(header, index) in headers" :key="index" scope="col"> {{header}} </th>
        </thead>
        <tbody>
            <list-item v-for="(item,index) in items" :key="index" :item="item"/>
        </tbody>
    </table>
    <div v-else>
        No Items Given
    </div>
    
</template>

<script>
import ListItem from "./ListItem.vue";

export default {
  components: {
    ListItem
  },
  props: {
    items: {
      type: Array,
      default: []
    },
    isLoading: {
      type: Boolean,
      default: false
    }
  },
  computed: {
    headers: function() {
      if (this.items?.length) {
        return Object.keys(this.items[0]).map(header => header.toUpperCase());
      } else {
        return [];
      }
    }
  }
};
</script>
