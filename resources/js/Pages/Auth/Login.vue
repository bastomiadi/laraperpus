<script setup>
import BreezeButton from "@/Components/Button.vue";
import BreezeCheckbox from "@/Components/Checkbox.vue";
import BreezeGuestLayout from "@/Layouts/Guest.vue";
import BreezeInput from "@/Components/Input.vue";
import BreezeLabel from "@/Components/Label.vue";
import BreezeValidationErrors from "@/Components/ValidationErrors.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <BreezeGuestLayout>
        <Head title="Log in" />
        <BreezeValidationErrors class="mb-4" />
        <div v-if="status" class="mb-4 text-danger">
            {{ status }}
        </div>
        <div class="h6 mt-3 mb-4 mt-4">
            Sign in your <span class="border-bottom">account</span>
        </div>
        <form @submit.prevent="submit" autocomplete="off">
            <div>
                <BreezeLabel for="email" value="Email" />
                <BreezeInput
                    class="rounded-3"
                    id="email"
                    type="email"
                    v-model="form.email"
                    autofocus
                />
            </div>

            <div class="mt-4">
                <BreezeLabel for="password" value="Password" />
                <BreezeInput
                    id="password"
                    type="password"
                    v-model="form.password"
                />
            </div>

            <div class="d-flex align-items-center justify-content-between mt-4">
                <label class="d-flex align-items-center">
                    <BreezeCheckbox
                        name="remember"
                        v-model:checked="form.remember"
                    />
                    <span class="ms-2 text-muted"> Remember me</span>
                </label>
                <Link
                    v-if="canResetPassword"
                    :href="route('password.request')"
                    class="text-decoration-none border-bottom text-info"
                >
                    Forgot Password
                </Link>
            </div>

            <div class="d-flex justify-content-between mt-3 mb-4">
                <BreezeButton
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Log in
                </BreezeButton>
            </div>
            <Link :href="route('register')">Don't have account?</Link>
        </form>
    </BreezeGuestLayout>
</template>
