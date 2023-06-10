<script setup>
import { ref, computed } from 'vue'
import { myPlaylist } from '@/services/couples'
import DropdownLink from '@/Components/DropdownLink.vue';

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
                        <a :href="route('realhome')" class="nav-link px-2 link-white">Home</a>
                    </li>
                    <li>
                        <a :href="route('gallery')" class="nav-link px-2 link-white">Gallery</a>
                    </li>
                    <li>
                        <a :href="route('love-diary')" class="nav-link px-2 link-white">Diario</a>
                    </li>
                </ul>
                <div class="row text-end">
                    <div class="col">
                        <div class="dropdown text-end">
                            <a href="#" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32"
                                    class="rounded-circle" />
                            </a>
                            <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                                <!-- <li><a class="dropdown-item" href="#">Settings</a></li> -->
                                <li><a class="dropdown-item" :href="route('profile.edit')">Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider" />
                                </li>
                                <li>
                                    <DropdownLink :href="route('logout')" method="post" as="button">
                                        Log Out
                                    </DropdownLink>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <a :href="route('calendar')">
                            <ion-icon size="large" name="calendar-outline"></ion-icon>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>
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
ion-icon {
    color: white;
}

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
</style>
