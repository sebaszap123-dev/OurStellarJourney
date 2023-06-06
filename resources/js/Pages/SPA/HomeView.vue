<template>
    <div>
        <div class="vh-100" :class="['background-container']">
            <div class="container d-flex align-items-center justify-content-center">
                <div class="card text-center mb-3">
                    <div class="card-body">
                        <h1 class="animated-text">Our Stellar Love's Journey</h1>
                        <div class="d-flex justify-content-center mb-3">
                            <input id="coupleDate" class="form-control text-center" type="date" v-model="myTime" />
                        </div>
                        <div class="d-flex justify-content-center mb-3">
                            <button class="btn btn-secondary star-button" @click.prevent="join(myTime, $page.props.date)">
                                Begings the melody
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
  
<script setup>
import Swal from 'sweetalert2'
import { coupleDate } from '@/services/couples'
import { router } from '@inertiajs/vue3';
let myTime = '2023-05-27' // Define la propiedad fecha con el tipo Date
const join = (date, our_date) => {
    if (coupleDate(Date.parse(date), our_date)) {
        Swal.fire({
            icon: 'success',
            title: 'Te amodoro :3',
            showConfirmButton: true,
            showDenyButton: true,
            confirmButtonText: '¡Continuar!',
            denyButtonText: '¿Volver?'
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                router.visit('/home');
            } else if (result.isDenied) {
                Swal.fire('Te espero la proxima pololita :3', '', 'info')
            }
        })
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'No es la fecha 😢!?'
        })
    }
}
</script>
  
<style lang="css" scoped>
.background-container {
    background-image: url('@/../../public/assets/img/wallpaper_inicio.jpg');
    /* Ruta relativa a la imagen de fondo */
    background-size: cover;
    background-position: center;
}

.container {
    height: 100vh;
}

.d-flex {
    min-height: 100%;
}

#coupleDate {
    width: 300px;
    background-color: #e3c0c0;
    border-color: #e3c0c0;
    color: #604e6f;
}

.card {
    background-color: rgba(255, 255, 255, 0.461);
    animation: cardAppear 0.5s ease-in-out;
}

@keyframes cardAppear {
    0% {
        transform: scale(0.5);
        opacity: 0;
    }

    100% {
        transform: scale(1);
        opacity: 1;
    }
}

.bouncing-text {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.animated-text {
    animation: bouncing 1s infinite;
    animation-iteration-count: 2;
    /* Duración de la animación */
}

.star-button {
    background-color: none !important;
    background-image: url(../assets/img/night_sky.jpg);
}

@keyframes bouncing {
    0% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-20px);
    }

    100% {
        transform: translateY(0);
    }
}
</style>
  