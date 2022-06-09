<template>
  <div class="container">
    <div class="row text-center">
      <div class="col-12 mt-5">
        <h3>404 | Not Found</h3>
        <p>
          <router-link :to="{ name: 'home' }">back to home</router-link>
        </p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "NotFoundComponent",
};
</script>

<style>
</style>
