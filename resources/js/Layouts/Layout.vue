<template>
    <div>
        <nav
            class="navbar navbar-expand-lg navbar-dark bg-primary navbar-home sticky-top"
        >
            <div class="container">
                <NavLink class="navbar-brand" :href="route('home')"
                    >Laraperpus</NavLink
                >
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarNav"
                    aria-controls="navbarNav"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <NavLink
                                aria-current="page"
                                :href="route('home')"
                                :active="route().current('home')"
                                >Home</NavLink
                            >
                        </li>
                        <li class="nav-item">
                            <NavLink
                                :href="route('catalog.book')"
                                :active="route().current('catalog.book')"
                                >Catalog Book</NavLink
                            >
                        </li>
                        <li class="nav-item">
                            <NavLink
                                :href="route('faq')"
                                :active="route().current('faq')"
                                >FAQ</NavLink
                            >
                        </li>
                        <li class="nav-item">
                            <NavLink
                                :href="route('dashboard')"
                                :active="route().current('dashboard')"
                                v-if="$page.props.auth.user"
                                >Dashboard</NavLink
                            >
                        </li>
                    </ul>
                    <div class="px-3">
                        <LinkBtn
                            :href="route('login')"
                            v-if="!$page.props.auth.user"
                        >
                            <vue-feather type="log-in"></vue-feather>
                            Login</LinkBtn
                        >
                    </div>
                </div>
            </div>
        </nav>
        <slot />
        <footer class="footer">
            <div class="h6 px-3 text-white">
                Malang &copy; 2021 - Chau Batkunda
            </div>
        </footer>
    </div>
</template>
<script>
import NavLink from "@/Components/NavLink.vue";
import LinkBtn from "@/Components/LinkBtn.vue";
export default {
    components: {
        NavLink,
        LinkBtn,
    },
};
</script>
