<script setup>
import { ref, computed } from 'vue'
import { myPlaylist } from '@/services/couples'

let currentIndex = ref(Math.floor(Math.random() * myPlaylist.length))

const audioPlayer = ref(null)
let isPlaying = ref(false)

const togglePlayback = () => {
    if (isPlaying.value) {
        pauseCurrentSong()
    } else {
        playCurrentSong()
    }
}

const playCurrentSong = () => {
    audioPlayer.value.play()
    isPlaying.value = true
}

const pauseCurrentSong = () => {
    if (audioPlayer.value) {
        audioPlayer.value.pause()
        isPlaying.value = false
    }
}

const playNextSong = () => {
    currentIndex.value = (currentIndex.value + 1) % myPlaylist.length
    pauseCurrentSong()
    playCurrentSong()
}

const currentSong = computed(() => {
    return myPlaylist[currentIndex.value]
})
</script>

<template>
    <header class="p-3 bg-kawai">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="#" class="nav-link px-2 text-white">Our Stellar Love's Melody</a></li>
                    <li>
                        <a to="/love_way" class="nav-link px-2 link-white">Home</a>
                    </li>
                    <li>
                        <a to="/gallery" class="nav-link px-2 link-white">Gallery</a>
                    </li>
                    <li>
                        <a to="/our_diary" class="nav-link px-2 link-white">Diario</a>
                    </li>
                </ul>

                <!-- <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control" placeholder="Search..." aria-label="Search" />
        </form> -->

                <div class="dropdown text-end">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle" />
                    </a>
                    <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <main class="">
        <div class="floating-card">
            <audio ref="audioPlayer" :src="currentSong.audio" @ended="playNextSong"
                @loadedmetadata="playCurrentSong"></audio>
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">{{ currentSong.title }}</h5>
                    <p class="card-text">{{ currentSong.artist }}</p>
                    <div class="btn-group d-flex justify-content-md-center" role="group">
                        <button class="btn btn-primary" @click="togglePlayback">
                            <span v-if="isPlaying"><i class="bi bi-pause"></i> Pause</span>
                            <span v-else><i class="bi bi-play"></i> Play</span>
                        </button>
                        <button class="btn btn-secondary" @click="playNextSong">
                            <i class="bi bi-skip-forward"></i> Next
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <slot></slot>
    </main>
    <footer class="footer mt-auto py-3 bg-footer">
        <div class="container">
            <p class="text-center" style="margin: 0">
                Our Stellar Love's Melody page, by
                <a href="https://github.com/sebaszap123-dev" class="text-white" style="font-size: 18px">@sebaszap123-dev</a>
            </p>
        </div>
    </footer>
</template>

<style scoped>
.bg-kawai {
    background-color: #ef8e73;
}

.bg-footer {
    background-color: #f4baa5;
}

.link-white {
    color: #446594;
}

.link-white:hover {
    color: #444c94;
}

a,
h1,
p {
    font-family: 'Delius';
}

h1 {
    padding-top: 2rem;
    padding-bottom: 2rem;
    margin: 0;
}

a {
    font-weight: bold;
    font-size: 1.5rem;
}

.floating-card {
    position: absolute;
    /* Opcional: Cambia a 'position: absolute;' si deseas que la tarjeta esté posicionada de forma absoluta */
    top: 12rem;
    /* Ajusta la posición vertical de la tarjeta */
    right: 50px;
    /* Ajusta el color de fondo de la tarjeta */
    border-radius: 5px;
    /* Ajusta el radio de borde de la tarjeta */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    /* Opcional: Agrega una sombra a la tarjeta */
    width: 20rem;
}
</style>
