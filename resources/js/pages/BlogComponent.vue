<template>
  <div class="container">
    <div class="row flex-column">
      <div class="col-12 text-center mt-5 mb-3">
        <h3>My Posts</h3>
      </div>
      <div v-for="(post, index) in posts" :key="index">
        <ul class="list-group">
          <li v-if="posts.length > 0" class="list-group-item">
            <PostCardComponent :post="post" />
          </li>
          <div v-else>Caricamento in corso...</div>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
import PostCardComponent from "../components/PostCardComponent";
export default {
  name: "BlogComponent",
  components: {
    PostCardComponent,
  },
  data() {
    return {
      posts: [],
    };
  },
  mounted() {
    window.axios = require("axios");
    window.axios
      .get("http://127.0.0.1:8000/api/posts")
      .then(({ status, data }) => {
        console.log(data);
        if (status === 200 && data.success) {
          this.posts = data.result;
        }
      })
      .catch((e) => {
        console.log(e);
      });
  },
};
</script>

<style>
</style>
