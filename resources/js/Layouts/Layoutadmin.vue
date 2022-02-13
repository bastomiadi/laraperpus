<script setup>
import BreezeResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import NavLink from "@/Components/NavLink.vue";
</script>
<template>
    <div>
        <header
            class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow-sm"
        >
            <NavLink
                class="navbar-brand col-md-3 col-lg-2 me-0 px-3"
                :href="route('home')"
                >Laraperpus</NavLink
            >
            <button
                class="navbar-toggler position-absolute d-md-none collapsed"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#sidebarMenu"
                aria-controls="sidebarMenu"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
        </header>
        <div class="container-fluid">
            <div class="row">
                <nav
                    id="sidebarMenu"
                    class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse"
                >
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a
                                    class="nav-link active"
                                    aria-current="page"
                                    href="#"
                                >
                                    <vue-feather type="home"></vue-feather>
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <vue-feather type="book"></vue-feather>
                                    Category Books
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <vue-feather type="book"></vue-feather>
                                    Books
                                </a>
                            </li>
                        </ul>

                        <h6
                            class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted"
                        >
                            <span>Saved reports</span>
                            <a
                                class="link-secondary"
                                href="#"
                                aria-label="Add a new report"
                            >
                                <span data-feather="plus-circle"></span>
                            </a>
                        </h6>
                        <ul class="nav flex-column mb-2">
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span data-feather="file-text"></span>
                                    Current month
                                </a>
                            </li>
                            <li class="nav-item">
                                <BreezeResponsiveNavLink
                                    class="nav-link"
                                    :href="route('logout')"
                                    method="post"
                                    as="button"
                                >
                                    <vue-feather type="log-out"></vue-feather>
                                    Logout
                                </BreezeResponsiveNavLink>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</template>
