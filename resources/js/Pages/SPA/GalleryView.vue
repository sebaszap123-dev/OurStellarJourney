<template>
  <AuthenticatedLayout>
    <ImageCarousel></ImageCarousel>
    <Album>
      <GalleryCard description="hola" image="/assets/img/anime_gaming.jpg" :elapsedTime="3000" />
      <GalleryCard description="hola" image="/assets/img/anime_gaming.jpg" :elapsedTime="3000" />
      <GalleryCard description="hola" image="/assets/img/anime_gaming.jpg" :elapsedTime="3000" />
      <GalleryCard description="hola" image="/assets/img/anime_gaming.jpg" :elapsedTime="3000" />
    </Album>
  </AuthenticatedLayout>
</template>

<script setup>
import ImageCarousel from '@/Components/ImageCarousel.vue';
import Album from '@/Components/Album.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import GalleryCard from '@/Components/GalleryCard.vue';
</script>

<style lang="css" scoped></style>
