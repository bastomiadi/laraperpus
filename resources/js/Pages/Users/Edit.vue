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
                                :href="route('user.index')"
                                class="text-decoration-none text-primary"
                                >Account</Link
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
                                    <td>NIM</td>
                                    <td>
                                        <strong class="fs-6">{{
                                            mahasiswa.nim
                                        }}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>{{ mahasiswa.nama }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ mahasiswa.email }}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>
                                        <div
                                            class="text-success"
                                            v-if="mahasiswa.status"
                                        >
                                            Success
                                        </div>
                                        <small class="text-warning" v-else>
                                            Ditanggukan
                                        </small>
                                    </td>
                                </tr>
                            </table>
                            <form @submit.prevent="update" autocomplete="off">
                                <div class="mb-3">
                                    <div class="d-flex">
                                        <div class="me-3">
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
                                        <div>
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
        students: Array,
        user: Object,
    },
    data() {
        return {
            mahasiswa: {
                nim: this.user.nim,
                nama: this.user.name,
                email: this.user.email,
                status: this.user.status,
            },
            form: this.$inertia.form({
                status: this.user.status,
                _token: this.$page.props.csrf_token,
            }),
        };
    },
    methods: {
        update() {
            this.form.put(route("user.update", this.user.id), {
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
