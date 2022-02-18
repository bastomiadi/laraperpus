<template>
    <Head title="Catalog Book" />
    <Layout>
        <section class="section-home mt-5">
            <div class="container">
                <div class="row justify-content-center mb-3 text-center">
                    <div class="col-md-10">
                        <div class="mb-3 py-4">
                            <div class="mt-5 mb-2 h1 text-primary">
                                Catalog
                                <strong class="border-bottom">Book</strong>
                            </div>
                            <p class="text-primary text-wrap">
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Odit, ad vel eum non quis ipsa
                                autem modi blanditiis voluptatum dolorem,
                                distinctio adipisci voluptas, laborum
                                perspiciatis quia vitae labore accusamus
                                nesciunt.
                            </p>
                        </div>
                        <a
                            href="#"
                            class="btn btn-primary border-0 me-2 mb-2"
                            v-for="catalog in categories"
                            :key="catalog.id"
                            >{{ catalog.nama }}</a
                        >
                        <hr class="border-top-1 border-primary" />
                    </div>
                </div>
                <div class="row">
                    <div
                        class="col-md-4 mb-4"
                        v-for="book in books.data"
                        :key="book.id"
                        data-aos="fade-up"
                    >
                        <Link href="#" class="text-decoration-none">
                            <div class="card border-0 shadow">
                                <img
                                    :src="book.cover"
                                    v-if="book.cover"
                                    class="card-img-top"
                                />
                                <img
                                    :src="imgc"
                                    v-if="!book.cover"
                                    class="card-img-top"
                                />
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            {{ book.judul }} |
                                            <strong class="badge bg-primary">{{
                                                book.category_book.nama
                                            }}</strong>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </Link>
                    </div>
                </div>
                <Pagination
                    class="mt-6 justify-content-center d-flex"
                    :links="books.links"
                />
            </div>
        </section>
    </Layout>
</template>
<script>
import { Head, Link } from "@inertiajs/inertia-vue3";
import Layout from "@/Layouts/Layout.vue";
import Pagination from "@/Components/Pagination.vue";
export default {
    props: {
        categories: Array,
        books: Object,
    },
    data() {
        return {
            imgc: "https://source.unsplash.com/600x300",
        };
    },
    components: {
        Head,
        Layout,
        Link,
        Pagination,
    },
    // methods: {
    //     formatPrice(value) {
    //         let val = (value / 1).toFixed(2).replace(".", ",");
    //         return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    //     },
    // },
};
</script>
