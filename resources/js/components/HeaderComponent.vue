<template>
  <div>
    <nav class="navbar navbar-expand-lg bg-dark">
      <ul class="navbar-nav">
        <li
          v-for="(menuItem, index) in menu"
          :key="index"
          class="nav-item mr-3"
        >
          <router-link :to="{ name: menuItem.linkName }">{{
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
        { linkName: "blog", label: "My Posts" },
        { linkName: "contacts", label: "Contacts" },
        { linkName: "who-we-are", label: "Who we are" },
      ],
    };
  },
};
</script>

<style>
</style>
