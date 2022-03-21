<template>
  <div>
    <h1>Home</h1>
    <div class="row row-cols-1 row-cols-md-2 g-4">
          <ThePostCard v-for="post of posts" :key="post.id" :post="post"></ThePostCard>
        </div>
        <nav aria-label="Page navigation example">
          <ul class="pagination d-flex align-items-center">
            <li class="page-item"> <a class="page-link" @click="fetchPosts(pagination.current_page - 1)">Previous</a ></li>
            <li class="page-item px-3"> {{ pagination.current_page }} su {{ pagination.last_page }}</li>
            <li class="page-item"><a class="page-link" @click="fetchPosts(pagination.current_page + 1)">Next</a></li>
          </ul>
        </nav>
  </div>
</template>

<script>
import ThePostCard from "../components/ThePostCard.vue";
import axios from "axios";

export default {
  components: { ThePostCard },

   data() {
    return {
      posts: [],
      pagination: {}

    };
  },
  methods: {
    async fetchPosts(page = 1) {
      if (page < 1) {
        page = 1;
      }

      if (page > this.pagination.last_page) {
        page = this.pagination.last_page;
      }

      const resp = await axios.get("/api/posts?page=" + page)
      this.pagination = resp.data
      this.posts = resp.data.data;
    }
  },
  mounted() {
    this.fetchPosts();
  },
}
</script>

<style>

</style>