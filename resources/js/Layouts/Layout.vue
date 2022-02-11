<template>
    <div>
        <nav
            class="navbar navbar-expand-lg navbar-dark bg-primary navbar-home sticky-top"
        >
            <div class="container">
                <Link class="navbar-brand" :href="route('home')"
                    >Laraperpus</Link
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
                            <Link
                                class="nav-link"
                                aria-current="page"
                                :href="route('home')"
                                >Home</Link
                            >
                        </li>
                        <li class="nav-item">
                            <Link
                                class="nav-link"
                                :href="route('faq')"
                                :class="{
                                    'active-class':
                                        route().current('faq') === 'faq',
                                }"
                                >FAQ</Link
                            >
                        </li>
                    </ul>
                    <div class="px-3">
                        <Link
                            :href="route('login')"
                            class="btn bg-white bg-gradient border-0 shadow rounded-3"
                        >
                            <vue-feather type="log-in"></vue-feather>
                            Login</Link
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
import { Link } from "@inertiajs/inertia-vue3";
export default {
    components: {
        Link,
    },
};
</script>
