<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Chirp from '@/Components/Chirp.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head } from '@inertiajs/vue3';

defineProps(['chirps']);

const form = useForm({
    message: '',
    image: null, // Tambahkan properti untuk mengunggah gambar
});
</script>

<template>
    <Head title="Chirps" />

    <AuthenticatedLayout>
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <form @submit.prevent="form.post(route('chirps.store'), { onSuccess: () => form.reset() })">
                <textarea
                    v-model="form.message"
                    placeholder="What's on your mind?"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                ></textarea>
                <InputError :message="form.errors.message" class="mt-2" />

                <input 
                    type="file" 
                    @change="e => form.image = e.target.files[0]" 
                    class="mt-4 block w-full"
                />
                <InputError :message="form.errors.image" class="mt-2" />

                <PrimaryButton class="mt-4">Chirp</PrimaryButton>
            </form>

            <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
                <div v-for="chirp in chirps" :key="chirp.id" class="p-4">
                    <p>{{ chirp.message }}</p>
                    <img 
                        v-if="chirp.image" 
                        :src="`/storage/${chirp.image}`" 
                        alt="Chirp Image" 
                        class="mt-2 w-full max-h-60 object-cover rounded-md"
                    />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
