<template>
    <Head title="Create" />

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
                            Create
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <form @submit.prevent="store" autocomplete="off">
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
                                        >Keterangan</label
                                    >
                                    <textarea
                                        v-model="form.keterangan"
                                        class="form-control"
                                    ></textarea>
                                    <small
                                        class="text-danger"
                                        v-if="errors.keterangan"
                                        >{{ errors.keterangan }}</small
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
                                        Create Category
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
    },
    data() {
        return {
            form: this.$inertia.form({
                nama: "",
                keterangan: "",
            }),
        };
    },
    methods: {
        store() {
            this.form.post(route("category.store"), {
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
