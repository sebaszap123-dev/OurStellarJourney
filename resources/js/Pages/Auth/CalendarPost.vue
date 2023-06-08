<template>
    <div>
        <AuthenticatedLayout>

            <div class="container mx-auto">
                <div class="py-8">
                    <h1 class="text-2xl font-bold mb-4">Crear Evento</h1>

                    <form @submit.prevent="submit" class="max-w-sm mx-auto">
                        <div class="mb-4">
                            <label for="description" class="form-label">Descripción</label>
                            <input v-model="form.description" type="text" id="description" class="form-control">
                        </div>

                        <div class="mb-4">
                            <label for="event_date" class="form-label">Fecha del Evento</label>
                            <input v-model="form.event_date" type="date" id="event_date" class="form-control">
                        </div>

                        <div class="mb-4">
                            <label for="repeat" class="form-check-label">
                                <input v-model="form.repeat" type="checkbox" id="repeat" class="form-check-input">
                                Repetir Evento
                            </label>
                        </div>

                        <div class="mb-4">
                            <label for="color" class="form-label">Color</label>
                            <select v-model="form.color" id="color" class="form-select">
                                <option value="">Seleccionar color</option>
                                <option value="red">Rojo</option>
                                <option value="blue">Azul</option>
                                <option value="green">Verde</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="repeat_type" class="form-label">Tipo de Repetición</label>
                            <select v-model="form.repeat_type" id="repeat_type" class="form-select">
                                <option value="">Seleccionar tipo de repetición</option>
                                <option value="daily">Diario</option>
                                <option value="weekly">Semanal</option>
                                <option value="monthly">Mensual</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </AuthenticatedLayout>
    </div>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm } from '@inertiajs/vue3';
import Swal from 'sweetalert2';

const form = useForm({
    description: '',
    event_date: '',
    repeat: false,
    color: null,
    repeat_type: null,
});

const submit = () => {
    form.post(route('upload.calendar'), {
        onFinish: () => form.reset(),
        onError: (error) => {
            console.log(error)
            Swal.fire('Oops', error.description, 'error')
        }
    });
};
</script>

<style lang="scss" scoped></style>