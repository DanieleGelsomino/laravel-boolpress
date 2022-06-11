<template>
  <div class="container">
    <div class="row flex-column">
      <div class="col-12 text-center mt-5 mb-3">
        <h3>I Miei Post</h3>
      </div>
      <div>
        <ul class="list-group">
          <li v-if="posts.length > 0" class="list-group-item">
            <PostCardComponent :posts="posts" />
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
