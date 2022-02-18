<script setup>
import BreezeButton from "@/Components/Button.vue";
import BreezeGuestLayout from "@/Layouts/Guest.vue";
import BreezeInput from "@/Components/Input.vue";
import BreezeLabel from "@/Components/Label.vue";
import BreezeValidationErrors from "@/Components/ValidationErrors.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
    terms: false,
});

const submit = () => {
    form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <BreezeGuestLayout>
        <Head title="Register" />
        <BreezeValidationErrors class="mb-4" />
        <div class="h6 mt-3 mb-4 mt-4">
            Create Your Laraperpus <span class="border-bottom">account</span>
        </div>
        <form @submit.prevent="submit" autocomplete="off">
            <div>
                <BreezeLabel for="name" value="Name" />
                <BreezeInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    autofocus
                />
            </div>

            <div class="mt-4">
                <BreezeLabel for="email" value="Email" />
                <BreezeInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                />
            </div>

            <div class="mt-4">
                <BreezeLabel for="password" value="Password" />
                <BreezeInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                />
            </div>

            <div class="mt-4">
                <BreezeLabel
                    for="password_confirmation"
                    value="Confirm Password"
                />
                <BreezeInput
                    id="password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password_confirmation"
                />
            </div>

            <div class="d-flex justify-content-between mt-4">
                <BreezeButton
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Register
                </BreezeButton>
                <Link :href="route('login')" class="text-decoration-none">
                    Already registered?
                </Link>
            </div>
        </form>
    </BreezeGuestLayout>
</template>
