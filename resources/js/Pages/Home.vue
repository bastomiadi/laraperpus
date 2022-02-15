<template>
    <Head title="Home" />
    <Layout>
        <header class="header-home">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="bener-title">
                            <h1 class="h1 mb-3">Laraperpus</h1>
                            <div class="h5 mb-2">Get Your New</div>
                            <div class="text-warning h4 mb-3 book-collection">
                                <strong>Book</strong> Collection
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Maxime eligendi repellendus
                                amet tempore laborum quidem, consectetur in
                                numquam fugit porro?
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
                            Lorem ipsum dolor sit, amet consectetur adipisicing
                            elit. Totam dolorem enim animi nobis voluptate
                            consectetur voluptatem deserunt vero eligendi
                            adipisci.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-home mt-4">
            <div class="container">
                <div class="row mb-4 mt-5">
                    <div class="col-md-12" data-aos="fade-up">
                        <div class="h3 fs-2 text-bold text-primary">
                            Catalog <strong>Books</strong>
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
                                <img :src="book.image" class="card-img-top" />
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            {{ book.judul }} |
                                            <strong class="badge bg-primary">{{
                                                book.category
                                            }}</strong>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </Link>
                    </div>
                </div>
                <Link
                    :href="route('catalog.book')"
                    class="btn btn-primary bg-gradient border-0"
                    >Load more
                    <vue-feather type="arrow-right-circle"></vue-feather
                ></Link>
            </div>
        </section>
    </Layout>
</template>
<script>
import { Head, Link } from "@inertiajs/inertia-vue3";
import Layout from "@/Layouts/Layout.vue";
export default {
    data() {
        return {
            imgc: "https://source.unsplash.com/600x300",
            books: [
                {
                    id: "1",
                    category: "PHP Dasar",
                    name: "Pemograman Web Dasar dengan PHP",
                    judul: "Pemograman Web Dasar dengan PHP",
                    image: "https://source.unsplash.com/digital/600x300",
                },
                {
                    id: "2",
                    category: "Laravel",
                    name: "Book B",
                    judul: "Laravel Dasar CRUD",
                    image: "https://source.unsplash.com/digital/600x300",
                },
                {
                    id: "3",
                    category: "Javascript Dasar",
                    name: "Mengenal Javascript",
                    judul: "Mengenal Javascript",
                    image: "https://source.unsplash.com/digital/600x300",
                },
                {
                    id: "4",
                    category: "Vue Js",
                    name: "Book D",
                    judul: "Dasa-dasar Vuejs2",
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
