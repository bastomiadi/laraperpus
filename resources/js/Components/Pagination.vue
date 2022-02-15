<template>
    <nav
        aria-label="Page navigation example"
        class="mt-5"
        v-if="links.length > 3"
    >
        <ul class="pagination">
            <template v-for="(link, key) in links">
                <div
                    v-if="link.url === null"
                    :key="key"
                    class="page-link"
                    v-html="link.label"
                />
                <Link
                    v-else
                    :key="`link-${key}`"
                    class="page-link"
                    :class="{ 'bg-primary text-white': link.active }"
                    :href="link.url"
                    v-html="link.label"
                />
            </template>
        </ul>
    </nav>
</template>
<script>
import { Link } from "@inertiajs/inertia-vue3";
export default {
    props: {
        links: Array,
    },
    components: {
        Link,
    },
};
</script>
