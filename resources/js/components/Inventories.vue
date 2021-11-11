<template>
<div>
    <h4> Filters </h4>
    <div class="input-group mb-3">
        <span class="input-group-text">SKU</span>
        <input type="text" v-model="sku" class="form-control" placeholder="SKU" aria-label="SKU">
        <span class="input-group-text">Product ID</span>
        <input type="text" v-model="product_id" class="form-control" placeholder="Product ID" aria-label="Product ID">
    </div>
    <button @click="getInventories" class="btn btn-primary mb-3">Search</button>
    <List :items="inventories" :is-loading="isLoading" />
    <div v-if="links" class="footer">
        <button class="btn btn-primary" :disabled="links.first === null" @click="getInventories(links.first)">First</button>
        <button class="btn btn-primary" :disabled="links.prev === null" @click="getInventories(links.prev)">Previous</button>
        <button class="btn btn-primary" :disabled="links.next === null" @click="getInventories(links.next)">Next</button>
        <button class="btn btn-primary" :disabled="links.last === null" @click="getInventories(links.last)">Last</button>
    </div>
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
      inventories: null,
      links: null,
      meta: null,
      isLoading: false,
      sku: "",
      product_id: ""
    };
  },
  mounted: function() {
    this.getInventories();
  },
  methods: {
    getInventories: function(url = null) {
      let filters = this.filters;
      if (url !== null && typeof url === "string") {
        filters["page"] = new URL(url).searchParams.get("page");
      }
      this.isLoading = true;
      axios
        .get("api/inventories", {
          params: this.filters
        })
        .then(({ data: { data, links, meta } }) => {
          this.inventories = data;
          this.links = links;
          this.meta = meta;
        })
        .finally(() => {
          this.isLoading = false;
        });
    }
  },
  computed: {
    filters: function() {
      let filters = {};
      if (this.sku) {
        filters["sku"] = this.sku;
      }
      if (this.product_id) {
        filters["product_id"] = this.product_id;
      }
      return filters;
    }
  }
};
</script>
