<template>
    <div class="col">
        <div class="card shadow-sm" @click="showModal = true">
            <img :src="image" alt="awa" class="card-img-top" />
            <div class="card-body">
                <p class="card-text">
                    {{ description }}
                </p>
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">{{ formatDate(elapsedTime) }}</small>
                </div>
            </div>
        </div>
        <div v-if="showModal" class="modal">
            <div class="modal-content">
                <span class="close" @click="showModal = false">&times;</span>
                <img :src="image" alt="awa" class="modal-image" />
                <p class="modal-description">{{ description }}</p>
            </div>
        </div>
    </div>
</template>

<script setup>
defineProps({
    description: {
        type: String,
        required: true,
    },
    elapsedTime: {
        type: String,
        required: true,
    },
    image: {
        type: String,
        required: true
    }
})

// Actions
import { formatDate } from '@/services/couples'
import { ref } from 'vue';
const showModal = ref(false);
</script>

<style scoped>
.card {
    transition: all 0.3s ease;
    height: auto;
}

.card:hover {
    transform: scale(1.1);
}

.col {
    padding-top: 30px;
    padding-bottom: 15px;
}

.card-img-top {
    object-fit: cover;
    width: 100%;
    height: 200px;
}

.modal {
    display: flex;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 999;
    justify-content: center;
    align-items: center;
}

.modal-content {
    background-color: #ffedf5;
    padding: 20px;
    max-width: 35rem;
}

.close {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 24px;
    cursor: pointer;
}

.modal-image {
    padding-top: 2rem;
    width: 100%;
    height: auto;
}

.modal-description {
    padding-top: 2rem;
}
</style>