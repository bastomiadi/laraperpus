<template>
    <Head title="Edit Book" />
    <Layoutadmin>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
            >
                <nav aria-label="breadcrumb" class="mt-4 h4">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <Link
                                :href="route('book.index')"
                                class="text-decoration-none text-primary"
                                >Book</Link
                            >
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Edit
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <form @submit.prevent="update" autocomplete="off">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label
                                                for="category"
                                                class="form-label"
                                                >Category</label
                                            >
                                            <select
                                                v-model="form.category"
                                                id="category"
                                                class="form-select"
                                            >
                                                <option
                                                    v-for="cat in categories"
                                                    :key="cat.id"
                                                    :value="cat.id"
                                                >
                                                    {{ cat.nama }}
                                                </option>
                                            </select>
                                            <small
                                                class="text-danger"
                                                v-if="errors.category"
                                                >{{ errors.category }}</small
                                            >
                                        </div>
                                        <div class="mb-3">
                                            <label
                                                for="judul"
                                                class="form-label"
                                                >Judul</label
                                            >
                                            <textarea
                                                v-model="form.judul"
                                                id="judul"
                                                class="form-control"
                                            ></textarea>
                                            <small
                                                class="text-danger"
                                                v-if="errors.judul"
                                                >{{ errors.judul }}</small
                                            >
                                        </div>
                                        <div class="mb-3">
                                            <label
                                                for="judul"
                                                class="form-label"
                                                >Penerbit</label
                                            >
                                            <input
                                                type="text"
                                                v-model="form.penerbit"
                                                id="penerbit"
                                                class="form-control"
                                            />
                                            <small
                                                class="text-danger"
                                                v-if="errors.penerbit"
                                                >{{ errors.penerbit }}</small
                                            >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label
                                                for="judul"
                                                class="form-label"
                                                >Penulis</label
                                            >
                                            <input
                                                type="text"
                                                v-model="form.penulis"
                                                id="penulis"
                                                class="form-control"
                                            />
                                            <small
                                                class="text-danger"
                                                v-if="errors.penulis"
                                                >{{ errors.penulis }}</small
                                            >
                                        </div>
                                        <div class="mb-3">
                                            <label
                                                for="tanggal_terbit"
                                                class="form-label"
                                                >Tahun Penerbit</label
                                            >
                                            <input
                                                type="date"
                                                v-model="form.tanggal_terbit"
                                                id="tanggal_terbit"
                                                class="form-control"
                                            />
                                            <small
                                                class="text-danger"
                                                v-if="errors.tanggal_terbit"
                                                >{{
                                                    errors.tanggal_terbit
                                                }}</small
                                            >
                                        </div>
                                        <div class="mb-3">
                                            <label for="stok" class="form-label"
                                                >Image</label
                                            >
                                            <input
                                                type="file"
                                                @input="
                                                    form.image =
                                                        $event.target.files[0]
                                                "
                                                class="form-image"
                                            />
                                            <small
                                                class="text-danger"
                                                v-if="errors.image"
                                                >{{ errors.image }}</small
                                            >
                                        </div>
                                    </div>
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
                                        Update Book
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
        book: Object,
        categories: Array,
    },
    data() {
        return {
            form: this.$inertia.form({
                _method: "put",
                category: this.book.category_id,
                judul: this.book.judul,
                penerbit: this.book.penerbit,
                penulis: this.book.editor,
                tanggal_terbit: this.book.tanggal_terbit,
                image: "",
                _token: this.$page.props.csrf_token,
            }),
        };
    },
    methods: {
        update() {
            this.form.post(route("book.update", this.book.id), {
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
