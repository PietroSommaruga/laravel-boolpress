<template>
<div class="container">
  <div class="row">
     <div class="col-8">
      <div class="card">
          <div class="card-body">
              <button class="btn btn-danger" @click="deletePost">Elimina</button>
              <h2 class="card-title">{{ post.title }}</h2>
              <p class="card-text" v-html="post.content"></p>
              <span v-if="post.category" class="badge bg-dark me-2">{{ post.category.code }}</span>
              <span  v-for="tag in post.tags" :key="tag.id" class="badge bg-primary me-2">{{ tag.name }}</span>

              <div v-if="post">
                <div v-if="post.user">{{ post.user.name }}; Creato il: {{ post.created_at }}</div>
              </div>
              
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

  computed: {
    createdAt() {
      return dayjs(this.post.created_at).format("DD/MM/YY HH:mm");
    },
    updatedAt() {
      return dayjs(this.post.updated_at).format("DD/MM/YY HH:mm");
    },
  },

  methods: {
    async fetchPost() {
      try {
        const resp = await axios.get("/api/posts/" + this.$route.params.post);

        this.post = resp.data;
      } catch (er) {
        this.$router.replace({ name: "error" });
      }
    },
    async deletePost() {
      try {
        await axios.delete("api/posts/" + this.$route.params.post);

        this.$router.replace({ name: "posts.index" });
      } catch (er) {
        console.log(er);
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
