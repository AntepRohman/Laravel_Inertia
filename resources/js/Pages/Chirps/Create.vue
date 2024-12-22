
<template>
    <form @submit.prevent="submit">
        <textarea v-model="form.message" placeholder="What's on your mind?"></textarea>
        <input type="file" @change="handleFileUpload" />
        <PrimaryButton type="submit">Chirp</PrimaryButton>
    </form>
</template>

<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    message: '',
    image: null,
});

const handleFileUpload = (event) => {
    form.image = event.target.files[0];
};

const submit = () => {
    form.post(route('chirps.store'), {
        onSuccess: () => form.reset(),
    });
};
</script>