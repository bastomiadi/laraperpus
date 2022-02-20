<template>
    <Head title="Confirm Peminjaman" />
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
                            Confirm
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <table class="table table-borderless">
                                <tr>
                                    <td>Kode Peminjaman</td>
                                    <td>
                                        <strong class="fs-6">{{
                                            mahasiswa.kode
                                        }}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>{{ mahasiswa.nama }}</td>
                                </tr>
                                <tr>
                                    <td>Buku</td>
                                    <td>
                                        <div
                                            v-for="bk in loan.books"
                                            :key="bk"
                                            class="text-wrap text-justify"
                                        >
                                            {{ bk.judul }}
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tanggal Pinjam</td>
                                    <td>{{ mahasiswa.tanggal_pinjam }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Kembali</td>
                                    <td>{{ mahasiswa.tanggal_kembali }}</td>
                                </tr>
                            </table>
                            <form
                                @submit.prevent="update"
                                autocomplete="off"
                                v-if="!loan.status"
                            >
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input
                                            class="form-check-input"
                                            type="radio"
                                            v-model="form.status"
                                            id="tidak"
                                            :value="0"
                                        />
                                        <label
                                            class="form-check-label"
                                            for="tidak"
                                        >
                                            Tidak
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input
                                            class="form-check-input"
                                            type="radio"
                                            v-model="form.status"
                                            id="ya"
                                            :value="1"
                                        />
                                        <label
                                            class="form-check-label"
                                            for="ya"
                                        >
                                            Ya
                                        </label>
                                    </div>
                                    <small
                                        class="text-danger"
                                        v-if="errors.tanggal_pengembalian"
                                        >{{
                                            errors.tanggal_pengembalian
                                        }}</small
                                    >
                                </div>
                                <hr />
                                <div class="mb-3">
                                    <button
                                        type="submit"
                                        class="btn btn-success btn-sm"
                                        :class="{
                                            'opacity-25': form.processing,
                                        }"
                                        :disabled="form.processing"
                                    >
                                        <vue-feather type="check"></vue-feather>
                                        Confirm
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
        loan: Object,
    },
    data() {
        return {
            mahasiswa: {
                nama: this.loan.user.name,
                kode: this.loan.kode_peminjaman,
                tanggal_pinjam: this.loan.tanggal_pinjam,
                tanggal_kembali: this.loan.tanggal_kembali,
                status: this.loan.status,
            },
            form: this.$inertia.form({
                status: "",
                _token: this.$page.props.csrf_token,
            }),
        };
    },
    methods: {
        update() {
            this.form.put(route("loan.update", this.loan.id), {
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
