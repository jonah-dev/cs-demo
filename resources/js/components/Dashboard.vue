<template>
<div>
    <Nav :on-nav-change="onNavChange" :user="user.name" :logout="logout" :view="view" />
    <div v-if="view === 'products'">
        <div class="m-5 p-3 card">
          <Products/> 
         </div>
    </div>
    <div v-else-if="view === 'inventories'">
        <div class="m-5 p-3 card">
          <Inventories/> 
         </div>
    </div>
</div>
</template>

<script>
import Nav from "./Nav.vue";
import Products from "./Products.vue";
import Inventories from "./Inventories.vue";
export default {
  components: {
    Nav,
    Products,
    Inventories
  },
  props: {
    user: Object,
    logout: Function
  },
  data: function() {
    return {
      view: "inventories"
    };
  },
  methods: {
    onNavChange: function(nextView) {
      this.view = nextView;
    }
  }
};
</script>
