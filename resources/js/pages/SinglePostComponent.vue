<template>
  <div class="container">
    <div class="row flex-comlumn align-items-center justify-content-center">
      <div v-if="post">
        <div class="col-12 pt-5">
          <h2 class="text-center mb-5">{{ post.title }}</h2>
          <img
            class="detail-img"
            :src="'/storage/' + post.cover"
            :alt="post.title"
          />
          <h5 class="pt-3">Contenuto:</h5>
          <p>{{ post.content }}</p>
          <h5 class="pt-3">Categoria:</h5>
          <p>{{ post.category.name }}</p>
          <h5>Tags:</h5>
          <ul class="list-style-dg d-flex pl-0">
            <li v-for="tag in post.tags" :key="tag.id" class="mr-2">
              {{ tag.name }}
            </li>
          </ul>
          <div>
            <router-link :to="{ name: 'blog' }">Tutti i post</router-link>
          </div>
        </div>
      </div>
      <div v-else>Caricamento in corso...</div>
    </div>
  </div>
</template>

<script>
export default {
  name: "SinglePostComponent",
  data() {
    return {
      post: undefined,
    };
  },
  mounted() {
    const slug = this.$route.params.slug;
    window.axios
      .get("http://127.0.0.1:8000/api/posts/" + slug)
      .then((results) => {
        if (results.status === 200 && results.data.success) {
          this.post = results.data.results;
        }
        // console.log(this.post);
      })
      .catch((e) => {
        console.log(e);
      });
  },
};
</script>

<style lang="scss" scoped>
h5 {
  font-size: 1rem;
}
.detail-img {
  width: 100%;
}

.list-style-dg {
  list-style-type: none;
}
</style>
