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

        <form @submit.prevent="submit" autocomplete="off">
            <div>
                <BreezeLabel for="email" value="Email" />
                <BreezeInput
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

            <div class="block mt-4">
                <label class="d-flex align-items-center">
                    <BreezeCheckbox
                        name="remember"
                        v-model:checked="form.remember"
                    />
                    <span class="ml-2"> Remember me</span>
                </label>
            </div>

            <div class="d-flex align-items-center justify-content-between mt-4">
                <Link v-if="canResetPassword" :href="route('password.request')">
                    Forgot your password?
                </Link>

                <BreezeButton
                    class="ml-4"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Log in
                </BreezeButton>
            </div>
            <Link :href="route('home')"> Home </Link>
        </form>
    </BreezeGuestLayout>
</template>
