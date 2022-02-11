<template>
    <Head title="Home" />
    <Layout>
        <div>
            <header>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="bener-title">
                                <h3>Lara'perpus</h3>
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
            <section class="section-home">
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
        </div>
    </Layout>
</template>
<script>
import { Head, Link } from "@inertiajs/inertia-vue3";
import Layout from "@/Layouts/Layout.vue";
export default {
    data() {
        return {
            // imgc: "../../../public/img/yland-dean-6k6N8HTrXyE-unsplash.jpg",
            imgc: "https://images.dog.ceo/breeds/pomeranian/n02112018_5091.jpg",
        };
    },
    components: {
        Head,
        Layout,
    },
};
</script>
