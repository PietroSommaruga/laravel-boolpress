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
          
        
          <li class="nav-item"><a class="nav-link" href="/login"> Admin </a></li>
        </ul>

      </div>
      
    </div>
  </nav>
  
</div>
</template>

<script>
export default {
  data() {
    return {
      routes: []
    }
  },
  mounted() {
    this.routes = this.$router.getRoutes().filter((route) => !!route.meta.linkText);  // !! = doppia negazione
  }
};
</script>

<style></style>