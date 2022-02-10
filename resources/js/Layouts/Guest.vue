<script setup>
import BreezeApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Link } from "@inertiajs/inertia-vue3";
</script>

<template>
    <div
        class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100"
    >
        <!-- <div>
            <Link href="/">
                <BreezeApplicationLogo class="w-20 h-20 fill-current text-gray-500" />
            </Link>
        </div> -->

        <div class="container">
            <div class="row vh-100 justify-content-center align-items-center">
                <div class="col-md-5">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <slot />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
