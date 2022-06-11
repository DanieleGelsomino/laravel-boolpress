<template>
  <div>
    <div v-for="post in posts" :key="post.id">
      <h3 class="pt-2">{{ post.title }}</h3>
      <p>{{ post.content }}</p>
      <router-link :to="{ name: 'single-post', params: { slug: post.slug } }">
        Visualizza dettagli
      </router-link>
    </div>
  </div>
</template>

<script>
export default {
  name: "PostCardComponent",
  props: {
    posts: Array,
  },
};
</script>

<style>
</style>
