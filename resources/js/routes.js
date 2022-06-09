import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import HomeComponent from "./pages/HomeComponent";
import BlogComponent from "./pages/BlogComponent";
import ContactsComponent from "./pages/ContactsComponent";
import WhoWeAreComponent from "./pages/WhoWeAreComponent";
import NotFoundComponent from "./pages/NotFoundComponent";
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
            path: "/contacts",
            name: "contacts",
            component: ContactsComponent,
        },
        {
            path: "/who-we-are",
            name: "who-we-are",
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
