<template>
    <div class="col">
        <VCalendar :initial-page="{ month: 11, year: 2023 }" :attributes="attributes" />
    </div>
</template>

<script setup>
import { ref, computed } from 'vue';
// Ejemplo de como agregar fechas con su description si es la misma pues usas el mismo array si no creas otro objeto
// const todos = ref([
// {
//     description: 'Take Noah to basketball practice.',
//     isComplete: false,
//     dates: [
//         new Date(2023, 10, 2),
//         new Date(2023, 10, 7),
//         new Date(2023, 10, 17),
//         new Date(2023, 10, 23),
//     ], // Every Friday
//     color: 'red',
// },
// ]);

// Ejemplo para repetir por semanas o meses o así
// repeat: {
//     every: 'month',
//     days: 15
//   }
// const attributes = computed(() => [
//     // Attributes for todos
//     {
// dates: {
//     start: new Date(2023, 10, 7),
//     repeat: {
//         every: [2, 'weeks'],
//         weekdays: 2,
//     },
// },
//         dot: true,
//         popover: true,
//     },
// ]);
</script>

<style scoped></style>