<template>
    <Head title="Book" />
    <Layoutadmin>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
            >
                <h1 class="h2">Books</h1>
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
                                @keyup="searchBook"
                                autofocus
                            />
                        </div>
                    </form>
                </div>
                <div>
                    <Link :href="route('book.create')" class="btn btn-primary"
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
                                    <th>Kategori</th>
                                    <th>Judul</th>
                                    <th>Penerbit</th>
                                    <th>Editor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="book in books.data" :key="book.id">
                                    <td>
                                        <Link
                                            class="text-decoration-none d-flex align-items-center"
                                            :href="route('book.edit', book.id)"
                                        >
                                            {{ book.category_book.nama }}
                                        </Link>
                                    </td>
                                    <td>
                                        <Link
                                            class="text-decoration-none d-flex align-items-center"
                                            :href="route('book.edit', book.id)"
                                        >
                                            {{ book.judul }}
                                        </Link>
                                    </td>
                                    <td>
                                        <Link
                                            :href="route('book.edit', book.id)"
                                            class="text-decoration-none d-flex align-items-center"
                                        >
                                            {{ book.penerbit }}
                                        </Link>
                                    </td>
                                    <td>
                                        <Link
                                            :href="route('book.edit', book.id)"
                                            class="text-decoration-none d-flex align-items-center"
                                        >
                                            {{ book.editor }}
                                            <div class="float-end">
                                                <vue-feather
                                                    type="chevron-right"
                                                ></vue-feather>
                                            </div>
                                        </Link>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" v-if="books.length === 0">
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
                        <Pagination class="mt-6" :links="books.links" />
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
        books: Object,
    },
    methods: {
        searchBook() {
            this.$inertia.replace(route("book.index", { search: this.search }));
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
