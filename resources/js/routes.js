import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import HomeComponent from "./pages/HomeComponent";
import BlogComponent from "./pages/BlogComponent";
import ContactsComponent from "./pages/ContactsComponent";
import WhoWeAreComponent from "./pages/WhoWeAreComponent";
import NotFoundComponent from "./pages/NotFoundComponent";
import SinglePostComponent from "./pages/SinglePostComponent";
import CategoriesComponent from "./pages/CategoriesComponent";
const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: HomeComponent,
        },
        {
            path: "/blog",
            name: "blog",
            component: BlogComponent,
        },
        {
            path: "/blog/:slug",
            name: "single-post",
            component: SinglePostComponent,
        },
        {
            path: "/categorie",
            name: "categorie",
            component: CategoriesComponent,
        },
        {
            path: "/contatti",
            name: "contatti",
            component: ContactsComponent,
        },
        {
            path: "/chi-siamo",
            name: "chi-siamo",
            component: WhoWeAreComponent,
        },
        {
            path: "/*",
            name: "not-found",
            component: NotFoundComponent,
        },
    ],
});

export default router;
