<template>
    <AuthenticatedLayout>
        <div class="container">
            <h1>Hola mundo</h1>
            <PlaylistComponent />
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import PlaylistComponent from '@/Components/PlaylistComponent.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
</script>

<style lang="css" scoped></style>