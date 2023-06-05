<template>
    <div class="col">
        <div class="card shadow-sm" @click.prevent="fireForm">
            <img :src="image" alt="awa" class="card-img-top" />
            <div class="card-body">
                <p class="card-text">
                    {{ description }}
                </p>
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">{{ elapsedTime.toString() }}</small>
                </div>
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
        type: Number,
        required: true,
    },
    image: {
        type: String,
        required: true
    }
})
</script>

<style scoped>
.card {
    transition: all 0.3s ease;
}

.card:hover {
    transform: scale(1.1);
}

.col {
    padding-top: 30px;
    padding-bottom: 15px;
}
</style>