<template>
    <Head title="Home" />
    <Layout>
        <div>
            <header>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="bener-title">
                                <h1 class="h1">Laraperpus</h1>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Maxime eligendi
                                    repellendus amet tempore laborum quidem,
                                    consectetur in numquam fugit porro?
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <img
                                :src="imgc"
                                class="img-bener img-fluid d-none d-md-block"
                            />
                        </div>
                    </div>
                </div>
            </header>
            <section class="section-brand">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                                Lorem ipsum dolor sit, amet consectetur
                                adipisicing elit. Totam dolorem enim animi nobis
                                voluptate consectetur voluptatem deserunt vero
                                eligendi adipisci.
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section-home mt-4">
                <div class="container">
                    <div class="row mb-4">
                        <div class="col-md-12" data-aos="fade-up">
                            <div class="h3 fs-2 text-bold text-primary">
                                Catalog Books
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="col-md-4 mb-3"
                            v-for="book in books"
                            :key="book.id"
                            data-aos="fade-up"
                        >
                            <Link href="#" class="text-decoration-none">
                                <div class="card border-0 shadow">
                                    <img
                                        :src="book.image"
                                        class="card-img-top"
                                    />
                                    <div class="card-body">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                {{ book.judul }} |
                                                <strong
                                                    class="badge bg-primary"
                                                    >{{ book.category }}</strong
                                                >
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
                    <a href="#" class="btn btn-primary bg-gradient border-0"
                        >Load more
                        <vue-feather type="arrow-right-circle"></vue-feather
                    ></a>
                </div>
            </section>
        </div>
    </Layout>
</template>
<script>
import { Head, Link } from "@inertiajs/inertia-vue3";
import Layout from "@/Layouts/Layout.vue";
export default {
    data() {
        return {
            imgc: "https://images.dog.ceo/breeds/pomeranian/n02112018_5091.jpg",
            books: [
                {
                    id: "1",
                    category: "PHP Dasar",
                    name: "Pemograman Web Dasar dengan PHP",
                    judul: "Pemograman Web Dasar dengan PHP",
                    harga: "50000",
                    image: "https://images.dog.ceo/breeds/pomeranian/n02112018_5091.jpg",
                },
                {
                    id: "2",
                    category: "Laravel",
                    name: "Book B",
                    judul: "Laravel Dasar CRUD",
                    harga: "55000",
                    image: "https://images.dog.ceo/breeds/pomeranian/n02112018_5091.jpg",
                },
                {
                    id: "3",
                    category: "Javascript Dasar",
                    name: "Mengenal Javascript",
                    judul: "Mengenal Javascript",
                    harga: "45000",
                    image: "https://images.dog.ceo/breeds/pomeranian/n02112018_5091.jpg",
                },
                {
                    id: "4",
                    category: "Vue Js",
                    name: "Book D",
                    judul: "Dasa-dasar Vuejs2",
                    harga: "100000",
                    image: "https://images.dog.ceo/breeds/pomeranian/n02112018_5091.jpg",
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
