<template>
<div class="container">
  <div class="row">
     <div class="col-8">
      <div class="card">
          <div class="card-body">
              <h2 class="card-title">{{ post.title }}</h2>
              <p class="card-text" v-html="post.content"></p>

              <em>{{ post.user.name }}; Creato il: {{ post.created_at }}</em>
          </div>
              <img :src=" post.image ?  post.image : 'https://www.logistec.com/wp-content/uploads/2017/12/placeholder.png' " alt="" class="show-img-vue">
      </div>
    </div>
  </div>
</div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      post: {},
    };
  },
  methods: {
    async fetchPost() {
      try {
        const resp = await axios.get("/api/posts/" + this.$route.params.post);

        this.post = resp.data;
      } catch (er) {
        this.$router.replace({name: "error"})
      }
    },
  },
  mounted() {
    console.log(this.$route.params.post);
    this.fetchPost();
  },
};
</script>

<style></style>
