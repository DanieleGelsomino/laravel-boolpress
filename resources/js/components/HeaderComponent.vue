<template>
  <div>
    <nav class="navbar navbar-expand-lg p-3">
      <ul class="navbar-nav">
        <li
          v-for="(menuItem, index) in menu"
          :key="index"
          class="nav-item mr-3"
        >
          <router-link :to="{ name: menuItem.linkName }" class="text-primary">{{
            menuItem.label
          }}</router-link>
        </li>
      </ul>
    </nav>
  </div>
</template>

<script>
export default {
  name: "HeaderComponent",
  data() {
    return {
      menu: [
        { linkName: "home", label: "Home" },
        { linkName: "blog", label: "I miei post" },
        { linkName: "contatti", label: "Contatti" },
        { linkName: "chi-siamo", label: "Chi siamo" },
      ],
    };
  },
};
</script>

<style>
</style>
