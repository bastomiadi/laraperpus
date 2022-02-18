<script setup>
import BreezeApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Link } from "@inertiajs/inertia-vue3";
</script>

<template>
    <!-- <div>
            <Link href="/">
                <BreezeApplicationLogo class="w-20 h-20 fill-current text-gray-500" />
            </Link>
        </div> -->

    <div class="container">
        <div class="row vh-100 justify-content-center align-items-center">
            <div class="col-md-5">
                <div class="h2 mb-3">
                    <Link :href="route('home')" class="text-decoration-none"
                        ><i class="text-primary">Laraperpus</i></Link
                    >
                </div>
                <div class="card border-0 shadow rounded-3 px-3">
                    <div class="card-body">
                        <slot />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
