<template>
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
                            <NavLink
                                aria-current="page"
                                :href="route('dashboard')"
                                :active="route().current('dashboard')"
                            >
                                <vue-feather type="home"></vue-feather>
                                Dashboard
                            </NavLink>
                        </li>
                        <li
                            class="nav-item"
                            v-if="$page.props.is_admin.role == 'ADMIN'"
                        >
                            <NavLink
                                :href="route('category.index')"
                                :active="route().current('category*')"
                            >
                                <vue-feather type="book"></vue-feather>
                                Category Book
                            </NavLink>
                        </li>
                        <li
                            class="nav-item"
                            v-if="$page.props.is_admin.role == 'ADMIN'"
                        >
                            <NavLink
                                :href="route('book.index')"
                                :active="route().current('book*')"
                            >
                                <vue-feather type="book"></vue-feather>
                                Books
                            </NavLink>
                        </li>
                        <li
                            class="nav-item"
                            v-if="$page.props.is_admin.role == 'ADMIN'"
                        >
                            <NavLink
                                :href="route('loan.index')"
                                :active="route().current('loan*')"
                            >
                                <vue-feather type="file-text"></vue-feather>
                                Peminjaman
                            </NavLink>
                        </li>
                        <li
                            class="nav-item"
                            v-if="$page.props.is_admin.role == 'ADMIN'"
                        >
                            <NavLink
                                :href="route('user.index')"
                                :active="route().current('user*')"
                            >
                                <vue-feather type="users"></vue-feather>
                                Account Mahasiswa
                            </NavLink>
                        </li>
                        <li
                            class="nav-item"
                            v-if="$page.props.is_admin.role == 'Mahasiswa'"
                        >
                            <NavLink
                                :href="route('book')"
                                :active="route().current('book*')"
                            >
                                <vue-feather type="file-text"></vue-feather>
                                Catalog Book
                            </NavLink>
                        </li>
                        <li
                            class="nav-item"
                            v-if="$page.props.is_admin.role == 'Mahasiswa'"
                        >
                            <NavLink
                                :href="route('history')"
                                :active="route().current('history*')"
                            >
                                <vue-feather type="file-text"></vue-feather>
                                Riwayat Peminjaman
                            </NavLink>
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
                    <hr />
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <BreezeDropdownLink
                                :href="route('logout')"
                                method="post"
                                as="button"
                            >
                                <vue-feather type="log-out"></vue-feather>
                                Logout
                            </BreezeDropdownLink>
                        </li>
                    </ul>
                </div>
            </nav>
            <slot />
        </div>
    </div>
</template>
<script>
import BreezeDropdownLink from "@/Components/DropdownLink.vue";
import NavLink from "@/Components/NavLink.vue";

export default {
    components: {
        BreezeDropdownLink,
        NavLink,
    },
    props: {
        auth: Object,
    },
};
</script>
