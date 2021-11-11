<template>
<div>
    <List :items="products" :is-loading="isLoading" />
</div>
</template>

<script>
import List from "./List.vue";
export default {
  components: {
    List
  },
  data: function() {
    return {
      products: null,
      links: null,
      meta: null,
      isLoading: false
    };
  },
  mounted: function() {
    this.getProducts();
  },
  methods: {
    getProducts: function() {
      this.isLoading = true;
      axios
        .get("/api/products")
        .then(({ data: { data, links, meta } }) => {
          this.products = data;
          this.links = links;
          this.meta = meta;
        })
        .finally(() => {
          this.isLoading = false;
        });
    }
  }
};
</script>
