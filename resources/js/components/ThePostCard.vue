<template>
  <div>
    <div class="col">
      <div class="card">
          <div class="card-body">
              <h5 class="card-title">{{ post.title }}</h5>
              <p class="card-text" v-html="post.content"></p>

              <em>{{ post.user.name }}; Creato il: {{ post.created_at }}</em>
              <img :src=" post.image ?  post.image : 'https://www.logistec.com/wp-content/uploads/2017/12/placeholder.png' " alt="" class="index-img">
          </div>
          <router-link :to="{ name:'posts.show', params: { post: post.slug } }" class="m-2">Dettagli<i class="fas fa-chevron-right ms-2"></i></router-link>
      </div>
    </div>

  </div>
</template>

<script>
export default {
  props: {
    post: Object,
  },
  methods: {
    
  },
};
</script>
