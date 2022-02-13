<script setup>
import { computed } from "vue";
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps(["href", "active"]);

const classes = computed(() =>
    props.active
        ? "btn btn-primary btn-sm border-0 me-2 mb-2"
        : "btn btn-outline-secondary btn-sm me-2 mb-2"
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
