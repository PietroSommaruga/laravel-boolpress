<template>
  <div>
      <TheNavbar></TheNavbar>
    <div class="container py-3">
        <router-view></router-view>
        
    </div>    
  </div>
</template>

<script>
import TheNavbar from "../components/TheNavbar.vue";


export default {
  components: { TheNavbar },
};
</script>

<style></style>