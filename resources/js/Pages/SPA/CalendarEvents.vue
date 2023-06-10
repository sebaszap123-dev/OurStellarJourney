<template>
    <AuthenticatedLayout>
        <div class="d-flex justify-center pt-5">
            <h1>Nuestro calendario</h1>
        </div>
        <Album class="pt-5">
            <CalendarEventComponent :events="$page.props.calendar"></CalendarEventComponent>
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