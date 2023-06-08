<template>
    <AuthenticatedLayout>
        <Album>
            <CalendarEventComponent></CalendarEventComponent>
        </Album>
        <label id="swal-input-file"></label>
    </AuthenticatedLayout>
</template>
<script setup>
import Album from '@/Components/Album.vue';
import CalendarEventComponent from '@/Components/CalendarEventComponent.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
</script>

<style>
footer {
    position: fixed;
    bottom: 0;
    width: 100%;
}
</style>