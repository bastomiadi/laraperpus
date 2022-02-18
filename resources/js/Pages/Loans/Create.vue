<template>
    <Head title="Create Peminjaman" />
    <Layoutadmin>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
            >
                <nav aria-label="breadcrumb" class="mt-4 h4">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <Link
                                :href="route('loan.index')"
                                class="text-decoration-none text-primary"
                                >Peminjaman</Link
                            >
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Create
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <form @submit.prevent="store" autocomplete="off">
                                <div class="mb-3">
                                    <label for="mahasiswa" class="form-label"
                                        >Mahasiswa</label
                                    >
                                    <select
                                        v-model="form.mahasiswa"
                                        id="mahasiswa"
                                        class="form-select"
                                    >
                                        <option
                                            v-for="student in students"
                                            :key="student.id"
                                            :value="student.id"
                                        >
                                            {{ student.name }}
                                        </option>
                                    </select>
                                    <small
                                        class="text-danger"
                                        v-if="errors.mahasiswa"
                                        >{{ errors.mahasiswa }}</small
                                    >
                                </div>
                                <div class="mb-3">
                                    <label for="book" class="form-label"
                                        >Books</label
                                    >
                                    <select
                                        v-model="form.book"
                                        id="book"
                                        class="form-select"
                                    >
                                        <option
                                            v-for="book in books"
                                            :key="book.id"
                                            :value="book.id"
                                        >
                                            {{ book.judul }}
                                        </option>
                                    </select>
                                    <small
                                        class="text-danger"
                                        v-if="errors.book"
                                        >{{ errors.book }}</small
                                    >
                                </div>
                                <div class="mb-3">
                                    <label
                                        for="tanggal_peminjaman"
                                        class="form-label"
                                        >Tanggal Peminjaman</label
                                    >
                                    <input
                                        type="date"
                                        v-model="form.tanggal_peminjaman"
                                        id="tanggal_peminjaman"
                                        class="form-control"
                                    />
                                    <small
                                        class="text-danger"
                                        v-if="errors.tanggal_peminjaman"
                                        >{{ errors.tanggal_peminjaman }}</small
                                    >
                                </div>
                                <div class="mb-3">
                                    <label
                                        for="tanggal_pengembalian"
                                        class="form-label"
                                        >Tanggal Pengembalian</label
                                    >
                                    <input
                                        type="date"
                                        v-model="form.tanggal_pengembalian"
                                        id="tanggal_pengembalian"
                                        class="form-control"
                                    />
                                    <small
                                        class="text-danger"
                                        v-if="errors.tanggal_pengembalian"
                                        >{{
                                            errors.tanggal_pengembalian
                                        }}</small
                                    >
                                </div>
                                <hr />
                                <div class="mb-3 d-flex justify-content-end">
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                        :class="{
                                            'opacity-25': form.processing,
                                        }"
                                        :disabled="form.processing"
                                    >
                                        Create Loan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </Layoutadmin>
</template>
<script>
import Layoutadmin from "@/Layouts/Layoutadmin.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
export default {
    props: {
        errors: Object,
        books: Array,
        students: Array,
    },
    data() {
        return {
            form: this.$inertia.form({
                book: "",
                mahasiswa: "",
                tanggal_peminjaman: "",
                tanggal_pengembalian: "",
                // stok: "",
            }),
        };
    },
    methods: {
        store() {
            this.form.post(route("loan.store"), {
                onSuccess: () => this.form.reset(),
            });
        },
    },
    components: {
        Layoutadmin,
        Head,
        Link,
    },
};
</script>
