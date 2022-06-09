<template>
  <div>
    <HeaderComponent />
    <router-view></router-view>
  </div>
</template>

<script>
import HeaderComponent from "../components/HeaderComponent";
export default {
  name: "AppComponent",
  components: {
    HeaderComponent,
  },
};
</script>

<style scoped lang="scss">
</style>
