<template>
    <div class="floating-card">
        <audio ref="audioPlayer" :src="currentSong.audio" @ended="playNextSong"></audio>
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
</template>

<script setup>
import { ref, computed } from 'vue'
import { myPlaylist } from '@/services/couples'

const currentIndex = ref(0);
const audioPlayer = ref(null);
const isPlaying = ref(false);

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

<style lang="css" scoped>
.floating-card {
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    width: 20rem;
}
</style>