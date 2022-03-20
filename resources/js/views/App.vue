<template>
    <div>
        <TheNavbar></TheNavbar>
        <!-- <ThePostCard v-for="post of posts" :key="post.id" :post="post"></ThePostCard> -->
        <div class="row row-cols-1 row-cols-md-2 g-4">
          <ThePostCard v-for="post of posts" :key="post.id" :post="post"></ThePostCard>
        </div>
        
    </div>
</template>

<script>
import TheNavbar from "../components/TheNavbar.vue";
import ThePostCard from "../components/ThePostCard.vue";
import axios from "axios";

export default {
  components: { TheNavbar, ThePostCard},
  data() {
    return {
      posts: []

    };
  },
  methods: {
    async fetchPosts() {
      const resp = await axios.get("/api/posts")
      this.posts = resp.data;
    }
  },
  mounted() {
    this.fetchPosts();
  },
};
</script>

<style></style>