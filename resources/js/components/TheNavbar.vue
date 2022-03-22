<template>
<div>
  <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm py-3">
    <div class="container">
      <a class="navbar-brand" href="/">Laravel Boolpress</a>

      <div class=" collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent ">

            
        <ul class="navbar-nav ml-auto ">
          <li class="nav-item" v-for="route in routes" :key="route.path">
            <router-link class="nav-link" :to="route.path" >
              {{ route.meta.linkText }}
            </router-link>
          </li>
          
        
          <li class="nav-item">
              <a class="nav-link" href="/login" v-if="!user"> Login </a>
              <a class="nav-link" href="/admin" v-else> {{ user.name }} </a>
          </li>
        </ul>

      </div>
      
    </div>
  </nav>
  
</div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      routes: [],
      user: null,
    }
  },
  methods: {
    fetchUser() {
      // recuperiamo l'utente loggato tramite api
      axios
      .get("/api/user")
        .then((resp) => {
          this.user = resp.data;
          
          localStorage.setItem("user", JSON.stringify(resp.data));

          // Per comunicare in tempo reale che l'utente loggato è cambiato,
          // lanciamo un evento custom su window
          window.dispatchEvent(new CustomEvent("storedUserChanged"));
        })

        .catch((er) => {
          console.error("Utente non loggato");

          localStorage.removeItem("user");

          // Per comunicare in tempo reale che l'utente loggato è cambiato,
          // lanciamo un evento custom su window
          window.dispatchEvent(new CustomEvent("storedUserChanged"));
        });
    },
  },
  mounted() {
    this.routes = this.$router.getRoutes().filter((route) => !!route.meta.linkText);  // !! = doppia negazione

    this.fetchUser();

  }
};
</script>

<style></style>