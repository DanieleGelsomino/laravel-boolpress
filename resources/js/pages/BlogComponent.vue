<template>
  <div class="container">
    <div class="row flex-column">
      <div class="col-12 text-center mt-5 mb-3">
        <h3>I Miei Post</h3>
      </div>
      <div>
        <ul class="list-group">
          <div v-if="posts.length > 0">
            <li class="list-group-item">
              <PostCardComponent :posts="posts" />
            </li>
          </div>
          <div v-else>Caricamento in corso...</div>
        </ul>
      </div>
      <div class="mt-5">
        <button
          v-if="prevPageLink"
          @click="goPrevPage()"
          class="btn btn-light mr-2"
        >
          Prev
        </button>
        <span>{{ currentPage }}/{{ lastPage }}</span>
        <button
          v-if="nextPageLink"
          @click="goNextPage()"
          class="btn btn-light ml-2"
        >
          Next
        </button>
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
      currentPage: 1,
      prevPageLink: "",
      nextPageLink: "",
      lastPage: "",
    };
  },
  mounted() {
    this.loadPage("http://127.0.0.1:8000/api/posts");
  },
  methods: {
    loadPage(url) {
      window.axios
        .get(url)
        .then(({ status, data }) => {
          //   console.log(data.results);
          if (status === 200 && data.success) {
            this.posts = data.results.data;
            this.currentPage = data.results.current_page;
            this.prevPageLink = data.results.prev_page_url;
            this.nextPageLink = data.results.next_page_url;
            this.lastPage = data.results.last_page;
          }
        })
        .catch((e) => {
          console.log(e);
        });
    },
    goPrevPage() {
      this.loadPage(this.prevPageLink);
    },
    goNextPage() {
      this.loadPage(this.nextPageLink);
    },
  },
};
</script>

<style lang="scss" scoped>
li {
  padding: 50px;
}
button {
  font-size: 0.7rem;
}
span {
  font-size: 0.7rem;
  margin: 0 5px;
}
</style>
