<template>
    <Head title="Create" />

    <Layoutadmin>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
            >
                <h1 class="h2">Create Category Book</h1>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    {{ category.nama }}
                                </li>
                                <li class="list-group-item">
                                    {{ category.keterangan }}
                                </li>
                                <li class="list-group-item">
                                    <a
                                        href="#"
                                        class="text-danger me-2 text-decoration-none"
                                        >Delete</a
                                    >
                                    <Link
                                        :href="
                                            route('category.edit', category.id)
                                        "
                                        class="text-primary text-decoration-none"
                                        >Edit</Link
                                    >
                                </li>
                            </ul>
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
        category: Object,
    },
    components: {
        Layoutadmin,
        Head,
        Link,
    },
};
</script>
