<template>
    <Head title="Edit Category" />

    <Layoutadmin>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
            >
                <nav aria-label="breadcrumb" class="mt-4 h4">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <Link
                                :href="route('category.index')"
                                class="text-decoration-none text-primary"
                                >Category</Link
                            >
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Edit
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <form @submit.prevent="onUpdate" autocomplete="off">
                                <div class="mb-3">
                                    <label for="nama" class="form-label"
                                        >Nama</label
                                    >
                                    <input
                                        type="text"
                                        v-model="form.nama"
                                        id="nama"
                                        class="form-control"
                                    />
                                    <small
                                        class="text-danger"
                                        v-if="errors.nama"
                                        >{{ errors.nama }}</small
                                    >
                                </div>
                                <div class="mb-3">
                                    <label for="Keterangan" class="form-label"
                                        >Lokasi</label
                                    >
                                    <textarea
                                        v-model="form.lokasi"
                                        class="form-control"
                                    ></textarea>
                                    <small
                                        class="text-danger"
                                        v-if="errors.lokasi"
                                        >{{ errors.lokasi }}</small
                                    >
                                </div>
                                <hr />
                                <div
                                    class="mb-3 d-flex justify-content-between"
                                >
                                    <Link
                                        :href="
                                            route(
                                                'category.destroy',
                                                category.id
                                            )
                                        "
                                        class="me-2 btn btn-danger btn-sm"
                                        method="delete"
                                        as="button"
                                        >Delete Category</Link
                                    >
                                    <button
                                        type="submit"
                                        class="btn btn-primary btn-sm"
                                        :class="{
                                            'opacity-25': form.processing,
                                        }"
                                        :disabled="form.processing"
                                    >
                                        Update Category
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
        category: Object,
    },
    data() {
        return {
            form: this.$inertia.form({
                id: this.category.id,
                nama: this.category.nama,
                lokasi: this.category.lokasi,
                _token: this.$page.props.csrf_token,
            }),
        };
    },
    methods: {
        onUpdate() {
            this.form.put(route("category.update", this.category.id));
        },
    },
    components: {
        Layoutadmin,
        Head,
        Link,
    },
};
</script>
