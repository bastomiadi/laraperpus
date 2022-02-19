<template>
    <Head title="Catalog Book" />

    <Layoutadmin>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
            >
                <h1 class="h2">Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <button
                            type="button"
                            class="btn btn-sm btn-outline-secondary"
                        >
                            Share
                        </button>
                        <button
                            type="button"
                            class="btn btn-sm btn-outline-secondary"
                        >
                            Export
                        </button>
                    </div>
                    <button
                        type="button"
                        class="btn btn-sm btn-outline-secondary dropdown-toggle"
                    >
                        <span data-feather="calendar"></span>
                        This week
                    </button>
                </div>
            </div>

            <div class="mt-5 mb-4">
                <Link
                    :href="route('pinjam.create')"
                    class="btn btn-primary shadow border-0"
                >
                    <vue-feather type="navigation"></vue-feather> Ajukan
                    Peminjaman</Link
                >
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">Kategory</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Penerbit</th>
                            <th scope="col">Editor</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="book in books.data" :key="book.id">
                            <td>{{ book.category_book.nama }}</td>
                            <td>{{ book.judul }}</td>
                            <td>{{ book.penerbit }}</td>
                            <td>{{ book.editor }}</td>
                            <td>
                                <div
                                    class="badge bg-success"
                                    v-if="book.status"
                                >
                                    <vue-feather type="check"></vue-feather>
                                    Tersedia
                                </div>
                                <div
                                    class="badge bg-danger text-white"
                                    v-if="!book.status"
                                >
                                    <vue-feather type="x-circle"></vue-feather
                                    >Tidak Tersedia
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </Layoutadmin>
</template>
<script>
import Layoutadmin from "@/Layouts/Layoutadmin.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
export default {
    props: {
        books: Object,
    },
    components: {
        Layoutadmin,
        Head,
        Link,
    },
};
</script>
