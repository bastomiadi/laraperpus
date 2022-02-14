<template>
    <div>
        <div
            class="alert alert-success alert-dismissible fade show"
            role="alert"
            v-if="$page.props.flash.success && show"
        >
            <div>{{ $page.props.flash.success }}</div>
            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"
            ></button>
        </div>
        <div
            class="alert alert-danger"
            v-if="
                ($page.props.flash.error ||
                    Object.keys($page.props.errors).length > 0) &&
                show
            "
        >
            Errors
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            show: true,
        };
    },
    watch: {
        "$page.props.flash": {
            handler() {
                this.show = true;
            },
            deep: true,
        },
    },
};
</script>
