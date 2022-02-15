<template>
    <Head title="Category Book" />

    <Layoutadmin>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
            >
                <h1 class="h2">Category Book</h1>
            </div>
            <div class="mb-2 d-flex justify-content-between">
                <div>
                    <form>
                        <div class="input-group mb-3">
                            <span
                                class="input-group-text"
                                id="inputGroup-sizing-default"
                            >
                                <vue-feather type="search"></vue-feather>
                            </span>
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Search"
                                v-model="search"
                                @keyup="searchCategory"
                                autofocus
                            />
                        </div>
                    </form>
                </div>
                <div>
                    <Link
                        :href="route('category.create')"
                        class="btn btn-primary"
                        ><vue-feather type="plus-circle"></vue-feather>
                        Create</Link
                    >
                </div>
            </div>
            <flash-message />
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Slug</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="category in categori_books.data"
                                    :key="category.id"
                                >
                                    <td>
                                        <Link
                                            class="text-decoration-none d-flex align-items-center"
                                            :href="
                                                route(
                                                    'category.edit',
                                                    category.id
                                                )
                                            "
                                        >
                                            {{ category.nama }}
                                        </Link>
                                    </td>
                                    <td>
                                        <Link
                                            :href="
                                                route(
                                                    'category.edit',
                                                    category.id
                                                )
                                            "
                                            class="text-decoration-none d-flex align-items-center"
                                        >
                                            {{ category.slug }}
                                        </Link>
                                    </td>
                                    <td>
                                        <Link
                                            :href="
                                                route(
                                                    'category.edit',
                                                    category.id
                                                )
                                            "
                                            class="text-decoration-none d-flex align-items-center"
                                        >
                                            {{ category.keterangan }}
                                            <div class="float-end">
                                                <vue-feather
                                                    type="chevron-right"
                                                ></vue-feather>
                                            </div>
                                        </Link>
                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        colspan="3"
                                        v-if="categori_books.length === 0"
                                    >
                                        <div
                                            class="alert alert-danger border-0"
                                            role="alert"
                                        >
                                            Tidak ada data
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <Pagination
                            class="mt-6"
                            :links="categori_books.links"
                        />
                    </div>
                </div>
            </div>
        </main>
    </Layoutadmin>
</template>
<script>
import Layoutadmin from "@/Layouts/Layoutadmin.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import FlashMessage from "@/Components/FlashMessage.vue";
import Pagination from "@/Components/Pagination.vue";
export default {
    data() {
        return {
            search: "",
        };
    },
    props: {
        categori_books: Object,
    },
    methods: {
        searchCategory() {
            this.$inertia.replace(
                route("category.index", { search: this.search })
            );
            console.log(this.search);
        },
    },
    components: {
        Layoutadmin,
        Head,
        Link,
        FlashMessage,
        Pagination,
    },
};
</script>
