<template>
  <div>
    <div class="d-flex justify-content-between">
      <div class="nav-home">
        <nav class="bg-light my-3 d-flex">
          <button class="btn btn-outline-primary" @click="fetchPosts(pagination.current_page)">
            Ricarica
          </button>
        </nav>
      </div>

      <div class="my-3"><h1>Home</h1></div>



      <div class="my-3 nav-home">
          <input type="text" class="form-control" placeholder="Cerchi qualcosa?" v-model="searchText" @keydown.enter="onSearchSubmit"/>
      </div>
    </div>

    

    <div class="row row-cols-1 row-cols-md-2 g-4 my-2">
        <ThePostCard v-for="post of posts" :key="post.id" :post="post"></ThePostCard>
      </div>
        <nav aria-label="Page navigation example" class="">
          <ul class="pagination d-flex align-items-center justify-content-center my-3">
            <li class="page-item"> <a class="btn btn-outline-primary nav-home-down" @click="fetchPosts(pagination.current_page - 1)">Previous</a ></li>
            <li class="page-item nav-home-down"> {{ pagination.current_page }} su {{ pagination.last_page }}</li>
            <li class="page-item"><a class="btn btn-outline-primary nav-home-down" @click="fetchPosts(pagination.current_page + 1)">Next</a></li>
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
      pagination: {},
      user: {},
      searchText: "",
    };
  },
  methods: {
    async fetchPosts(page = 1, searchText = null) {
      if (page < 1) {
        page = 1;
      }

      if (page > this.pagination.last_page) {
        page = this.pagination.last_page;
      }

      try {
        const resp = await axios.get("/api/posts", {
          params: {
            page,
            filter: searchText,
          },
        });
        this.pagination = resp.data;
        this.posts = resp.data.data;

      } catch (er) {
        console.log(er);
      } finally {
        setTimeout(() => {
          this.loading = false;
        }, 1000);
      }
    },

    onSearchSubmit() {
      this.fetchPosts(1, this.searchText);
    },
  },
  mounted() {
    this.fetchPosts();
  },
}
</script>

<style>

</style>