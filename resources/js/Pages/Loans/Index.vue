<template>
    <Head title="Peminjaman" />
    <Layoutadmin>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
            >
                <h1 class="h2">Peminjaman</h1>
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
                    <Link :href="route('loan.create')" class="btn btn-primary"
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
                                    <th>Mahasiswa</th>
                                    <th>Buku</th>
                                    <th>Kode Peminjaman</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="loan in loans.data" :key="loan.id">
                                    <td>
                                        {{ loan.user.name }}
                                    </td>
                                    <td>
                                        <div v-for="bk in loan.books" :key="bk">
                                            {{ bk.judul }}
                                        </div>
                                    </td>
                                    <td>
                                        {{ loan.kode_peminjaman }}
                                    </td>
                                    <td>
                                        {{ loan.tanggal_pinjam }}
                                    </td>
                                    <td>
                                        {{ loan.tanggal_kembali }}
                                    </td>
                                    <td>
                                        <Link
                                            :href="route('loan.edit', loan.id)"
                                            class="text-decoration-none d-flex align-items-center"
                                        >
                                            <span
                                                class="badge bg-success"
                                                v-if="loan.status"
                                                >Success</span
                                            >
                                            <span
                                                class="badge bg-warning"
                                                v-else
                                                >Pending</span
                                            >
                                            <div class="float-end">
                                                <vue-feather
                                                    type="chevron-right"
                                                ></vue-feather>
                                            </div>
                                        </Link>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" v-if="loans.length === 0">
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
                        <Pagination class="mt-6" :links="loans.links" />
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
        loans: Object,
    },
    methods: {
        searchBook() {
            this.$inertia.replace(route("loan.index", { search: this.search }));
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
