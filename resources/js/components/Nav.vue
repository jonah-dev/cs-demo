<template>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">CommentSold</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav me-auto mb-2 mb-lg-0">
                <a 
                  @click="onNavChange('products')" 
                  v-bind:class="[{ active: view === 'products' }, 'nav-link']"
                  aria-current="page">Your Products
                </a>
                <a 
                  @click="onNavChange('inventories')" 
                  v-bind:class="[{ active: view === 'inventories' }, 'nav-link']">
                  Your Inventories
                </a>
            </div>
            <span class="navbar-text logged-in-as">
              Logged in as {{user}}
            </span>
            <button @click="logout" class="btn btn-danger">Logout</button>
        </div>
    </div>
</nav>
</template>

<script>
export default {
  props: {
    onNavChange: Function,
    user: String,
    logout: Function,
    view: String
  }
};
</script>

<style>
.logged-in-as {
  margin-right: 20px;
}
</style>
