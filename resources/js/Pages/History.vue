<template>
    <Head title="Riwayat Peminjaman" />

    <Layoutadmin>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
            >
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

            <h2>Section title</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">Judul Buku</th>
                            <th scope="col">Penulis</th>
                            <th scope="col">Tanggal Peminjaman</th>
                            <th scope="col">Tanggal Kembali</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="loan in loans.data" :key="loan.id">
                            <td>{{ loan.book.judul }}</td>
                            <td>{{ loan.book.editor }}</td>
                            <td>{{ loan.tanggal_pinjam }}</td>
                            <td>{{ loan.tanggal_kembali }}</td>
                            <td>
                                <span
                                    class="badge bg-success"
                                    v-if="loan.status"
                                    >Berhasil</span
                                >
                            </td>
                        </tr>
                    </tbody>
                </table>
                <Pagination class="mt-6" :links="loans.links" />
            </div>
        </main>
    </Layoutadmin>
</template>
<script>
import Layoutadmin from "@/Layouts/Layoutadmin.vue";
import { Head } from "@inertiajs/inertia-vue3";
import Pagination from "@/Components/Pagination.vue";
export default {
    props: {
        loans: Object,
    },
    components: {
        Layoutadmin,
        Head,
        Pagination,
    },
};
</script>
