<template>
    <Head title="Peminjaman" />

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
            <div class="row">
                <div class="col-md-8">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <form @submit.prevent="store">
                                <div class="mb-3">
                                    <VueSelect
                                        label="judul"
                                        v-model="form.book"
                                        :reduce="(label) => label.id"
                                        multiple
                                        :options="books"
                                        :placehoder="'-Selected-'"
                                    ></VueSelect>
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
                                        for="tanggal_kembali"
                                        class="form-label"
                                        >Tanggal Kembali</label
                                    >
                                    <input
                                        type="date"
                                        v-model="form.tanggal_kembali"
                                        id="tanggal_kembali"
                                        class="form-control"
                                    />
                                    <small
                                        class="text-danger"
                                        v-if="errors.tanggal_kembali"
                                        >{{ errors.tanggal_kembali }}</small
                                    >
                                </div>
                                <div class="mb-3">
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >
                                        Pinjam
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
import { Head } from "@inertiajs/inertia-vue3";
import VueSelect from "vue-select";
export default {
    props: {
        errors: Object,
        books: Object,
        rebook: Object,
    },
    data() {
        return {
            form: this.$inertia.form({
                book: "",
                tanggal_peminjaman: "",
                tanggal_kembali: "",
            }),
        };
    },
    components: {
        Layoutadmin,
        Head,
        VueSelect,
    },
    methods: {
        store() {
            this.form.post(route("pinjam.store"), {
                onSuccess: () => this.form.reset(),
            });
        },
    },
};
</script>
