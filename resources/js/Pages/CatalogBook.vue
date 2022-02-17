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
                        v-for="book in books"
                        :key="book.id"
                        data-aos="fade-up"
                    >
                        <Link href="#" class="text-decoration-none">
                            <div class="card border-0 shadow">
                                <img :src="book.image" class="card-img-top" />
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            {{ book.judul }} |
                                            <strong class="badge bg-primary">{{
                                                book.category
                                            }}</strong>
                                        </li>
                                        <li class="list-group-item">
                                            {{ formatPrice(book.harga) }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </Link>
                    </div>
                </div>
                <nav aria-label="Page navigation example" class="mt-5">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </section>
    </Layout>
</template>
<script>
import { Head, Link } from "@inertiajs/inertia-vue3";
import Layout from "@/Layouts/Layout.vue";
export default {
    props: {
        categories: Array,
    },
    data() {
        return {
            books: [
                {
                    id: "1",
                    category: "PHP Dasar",
                    name: "Pemograman Web Dasar dengan PHP",
                    judul: "Pemograman Web Dasar dengan PHP",
                    harga: "50000",
                    image: "https://source.unsplash.com/books/600x300",
                },
                {
                    id: "2",
                    category: "Laravel",
                    name: "Book B",
                    judul: "Laravel Dasar CRUD",
                    harga: "55000",
                    image: "https://source.unsplash.com/digital/600x300",
                },
                {
                    id: "3",
                    category: "Javascript Dasar",
                    name: "Mengenal Javascript",
                    judul: "Mengenal Javascript",
                    harga: "45000",
                    image: "https://source.unsplash.com/digital/600x300",
                },
                {
                    id: "4",
                    category: "Vue Js",
                    name: "Book D",
                    judul: "Dasa-dasar Vuejs2",
                    harga: "100000",
                    image: "https://source.unsplash.com/digital/600x300",
                },
            ],
        };
    },
    components: {
        Head,
        Layout,
        Link,
    },
    methods: {
        formatPrice(value) {
            let val = (value / 1).toFixed(2).replace(".", ",");
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        },
    },
};
</script>
