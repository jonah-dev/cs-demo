<template>
<div v-if="loadingAuth">
  Loading...
</div>
<div v-else-if="user">
    <Dashboard :user="user" :logout="logout"/>
</div>
<div v-else>
    <div class="card">
        <div class="p-5 card-body">
            <h5 class="card-title">Comment Sold Login</h5>
            <p class="card-text">Login with your Comment Sold Credentials</p>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Email</span>
                <input v-model="email" type="text" class="form-control" placeholder="" aria-label="Email" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">Password</span>
                <input v-model="password" type="text" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon2">
            </div>
            <button v-on:click="login" type="button" class="btn btn-primary">Login</button>
        </div>
    </div>
</div>
</template>

<script>
import Dashboard from "./Dashboard.vue";

export default {
  components: {
    Dashboard
  },
  data: function() {
    return {
      user: null,
      email: "larhonda.hovis@foo.com",
      password: "cghmpbKXXK",
      loadingAuth: false
    };
  },
  mounted: function() {
    this.getAuth();
  },
  methods: {
    login: function() {
      axios.get("/sanctum/csrf-cookie").then(response => {
        const creds = {
          email: this.email,
          password: this.password
        };
        axios.post("/login", creds).then(({ data: user }) => {
          this.user = user;
        });
      });
    },
    logout: function() {
      axios.get("/logout").then(response => {
        this.user = null;
      });
    },
    getAuth: function() {
      this.loadingAuth = true;
      axios
        .get("api/user")
        .then(({ data: user }) => {
          this.user = user;
        })
        .catch(response => {
          this.user = null;
        })
        .finally(() => {
          this.loadingAuth = false;
        });
    }
  }
};
</script>
